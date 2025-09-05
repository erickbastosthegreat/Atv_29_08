Como Configurar e Executar
Siga os passos abaixo para colocar o projeto em funcionamento.

1. Configuração do Banco de Dados
Crie o banco de dados: Abra o seu gerenciador de banco de dados e crie um novo banco de dados chamado Pessoa.

Importe a tabela: Com o banco de dados Pessoa selecionado, importe o arquivo pessoa.sql para criar a tabela Pessoa com a estrutura correta.

2. Configuração da Conexão
As credenciais de acesso ao banco de dados estão no arquivo Model/modelPessoa.php. Se você usa uma senha diferente de 'root' ou outra configuração, ajuste as seguintes linhas:

PHP

Em Atv_29_08/Model/modelPessoa.php:

public function __construct(){
    $host = 'localhost';
    $db = 'pessoa';
    $user = 'root';
    $senha = 'root'; <-- Altere aqui se sua senha for diferente
    $charset = 'utf8mb4';
}

3. Execução do Projeto
Mova os arquivos: Coloque a pasta Atv_29_08 dentro do diretório raiz do seu servidor web (geralmente htdocs no XAMPP).

Inicie os serviços: Inicie os módulos Apache e MySQL no painel de controle do seu XAMPP.

Acesse a aplicação: Abra seu navegador e acesse a URL para o formulário de cadastro:

http://localhost/Atv_29_08/View/form.html

A partir daí, você pode cadastrar novas pessoas e visualizar a lista de todos os cadastrados.
