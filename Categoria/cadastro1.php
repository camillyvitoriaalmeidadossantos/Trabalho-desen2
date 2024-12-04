<?php
session_start();
include_once('categoria.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre seu Livro</title>
    <style>

body, h1, form, fieldset, input, button {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff; 
        padding: 30px;
    }

    header {
        text-align: center;
        margin-bottom: 20px;
    }

    header h1 {
        color: #333;
        font-size: 32px;
    }

    form {
        background-color: #ffffff; 
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 60%;
        margin: 0 auto;
    }

    fieldset {
        border: none;
        margin-bottom: 15px;
    }

    legend {
        font-size: 20px;
        color: #5a9bcf; 
        font-weight: bold;
    }

    label {
        font-size: 16px;
        color: #333;
        display: block;
        margin-bottom: 8px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        background-color: #f9f9f9; 
    }

    input[type="text"] {
        border-color: #5a9bcf; 
        outline: none;
    }

    button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        margin-right: 10px;
        transition: background-color 0.3s;
    }

    button[type="submit"] {
        background-color: #5a9bcf; 
        color: white;
    }

    button[type="reset"] {
        background-color: #cfcfcf; 
        color: white;
    }

    button[type="submit"][value="excluir"] {
        background-color: #ffb3b3; 
        color: white;
    }

    hr {
        margin-top: 30px;
    }

</style>
</head>
<body>
    <header>
        <h1>Categorias</h1>
    </header>

    <form action="categoria.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Insira</legend>
            
            <label for="id_categoria">Id:</label>
            <input type="text" name="id_categoria" id="id_categoria" value="<?= isset($trabalho2) ? $trabalho2->getIdCategoria() : 0 ?>" readonly>

            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" value="<?= isset($trabalho2) ? $trabalho2->getDescricao() : '' ?>" required>

            <button type="submit" name="acao" value="salvar">Salvar</button>
            <button type="submit" name="acao" value="excluir">Excluir</button>
            <button type="reset"><a href="index.php">Cancelar</a></button>
        </fieldset>
    </form>
</body>
</html>
