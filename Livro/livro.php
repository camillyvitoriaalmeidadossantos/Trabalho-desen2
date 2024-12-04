<?php
require_once("../classes/autoload.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_livro =  isset($_POST['id_livro']) ? $_POST['id_livro']:0; 
        $titulo = isset($_POST['titulo'])?$_POST['titulo']:"";
        $anoPublicacao = isset($_POST['anoPublicacao'])?$_POST['anoPublicacao']:"";
        // $fotoCapa = isset($_POST['fotoCapa'])?$_POST['fotoCapa']:"";
        $acao =  isset($_POST['acao']) ? $_POST['acao']:0; 
        $destino = "../imagens/" . $arquivo['name'];  

    try{
        $livro = new Livro($id_livro, $titulo, $anoPublicacao, $fotoCapa);  

        
    $resultado = "";
            if($acao == 'salvar'){
                if($id_livro > 0) 
                $resultado = $livro->alterar();
            else 
                $resultado = $livro->incluir();

            }elseif ($acao == 'excluir'){ 
                $resultado = $livro->excluir();
            }
            $_SESSION['MSG'] = "Dados inseridos/Alterados com sucesso!";
            move_uploaded_file($arquivo['tmp_name'],$destino);
        
        }catch(Exception $e){ 
            $_SESSION['MSG'] = $e->getMessage();
    
        }finally{
            header('location: index.php');
       }
         }elseif($_SERVER['REQUEST_METHOD'] == 'GET'){ 
            $id_livro =  isset($_GET['id_livro'])?$_GET['id_livro']:0; 
            $msg = (isset($_SESSION['MSG'])?$_SESSION['MSG']:"");
            if ($msg != ""){
                echo "<h2>{$msg}</h2>";
                unset($_SESSION['MSG']);
            }
   
            if ($id_livro > 0){
                $trabalho2 = Livro::listar(1,$id_livro)[0];                                          
            }
            
                $busca =  isset($_GET['busca']) ? $_GET['busca']:0; 
                $tipo =  isset($_GET['tipo']) ? $_GET['tipo']:0; 
                $lista = Livro::listar($tipo,$busca);
            }
?>
