<?php
session_start();
include_once('livro.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
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

        a {
            color: #0044cc;
            text-decoration: none;
            font-weight: bold;
            padding: 6px 12px;
            background-color: #f0f4ff;
            border-radius: 6px;
        }

 
    </style>
</head>
<body>
    <header>
        <a href="admin.php">Novo</a>
    </header>

    <div class="container">
        <h1>Lista de Meus Livros</h1>
        <form action="" method="get">
            <fieldset>
                <legend>Pesquisa de Livros</legend>
                <label for="busca">Busca:</label>
                <input type="text" name="busca" id="busca" value="">
                <label for="autor">Autor:</label>
                <select name="autor" id="autor">
                     <?php  
                        $autores = Autor::listar();
                        foreach($autores as $autor){ 
                            $str = "<option value='{$autor->getIdAutor()}' ";
                            if(isset($trabalhos2)) 
                                if ($trabalhos2->getAutor()->getIdAutor() == $autor->getIdAutor()) 
                                    $str .= " selected ";
                            $str .= ">{$autor->getNome()}</option>";
                            echo $str;
                        }     
                    ?>
                </select><br>
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo">
                    <option value="0">Escolha</option>
                    <option value="1">id_livro</option>
                    <option value="2">Titulo</option>
                    <option value="3">Ano</option>
                    <option value="4">Capa</option>
                </select>
                <button type="submit">Buscar</button>
            </fieldset>
        </form>

        <table>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Ano</th>
                <th>Capa</th>
                <th>Editar</th>
                <th>Visualizar</th>
            </tr>
            <?php
            if (!empty($lista)) {
                foreach ($lista as $livro) {
                    echo "<tr>
                            <td>{$livro->getIdLivro()}</td>
                            <td>{$livro->getTitulo()}</td>
                            <td>{$livro->getAnoPublicacao()}</td>
                            <td><img src='imagens/{$livro->getFotoCapa()}' alt='Capa do Livro' width='50'></td>
                            <td><a href='admin.php?id_livro={$livro->getIdLivro()}'>Editar</a></td>
                        </tr>";
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
