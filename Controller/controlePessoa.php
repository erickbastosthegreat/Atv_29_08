<?php
require_once('../Model/modelPessoa.php');
require_once('../Classes/pessoa.php');

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

switch ($acao) {
    case 'cadastrar':
        if (isset($_POST['nome'], $_POST['cpf'])) {
            $pessoa = new Pessoa();
            $pessoa->setNome($_POST['nome']);
            $pessoa->setCpf($_POST['cpf']);
            $pessoa->setTelefone($_POST['telefone']);

            $model = new ModelPessoa();
            $resultado = $model->create($pessoa);

            if ($resultado === true) {
                echo "Pessoa cadastrada com sucesso!";
            } else {
                echo "Erro ao cadastrar pessoa: " . $resultado;
            }
        } else {
            echo "Erro: Dados do formulário não foram enviados corretamente.";
        }
        break;

    case 'listar':
        $model = new ModelPessoa();
        $pessoas = $model->read();
        require_once('../View/listarPessoas.php');
        break;

    case 'editar':
        if (isset($_GET['id'])) {
            $model = new ModelPessoa();
            $pessoa = $model->getById($_GET['id']);
            if ($pessoa) {
                require_once('../View/formularioUpdate.php');
            } else {
                echo "Pessoa não encontrada.";
            }
        } else {
            echo "ID não fornecido.";
        }
        break;

    case 'atualizar':
        if (isset($_POST['id'], $_POST['nome'], $_POST['cpf'])) {
            $pessoa = new Pessoa();
            $pessoa->setId($_POST['id']);
            $pessoa->setNome($_POST['nome']);
            $pessoa->setCpf($_POST['cpf']);
            $pessoa->setTelefone($_POST['telefone']);

            $model = new ModelPessoa();
            $resultado = $model->update($pessoa);

            if ($resultado === true) {
                header("Location: controlePessoa.php?acao=listar&msg=sucesso_update");
                exit;
            } else {
                echo "Erro ao atualizar: " . $resultado;
            }
        } else {
            echo "Dados insuficientes para atualizar.";
        }
        break;

    case 'excluir':
        if (isset($_GET['id'])) {
            $model = new ModelPessoa();
            $resultado = $model->delete($_GET['id']);
            if ($resultado === true) {
                header("Location: controlePessoa.php?acao=listar&msg=sucesso_exclusao");
                exit;
            } else {
                echo "Erro ao excluir a pessoa: " . $resultado;
            }
        } else {
            echo "ID não fornecido para exclusão.";
        }
        break;

    default:
        echo "Ação inválida.";
        break;
}
?>