<?php  
    session_start();
    include_once('usuario.php'); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <style>
        body, h1, form, label, input, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #e7f0f9;
            color: #333;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #3498db;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 48%;
            margin-top: 10px; 
        }

        button[type='submit'] {
            background-color: #A3C8E4;
            color: white;
        }

        button[type='reset'] {
            background-color: #D1E4F2;
            color: #333;
        }

        .actions {
            display: flex;
            justify-content: space-between;
        }

    </style>
</head>
<body>

<div class="container">
    <h1>Cadastro de Usuário</h1>
    <form action="usuario.php" method="POST">
        <label for="id_usuario">Id:</label>
        <input type="text" name="id_usuario" id="id_usuario" value="<?= isset($trabalho2) ? $trabalho2->getIdUsuario() : 0 ?>" readonly>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= isset($trabalho2) ? $trabalho2->getNome() : '' ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= isset($trabalho2) ? $trabalho2->getEmail() : '' ?>" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" value="<?= isset($trabalho2) ? $trabalho2->getSenha() : '' ?>" required>

        <div class="actions">
            <button type='reset'><a href="../index.php">Voltar</a></button>
            <button type='submit' name='acao' value='salvar'>Salvar</button>
            <button type='submit' name='acao' value='excluir'>Excluir</button>
        </div>
    </form>
</div>

</body>
</html>  
