<?php

    $pdo = new PDO('mysql:host=localhost;dbname=phpcep','root','');

    $address = (object)[
        'cep' => '',
        'logradouro' => '',
        'bairro' => '',
        'localidade' => '',
        'uf' => ''
    ];
    //Sem erro e sem resposta, pois ainda nao foi pesquisado
    $res = false;
    $error = false;

    if(isset($_POST['cep'])){
        $cep = (string)$_POST['cep'];
        //Tirando tudo o que nao for numero pesquisado do cep
        $cep = preg_replace('/[^0-9]/', '', $cep);

        //Se tiver 8 numeros, faça a consulta
        if(strlen($cep) == 8){
            $sql = $pdo->prepare("SELECT * FROM enderecos where cep=?");
            $sql->execute(array($cep));
            $return_db = $sql->fetchAll();

            //Pegando os valores e colocando no banco de dados
            if(isset($return_db[0])){
                $address->cep = $return_db[0][0];
                $address->logradouro = $return_db[0][1];
                $address->bairro = $return_db[0][2];
                $address->localidade = $return_db[0][3];
                $address->uf = $return_db[0][4];
                
                //Dizendo que há uma resposta do banco
                $res = true;
            }else{
                $url = "https://viacep.com.br/ws/{$cep}/xml/";
                $xml = file_get_contents($url);
                $return_api = json_decode(json_encode(simplexml_load_string($xml)));
                
                if(isset($return_api->erro)){
                    $error = true;
                    $address->cep = "CEP Inválido";
                    $res = false;
                }else{
                    //Sem pegar complemento, pois alguns CEPS não tinha e dava erro
                    $return_api->cep = str_replace('-','',$return_api->cep);
                    $sql = $pdo->prepare("INSERT INTO enderecos VALUES (?,?,?,?,?)");
                    $sql->execute(array(
                        $return_api->cep,
                        $return_api->logradouro,
                        $return_api->bairro,
                        $return_api->localidade,
                        $return_api->uf)
                    );
                    //Botando na tela
                    $address->cep = $return_api->cep;
                    $address->logradouro = $return_api->logradouro;
                    $address->bairro = $return_api->bairro;
                    $address->localidade = $return_api->localidade;
                    $address->uf = $return_api->uf;

                    //Houve resposta da API
                    $res = true;
                }
            }
        }else{
            $address->cep = "CEP Inválido";
            $error = true;
        }
    }else{
        $address->cep = "CEP Inválido";
        $error = true;
    }
?>