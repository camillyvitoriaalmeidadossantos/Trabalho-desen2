<?php
abstract class Trabalhos2 {
    private $id_usuario;
    private $autor; 
    private $cliente; 
    private $livro;
    private $categoria;
    private $id_itens;
    private $compra;


    public function __construct($id_usuario = 0, $autor = 0, $cliente = 0, $livro = 0, $categoria = 0, $id_itens = 0, $compra = 0 ) {
        $this->setIdUsuario($id_usuario);
        $this->setAutor($autor);
        $this->setCliente($cliente);
        $this->setLivro($livro);
        $this->setCategoria($categoria);
        $this->setItens($id_itens);
        $this->setItens($compra);
    }

    public function setIdUsuario($novoIdUsuario) {
        if ($novoIdUsuario < 0)
            throw new Exception("Erro: id inválido!");
        else
            $this->id_usuario = $novoIdUsuario;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setLivro($livro) {
        $this->livro = $livro;
    }
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    public function setItens($id_itens) {
        if ($novoIdItens < 0)
        throw new Exception("Erro: id inválido!");
    else
        $this->id_itens = $id_itens;
    }
    public function setCompra($compra) {
        $this->compra = $compra;
    }

    public function getIdUsuario() { return $this->id_usuario; }
    public function getAutor() { return $this->autor; }
    public function getCliente() { return $this->cliente; }
    public function getLivro() { return $this->livro; }
    public function getCategoria() { return $this->categoria; }
    public function getIdItens() { return $this->id_itens; }
    public function getCompra() { return $this->compra; }

    abstract public function incluir();
    abstract public function excluir();
    abstract public function alterar();
    abstract public static function listar($tipo = 0, $busca = ""): array;

}
