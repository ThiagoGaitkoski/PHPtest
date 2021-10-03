<?php
    include_once('getcep.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa CEP</title>
</head>
    <body>
        <form action="." method="post">
            <p>Digite o CEP a ser procurado</p>
            <input type="text" name="cep" placeholder="Digite o CEP..." value="<?php echo $address->cep ?>">
            <button type="submit">Procurar</button>

            <input type="text" name="rua" placeholder="Rua" value="<?php echo $address->logradouro ?>">
            <input type="text" name="complemento" placeholder="Complemento" value="<?php echo $address->complemento ?>">
            <input type="text" name="bairro" placeholder="Bairro" value="<?php echo $address->bairro ?>">
            <input type="text" name="cidade" placeholder="Cidade" value="<?php echo $address->localidade ?>">
            <input type="text" name="estado" placeholder="Estado" value="<?php echo $address->uf ?>">
        </form>
    </body>
</html>