<?php
require_once("../classes/autoload.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_usuario =  isset($_POST['id_usuario']) ? $_POST['id_usuario']:0; 
        $nome = isset($_POST['nome'])?$_POST['nome']:"";
        $email = isset($_POST['email'])?$_POST['email']:"";
        $senha = isset($_POST['senha'])?$_POST['senha']:"";
        $acao =  isset($_POST['acao']) ? $_POST['acao']:0; 
        // $destino = "../".IMG."/".$arquivo['name'];
    
    try{
        $usuario = new Usuario($id_usuario,$nome,$email, $senha, );
        
    $resultado = "";
            if($acao == 'salvar'){
                if($id_usuario > 0) 
                $resultado = $usuario->alterar();
            else 
                $resultado = $usuario->incluir();

            }elseif ($acao == 'excluir'){ 
                $resultado = $usuario->excluir();
            }
            $_SESSION['MSG'] = "Dados inseridos/Alterados com sucesso!";
            move_uploaded_file($arquivo['tmp_name'],$destino);
        
        }catch(Exception $e){ 
            $_SESSION['MSG'] = $e->getMessage();
    
        }finally{
            header('location: index.php');
       }
         }elseif($_SERVER['REQUEST_METHOD'] == 'GET'){ 
            $id_usuario =  isset($_GET['id_usuario'])?$_GET['id_usuario']:0; 
            $msg = (isset($_SESSION['MSG'])?$_SESSION['MSG']:"");
            if ($msg != ""){
                echo "<h2>{$msg}</h2>";
                unset($_SESSION['MSG']);
            }
   
            if ($id_usuario > 0){
                $trabalho2 = Usuario::listar(1,$id_usuario)[0];                                          
            }
            
                $busca =  isset($_GET['busca']) ? $_GET['busca']:0; 
                $tipo =  isset($_GET['tipo']) ? $_GET['tipo']:0; 
                $lista = Usuario::listar($tipo,$busca);
            }
?>