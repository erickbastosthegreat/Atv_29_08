<?php
if (!isset($pessoa)) {
    die("Erro: Dados da pessoa não encontrados para edição.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Pessoa</title>
</head>
<body>
    <h2>Editar Dados de <?= htmlspecialchars($pessoa['nome']) ?></h2>
    <form action="../Controller/controlePessoa.php?acao=atualizar" method="post">
        
        <input type="hidden" name="id" value="<?= $pessoa['id'] ?>">

        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($pessoa['nome']) ?>" required><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($pessoa['cpf']) ?>" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($pessoa['telefone']) ?>"><br><br>

        <input type="submit" value="Salvar Alterações">
    </form>
    <br>
    <a href="../Controller/controlePessoa.php?acao=listar">Cancelar e Voltar para a Lista</a>
</body>
</html>