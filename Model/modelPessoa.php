<?php
require_once "../Classes/pessoa.php";

class ModelPessoa{
    private $pdo;

    public function __construct(){
        $host = 'localhost';
        $db = 'pessoa';
        $user = 'root';
        $senha = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try{
            $this->pdo = new PDO($dsn,$user,$senha,$options);
        }catch(PDOException $e){
            die("Erro na conexão com o banco de dados:".$e->getMessage());
        }
    }

    public function create(Pessoa $pessoa){
        try{
            $sql = "INSERT INTO Pessoa(nome, cpf, telefone) VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $pessoa->getNome(),
                $pessoa->getCpf(),
                $pessoa->getTelefone()
            ]);
            return true;
        }catch(PDOException $e){
            if($e->getCode()==23000){
                return "Erro: CPF já cadastrado.";
            }
            return "Erro ao cadastrar:".$e->getMessage();
        }
    }

    public function read(){
        try{
            $sql = "SELECT * from Pessoa order by nome asc" ;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            die("Erro ao listar pessoas".$e->getMessage());
        }
    }

    public function getById($id) {
        try {
            $sql = "SELECT * from Pessoa where id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            die("Erro ao buscar pessoa por ID: " . $e->getMessage());
        }
    }

    public function update(Pessoa $pessoa){
        try{
            $sql = "UPDATE Pessoa set nome = ?, cpf = ?, telefone = ? where id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $pessoa->getNome(),
                $pessoa->getCpf(),
                $pessoa->getTelefone(),
                $pessoa->geiId()
            ]);
            return true;
            }catch(PDOException $e){
                if($e->getCode()==23000){
                    return "Erro:O CPF informado já pertence a outro cadastro.";
                }
                return "Erro ao atualizar".$e->getMessage();
            }
        }


    public function delete($id){
        try{
            $sql = "DELETE from Pessoa where id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return true;
        }catch(PDOException $e){
            return "Erro ao excluir:".$egetMessage();
        }
    }

}
?>