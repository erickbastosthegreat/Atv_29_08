<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas Cadastradas</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Pessoas Cadastradas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($pessoas) && !empty($pessoas)) {
                foreach ($pessoas as $pessoa) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($pessoa['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($pessoa['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($pessoa['cpf']) . "</td>";
                    echo "<td>" . htmlspecialchars($pessoa['telefone']) . "</td>";
                    echo "<td>";
                    echo "<a href='../Controller/controlePessoa.php?acao=editar&id=" . $pessoa['id'] . "'>Editar</a>";
                    echo " | <a href='../Controller/controlePessoa.php?acao=excluir&id=" . $pessoa['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir esta pessoa?\");'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhuma pessoa cadastrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="formulario.html">Voltar para o Cadastro</a>
</body>
</html>