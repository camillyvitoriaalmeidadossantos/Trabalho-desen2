<?php
    session_start();
    include_once('autor.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9; 
        }

        header {
            background-color: #0044cc; 
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #0077ff;
            border-radius: 6px;
            margin-top: 10px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #0044cc;
            font-size: 28px;
            margin-bottom: 20px;
        }

        form {
            margin: 20px 0;
        }

        fieldset {
            padding: 20px;
            border: 2px solid #0044cc;
            border-radius: 8px;
            background-color: #f0f4ff; 
        }

        legend {
            font-weight: bold;
            color: #0044cc;
            font-size: 18px;
        }

        label {
            margin-right: 10px;
            color: #333;
            font-size: 14px;
        }

        input[type="text"], select {
            padding: 12px;
            margin-bottom: 15px;
            margin-top: 10px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="text"] {
            border-color: #0044cc;
            outline: none;
        }

        button {
            padding: 10px 20px;
            background-color: #0044cc;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f0f4ff;
            color: #0044cc;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            color: #0044cc;
            text-decoration: none;
            font-weight: bold;
            padding: 6px 12px;
            background-color: #f0f4ff;
            border-radius: 6px;
            /* transition: background-color 0.3s ease; */
        }

        .btn-edit {
            padding: 6px 15px;
            background-color: #66ccff;
            color: #0044cc;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <a href="cadastro.php">Novo</a>
    </header>

    <div class="container">
        <!-- <h3><?= $msg ?></h3> -->

        <form action="" method="get">
        <fieldset>
            <legend>Pesquisa de Autores</legend>

            <label for="busca">Busca:</label>
            <input type="text" name="busca" id="busca" value="">

            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="0">Escolha</option>
                <option value="1">id_autor</option>
                <option value="2">Nome</option>
                <option value="3">Sobrenome</option>
            </select>

            <button type="submit">Buscar</button>
        </fieldset>
    </form>

        <hr>
        <h1>Autores Cadastrados</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Editar</th>
            </tr>
        <?php
        if (!empty($lista)) {
            foreach($lista as $autor) {
                echo "<tr>
                        <td>{$autor->getIdAutor()}</td>
                        <td>{$autor->getNome()}</td>
                        <td>{$autor->getSobrenome()}</td>
                        <td><a href='cadastro.php?id_autor={$autor->getIdAutor()}'>Editar</a></td>
                    </tr>";
            }
        } 
        ?>
        </table>
    </div>
</body>
</html>
