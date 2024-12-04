<?php
    session_start();
    include_once('usuario.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <style>
        body, h1, table, th, td, form, fieldset, input, button, select {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

     
        body {
            font-family: Arial, sans-serif;
            background-color: #eaf6ff; 
            color: #333;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        header h1 {
            font-size: 28px;
            color: #3498db;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 60%;
            margin: 0 auto;
        }

        fieldset {
            border: none;
            margin-bottom: 20px;
        }

        legend {
            font-size: 18px;
            font-weight: bold;
            color: #3498db;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }


        table {
            width: 80%;
            margin-top: 30px;
            margin: 0 auto;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

       

    </style>
</head>
<body>
    <header>
        <h1>Lista de Usuários</h1>
    </header>

    <a href="cadastro.php">Novo Usuário</a>

    <form action="" method="get">
        <fieldset>
            <legend>Pesquisa de Usuários</legend>

            <label for="busca">Busca:</label>
            <input type="text" name="busca" id="busca" value="">

            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="0">Escolha</option>
                <option value="1">id_usuario</option>
                <option value="2">Nome</option>
                <option value="3">Email</option>
                <option value="4">Senha</option>
            </select>

            <button type="submit">Buscar</button>
        </fieldset>
    </form>

    <hr>

    <h2>Meus Usuários</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Ação</th>
        </tr>

        <?php
        if (!empty($lista)) {
            foreach($lista as $usuario) {
                echo "<tr>
                        <td>{$usuario->getIdUsuario()}</td>
                        <td>{$usuario->getNome()}</td>
                        <td>{$usuario->getEmail()}</td>
                        <td>{$usuario->getSenha()}</td>
                        <td><a href='cadastro.php?id_usuario={$usuario->getIdUsuario()}'>Editar</a></td>
                    </tr>";
            }
        } 
        ?>
    </table>
</body>
</html>
