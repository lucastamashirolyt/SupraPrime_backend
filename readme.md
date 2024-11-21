# SupraPrime Backend

Este é o backend do projeto SupraPrime, uma aplicação para gerenciamento de usuários e produtos.

## Estrutura do Projeto


## Configuração

### Pré-requisitos

1. **XAMPP**: Certifique-se de ter o XAMPP instalado em sua máquina. Você pode baixar o XAMPP [aqui](https://www.apachefriends.org/index.html).

### Passos para Configuração

1. **Clone o repositório**:
    ```sh
    git clone https://github.com/lucastamashirolyt/SupraPrime_backend.git
    cd SupraPrime_backend
    ```

2. **Mover o projeto para o diretório do XAMPP**:
    - Copie o diretório clonado para o diretório `htdocs` do XAMPP. O caminho padrão é `C:\xampp\htdocs` no Windows.

3. **Configurar o banco de dados**:
    - Abra o arquivo `api/config.php` e configure as credenciais do banco de dados:
    ```php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "auth_app"; // Atualize conforme necessário
    ```

4. **Iniciar o XAMPP**:
    - Abra o painel de controle do XAMPP.
    - Inicie os módulos **Apache** e **MySQL** clicando em "Start" ao lado de cada um.

5. **Testar a conexão com o banco de dados**:
    - No terminal, execute:
    ```sh
    php api/testConfig.php
    ```
    - Você deve ver a mensagem "Conexão com o banco de dados estabelecida com sucesso!" se tudo estiver configurado corretamente.

## Endpoints da API

### Usuários

- **GET /api/getUserById.php?id={id}**
    - Retorna os detalhes de um usuário pelo ID.
    - Exemplo de resposta:
    ```json
    {
        "success": true,
        "user": {
            "id": 1,
            "nome": "John Doe",
            "email": "john@example.com",
            "role": "admin"
        }
    }
    ```

- **PUT /api/editUser.php**
    - Atualiza os detalhes de um usuário.
    - Exemplo de corpo da requisição:
    ```json
    {
        "id": 1,
        "nome": "John Doe",
        "email": "john@example.com",
        "role": "admin"
    }
    ```

- **POST /api/register.php**
    - Registra um novo usuário.
    - Exemplo de corpo da requisição:
    ```json
    {
        "nome": "John Doe",
        "email": "john@example.com",
        "senha": "password123",
        "telefone": "123456789",
        "data_nascimento": "1990-01-01",
        "genero": "M",
        "endereco1": "Rua A",
        "endereco2": "Apto 1",
        "pais": "Brasil",
        "cidade": "São Paulo",
        "regiao": "SP",
        "cep": "12345-678"
    }
    ```

- **DELETE /api/delete_user.php**
    - Deleta um usuário pelo ID.
    - Exemplo de corpo da requisição:
    ```json
    {
        "id": 1
    }
    ```

### Produtos

- **GET /api/getAllProducts.php**
    - Retorna todos os produtos com paginação.
    - Parâmetros opcionais: `page`, `start_id`, `end_id`.

- **GET /api/getProductsById.php?id={id}**
    - Retorna os detalhes de um produto pelo ID.

- **POST /api/createProduct.php**
    - Cria um novo produto.
    - Exemplo de corpo da requisição:
    ```json
    {
        "nome": "Produto A",
        "preco": 99.99,
        "imagem": "img/produto_a.png"
    }
    ```

- **PUT /api/updateProduct.php**
    - Atualiza os detalhes de um produto.
    - Exemplo de corpo da requisição:
    ```json
    {
        "id": 1,
        "nome": "Produto A",
        "preco": 99.99,
        "imagem": "img/produto_a.png"
    }
    ```

- **DELETE /api/deleteProduct.php?id={id}**
    - Deleta um produto pelo ID.

### Autenticação

- **POST /api/loginAPI.php**
    - Realiza o login de um usuário.
    - Exemplo de corpo da requisição:
    ```json
    {
        "email": "john@example.com",
        "password": "password123"
    }
    ```

- **GET /api/logout.php**
    - Realiza o logout do usuário.

### Compras

- **POST /api/registerPurchase.php**
    - Registra uma compra.
    - Exemplo de corpo da requisição:
    ```json
    {
        "cart": [
            { "id": 1, "quantidade": 2 },
            { "id": 2, "quantidade": 1 }
        ]
    }
    ```

<h1 align="center">  Autores </h1>

| [<img loading="lazy" src="https://avatars.githubusercontent.com/u/114181346?v=4" width=115><br><sub>Lucas Yuji</sub>](https://github.com/lucastamashirolyt) |  [<img loading="lazy" src="https://avatars.githubusercontent.com/u/142549426?v=4" width=115><br><sub>Gabriel Silveira</sub>](https://github.com/bielzin10mil) |  [<img loading="lazy" src="https://avatars.githubusercontent.com/u/142549465?v=4" width=115><br><sub>Gustavo Pascoal</sub>](https://github.com/gupascoal) |
| :---: | :---: | :---: |

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.
