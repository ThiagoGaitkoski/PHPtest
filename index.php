<?php
    include_once('getcep.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Pesquisa CEP</title>
</head>
    <body> 
    <div class="container mt-5">
        <h1>Pesquisa CEP</h1>
        <form class="row g-3" action="." method="post">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Digite o CEP..." name="cep" value="<?php echo $address->cep ?>" required>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
            
            <div class="col-md-6">
                <label for="Rua" class="form-label">Rua</label>
                <input type="text" class="form-control" id="Rua" value="<?php echo $address->logradouro ?>" disabled>
            </div>
            <div class="col-md-8">
                <label for="Complemento" class="form-label">Complemento</label>
                <input type="texte" class="form-control" id="Complemento" name="complemento" value="<?php echo $address->complemento ?>" disabled>
            </div>
            <div class="col-md-4">
                <label for="Bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="Bairro" value="<?php echo $address->bairro ?>" disabled>
            </div>

            <div class="col-md-10">
                <label for="Cidade" class="form-label">Cidade</label>
                <input type="texte" class="form-control" id="Cidade" name="cidade" value="<?php echo $address->localidade ?>" disabled>
            </div>
            <div class="col-md-2">
                <label for="Estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="Estado" name="estado" value="<?php echo $address->uf ?>" disabled>
            </div>
        </form>
    </div>
    </body>
</html>


