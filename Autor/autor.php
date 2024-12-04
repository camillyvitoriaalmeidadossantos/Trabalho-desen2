<?php
    require_once("../classes/autoload.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_autor =  isset($_POST['id_autor']) ? $_POST['id_autor']:0; 
        $nome =  isset($_POST['nome']) ? $_POST['nome']:0; 
        $sobrenome =  isset($_POST['sobrenome']) ? $_POST['sobrenome']:0; 
        $arquivo = isset($_FILES['fundo'])?$_FILES['fundo']:"";
        $acao =  isset($_POST['acao']) ? $_POST['acao']:0; 
        // $destino = "../".IMG."/".$arquivo['name'];
    
    try{
        $autor = new Autor($id_autor, $nome, $sobrenome);
        
    $resultado = "";
            if($acao == 'salvar'){
                if($id_autor > 0) 
                $resultado = $autor->alterar();
            else 
                $resultado = $autor->incluir();

            }elseif ($acao == 'excluir'){ 
                $resultado = $autor->excluir();
            }
            $_SESSION['MSG'] = "Dados inseridos/Alterados com sucesso!";
            move_uploaded_file($arquivo['tmp_name'],$destino);
        
        }catch(Exception $e){ 
            $_SESSION['MSG'] = $e->getMessage();
    
        }finally{
            header('location: index.php');
       }
         }elseif($_SERVER['REQUEST_METHOD'] == 'GET'){ 
            $id_autor =  isset($_GET['id_autor'])?$_GET['id_autor']:0; 
            $msg = (isset($_SESSION['MSG'])?$_SESSION['MSG']:"");
            if ($msg != ""){
                echo "<h2>{$msg}</h2>";
                unset($_SESSION['MSG']);
            }
   
            if ($id_autor > 0){
                $trabalho2 = Autor::listar(1,$id_autor)[0];                                          
            }
            
                $busca =  isset($_GET['busca']) ? $_GET['busca']:0; 
                $tipo =  isset($_GET['tipo']) ? $_GET['tipo']:0; 
                $lista = Autor::listar($tipo,$busca);
            }
?>