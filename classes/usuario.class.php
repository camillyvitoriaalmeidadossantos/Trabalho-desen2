<?php
require_once("../classes/autoload.php");

class Usuario {
    private $id_usuario;
    private $nome;
    private $email;
    private $senha;

    public function __construct($id_usuario = 0, $nome = "", $email = "", $senha = "") { 
        $this->setIdUsuario($id_usuario);
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
    }
    public function setIdUsuario($novoIdUsuario) { 
        if ($novoIdUsuario < 0) {
            throw new Exception("Erro: ID inválido!");
        } else {
            $this->id_usuario = $novoIdUsuario; 
        }
    }

    public function setNome($novoNome) { 
       
            $this->nome = $novoNome;
        
    }

    public function setEmail($novoEmail) {    
      
            $this->email = $novoEmail;
        
    }

    public function setSenha($novoSenha) {    
        
            $this->senha = $novoSenha;
        
    }

    public function getIdUsuario() { return $this->id_usuario; }
    public function getNome() { return $this->nome; }
    public function getEmail() { return $this->email; }
    public function getSenha() { return $this->senha; }

    public function incluir() {
        $sql = 'INSERT INTO Usuario (id_usuario, nome, email, senha) 
                 VALUES (:id_usuario, :nome, :email, :senha)';
        $parametros = [
            ':id_usuario' => $this->getIdUsuario(),
            ':nome' => $this->getNome(),
            ':email' => $this->getEmail(),
            ':senha' => $this->getSenha(),
        ];
        Database::executar($sql, $parametros);
    }

    public function excluir() {
        $sql = 'DELETE 
                FROM Usuario 
                WHERE id_usuario = :id_usuario';
        $parametros = [
            ':id_usuario' => $this->getIdUsuario(),
        ];
        Database::executar($sql, $parametros);
    }

    public function alterar() {
        $sql = 'UPDATE Usuario 
                SET nome = :nome, email = :email, senha = :senha 
                WHERE id_usuario = :id_usuario';
        $parametros = [
            ':id_usuario' => $this->getIdUsuario(),
            ':nome' => $this->getNome(),
            ':email' => $this->getEmail(),
            ':senha' => $this->getSenha(),
        ];
        Database::executar($sql, $parametros);
    }

    public static function listar($tipo = 0, $busca = "") {
        $sql = "SELECT * FROM Usuario";
        $parametros = [];
        if ($tipo > 0) {
            switch($tipo) {
                case 1: $sql .= " WHERE id_usuario LIKE :busca"; break;
                case 2: $sql .= " WHERE nome LIKE :busca"; $busca = "%{$busca}%"; break;
                case 3: $sql .= " WHERE email LIKE :busca"; $busca = "%{$busca}%"; break;
                case 4: $sql .= " WHERE senha LIKE :busca"; $busca = "%{$busca}%"; break;
            }
            $parametros = [':busca' => $busca];
        }

        $comando = Database::executar($sql, $parametros);
        $trabalhos2 = [];

        while ($registro = $comando->fetch(PDO::FETCH_ASSOC)) {
            $usuario = new Usuario($registro['id_usuario'], $registro['nome'], $registro['email'], $registro['senha']);
            array_push($trabalhos2, $usuario);
        }
        return $trabalhos2;
    }
}
?>