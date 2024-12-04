<?php
    require_once('../config/config.inc.php');

class Database{
    static public $lastId;

    public static function getInstance(){ 
        try{ 
            return new PDO(DSN, USUARIO, SENHA);
        }catch(PDOException $e){
            echo "Erro ao conectar ao banco de dados: ".$e->getMessage(); 
        }
    }

    public static function conectar(){
        return Database::getInstance();
    }

    public static function preparar($conexao, $sql){
        return  $conexao->prepare($sql);
    }
    
    public static function vincular($comando,$parametros = array()){
        foreach($parametros as $key=>$value){
            $comando->bindValue($key,$value); 
        }
        return $comando;
    }

    public static function executar($sql,$parametros = array()){
        $conexao = self::conectar();
        $comando = self::preparar($conexao,$sql);
        $comando = self::vincular($comando, $parametros);
        try {
            $comando->execute();
            self::$lastId = $conexao->lastInsertId();
            return $comando;
        }catch(PDOException $e){
            throw new Exception ("Erro ao executar o comando no banco de dados: "
               .$e->getMessage()." - ".$comando->errorInfo()[2]);
        }
    }

}

