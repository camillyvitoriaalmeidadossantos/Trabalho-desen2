<!-- <?php
require_once("../classes/autoload.php");

class Categorias {
    private $id_categoria;
    private $descricao;

    public function __construct($id_categoria = 0, $descricao = "") { 
        $this->setIdCategoria($id_categoria);
        $this->setDescricao($descricao);
    }
    public function setIdCategoria($novoIdCategoria) { 
        if ($novoIdCategoria < 0) {
            throw new Exception("Erro: ID inválido!");
        } else {
            $this->id_categoria = $novoIdCategoria; 
        }
    }

    public function setDescricao($novoDescricao) { 
            $this->descricao = $novoDescricao;
        
    }
    public function getIdCategoria() { return $this->id_categoria; }
    public function getDescricao() { return $this->descricao; }

    public function incluir() {
        $sql = 'INSERT 
                 INTO Categorias (id_categoria, descricao) 
                 VALUES (:id_categoria, :descricao)';
        $parametros = [
            ':id_categoria' => $this->getIdCategoria(),
            ':descricao' => $this->getDescricao(),
        ];
        Database::executar($sql, $parametros);
    }

    public function excluir() {
        $sql = 'DELETE 
                FROM Categorias
                WHERE id_categoria = :id_categoria';
        $parametros = [
            ':id_categoria' => $this->getIdCategoria(),
        ];
        Database::executar($sql, $parametros);
    }

    public function alterar() {
        $sql = 'UPDATE Categorias 
                SET descricao = :descricao 
                WHERE id_categoria = :id_categoria';
        $parametros = [
            ':id_categoria' => $this->getIdCategoria(),
            ':descricao' => $this->getDescricao(),
        ];
        Database::executar($sql, $parametros);
    }

    public static function listar($tipo = 0, $busca = "") {
        $sql = "SELECT * FROM Categorias";
        $parametros = [];
        if ($tipo > 0) {
            switch($tipo) {
                case 1: $sql .= " WHERE id_categoria LIKE :busca"; break;
                case 2: $sql .= " WHERE descricao LIKE :busca"; $busca = "%{$busca}%"; break;
            }
            $parametros = [':busca' => $busca];
        }

        $comando = Database::executar($sql, $parametros);
        $trabalhos2 = [];

        while ($registro = $comando->fetch(PDO::FETCH_ASSOC)) {
            $categoria = new Categorias($registro['id_categoria'], $registro['descricao']);
            array_push($trabalhos2, $categoria);
        }
        return $trabalhos2;
    }
}
?> -->