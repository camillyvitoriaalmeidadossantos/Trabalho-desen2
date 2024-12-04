<?php
require_once("../classes/autoload.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_categoria =  isset($_POST['id_categoria']) ? $_POST['id_categoria']:0; 
        $descricao = isset($_POST['descricao'])?$_POST['descricao']:"";
        $acao =  isset($_POST['acao']) ? $_POST['acao']:0; 
        $destino = "../imagens/" . $arquivo['name'];  

    try{
        $livro = new Categorias($id_categoria, $descricao);  

        
    $resultado = "";
            if($acao == 'salvar'){
                if($id_categoria > 0) 
                $resultado = $categoria->alterar();
            else 
                $resultado = $categoria->incluir();

            }elseif ($acao == 'excluir'){ 
                $resultado = $categoria->excluir();
            }
            $_SESSION['MSG'] = "Dados inseridos/Alterados com sucesso!";
            move_uploaded_file($arquivo['tmp_name'],$destino);
        
        }catch(Exception $e){ 
            $_SESSION['MSG'] = $e->getMessage();
    
        }finally{
            header('location: index.php');
       }
         }elseif($_SERVER['REQUEST_METHOD'] == 'GET'){ 
            $id_categoria =  isset($_GET['id_categoria'])?$_GET['id_categoria']:0; 
            $msg = (isset($_SESSION['MSG'])?$_SESSION['MSG']:"");
            if ($msg != ""){
                echo "<h2>{$msg}</h2>";
                unset($_SESSION['MSG']);
            }
   
            if ($id_categoria > 0){
                $trabalho2 = Categorias::listar(1,$id_categoria)[0];                                          
            }
            
                $busca =  isset($_GET['busca']) ? $_GET['busca']:0; 
                $tipo =  isset($_GET['tipo']) ? $_GET['tipo']:0; 
                $lista = Categorias::listar($tipo,$busca);
            }
?>
