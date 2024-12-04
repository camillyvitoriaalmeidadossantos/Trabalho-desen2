<?php
require_once("../classes/autoload.php");

class Autor {
    private $id_autor;
    private $nome;
    private $sobrenome;

    public function __construct($id_autor = 0, $nome = "", $sobrenome = "") { 
        $this->setIdAutor($id_autor);
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);
    }
    public function setIdAutor($novoIdAutor) { 
        if ($novoIdAutor < 0) {
            throw new Exception("Erro: ID inválido!");
        } else {
            $this->id_autor = $novoIdAutor; 
        }
    }

    public function setNome($novoNome) { 
            $this->nome = $novoNome;
        
    }

    public function setSobrenome($novoSobrenome) {    
            $this->sobrenome = $novoSobrenome;
        
    }

    public function getIdAutor() { return $this->id_autor; }
    public function getNome() { return $this->nome; }
    public function getSobrenome() { return $this->sobrenome; }

    public function incluir() {
        $sql = 'INSERT INTO Autor (id_autor, nome, sobrenome, ) 
                 VALUES (:id_autor, :nome, :sobrenome, )';
        $parametros = [
            ':id_autor' => $this->getIdAutor(),
            ':nome' => $this->getNome(),
            ':sobrenome' => $this->getSobrenome(),
        ];
        Database::executar($sql, $parametros);
    }

    public function excluir() {
        $sql = 'DELETE 
                FROM Autor 
                WHERE id_autor = :id_autor';
        $parametros = [
            ':id_autor' => $this->getIdAutor(),
        ];
        Database::executar($sql, $parametros);
    }

    public function alterar() {
        $sql = 'UPDATE Autor 
                SET nome = :nome, sobrenome = :sobrenome, 
                WHERE id_autor = :id_autor';
        $parametros = [
            ':id_autor' => $this->getIdAutor(),
            ':nome' => $this->getNome(),
            ':sobrenome' => $this->getSobrenome(),
        ];
        Database::executar($sql, $parametros);
    }

    public static function listar($tipo = 0, $busca = "") {
        $sql = "SELECT * FROM Autor";
        $parametros = [];
        if ($tipo > 0) {
            switch($tipo) {
                case 1: $sql .= " WHERE id_autor LIKE :busca"; break;
                case 2: $sql .= " WHERE nome LIKE :busca"; $busca = "%{$busca}%"; break;
                case 3: $sql .= " WHERE sobrenome LIKE :busca"; $busca = "%{$busca}%"; break;
            }
            $parametros = [':busca' => $busca];
        }

        $comando = Database::executar($sql, $parametros);
        $trabalhos2 = [];

        while ($registro = $comando->fetch(PDO::FETCH_ASSOC)) {
            $autor = new Autor($registro['id_autor'], $registro['nome'], $registro['sobrenome'],);
            array_push($trabalhos2, $autor);
        }
        return $trabalhos2;
    }
}
?>