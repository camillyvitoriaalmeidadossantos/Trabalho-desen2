<?php
require_once("../classes/autoload.php");

class Livro {
    private $id_livro;
    private $titulo;
    private $anoPublicacao;
    private $fotoCapa;
    private $autor;


    public function __construct($id_livro = 0, $titulo = "", $anoPublicacao = "", $fotoCapa = "", $autor = "") { 
        $this->setIdLivro($id_livro);
        $this->setTitulo($titulo);
        $this->setAnoPublicacao($anoPublicacao);
        $this->setFotoCapa($fotoCapa);
        $this->setAutor($autor);

    }
    public function setIdLivro($novoIdLivro) { 
        if ($novoIdLivro < 0) {
            throw new Exception("Erro: ID inválido!");
        } else {
            $this->id_livro = $novoIdLivro; 
        }
    }

    public function setTitulo($novoTitulo) { 
            $this->titulo = $novoTitulo;
        
    }

    public function setAnoPublicacao($novoAnoPublicacao) {    
            $this->anoPublicacao = $novoAnoPublicacao;
        
    }

    public function setFotoCapa($novoFotoCapa) {    
            $this->fotoCapa = $novoFotoCapa;
        
    }
    public function setAutor($novoAutor) {    
        $this->autor = $novoAutor;
    
}

    public function getIdLivro() { return $this->id_livro; }
    public function getTitulo() { return $this->titulo; }
    public function getAnoPublicacao() { return $this->anoPublicacao; }
    public function getFotoCapa() { return $this->fotoCapa; }
    public function getAutor() { return $this->autor; }


    public function incluir() {
        $sql = 'INSERT 
                 INTO Livro (id_livro, titulo, anoPublicacao, fotoCapa) 
                 VALUES (:id_livro, :titulo, :anoPublicacao, :fotoCapa)';
        $parametros = [
            ':id_livro' => $this->getIdLivro(),
            ':titulo' => $this->getTitulo(),
            ':anoPublicacao' => $this->getAnoPublicacao(),
            ':fotoCapa' => $this->getFotoCapa(),
        ];
        Database::executar($sql, $parametros);
    }

    public function excluir() {
        $sql = 'DELETE 
                FROM Livro 
                WHERE id_livro = :id_livro';
        $parametros = [
            ':id_livro' => $this->getIdLivro(),
        ];
        Database::executar($sql, $parametros);
    }

    public function alterar() {
        $sql = 'UPDATE Livro 
                SET titulo = :titulo, anoPublicacao = :anoPublicacao, fotoCapa = :fotoCapa 
                WHERE id_livro = :id_livro';
        $parametros = [
            ':id_livro' => $this->getIdLivro(),
            ':titulo' => $this->getTitulo(),
            ':anoPublicacao' => $this->getAnoPublicacao(),
            ':fotoCapa' => $this->getFotoCapa(),
        ];
        Database::executar($sql, $parametros);
    }

    public static function listar($tipo = 0, $busca = "") {
        $sql = "SELECT * FROM Livro";
        $parametros = [];
        if ($tipo > 0) {
            switch($tipo) {
                case 1: $sql .= " WHERE id_livro LIKE :busca"; break;
                case 2: $sql .= " WHERE titulo LIKE :busca"; $busca = "%{$busca}%"; break;
                case 3: $sql .= " WHERE anoPublicacao LIKE :busca"; $busca = "%{$busca}%"; break;
                case 4: $sql .= " WHERE fotoCapa LIKE :busca"; $busca = "%{$busca}%"; break;
            }
            $parametros = [':busca' => $busca];
        }

        $comando = Database::executar($sql, $parametros);
        $trabalhos2 = [];

        while ($registro = $comando->fetch(PDO::FETCH_ASSOC)) {
            $livro = new Livro($registro['id_livro'], $registro['titulo'], $registro['anoPublicacao'], $registro['fotoCapa']);
            array_push($trabalhos2, $livro);
        }
        return $trabalhos2;
    }
}
?>