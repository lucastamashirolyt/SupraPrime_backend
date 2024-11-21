# SupraPrime Backend

Este é o backend do projeto SupraPrime, uma aplicação para gerenciamento de usuários e produtos.

## Estrutura do Projeto


## Configuração

1. Clone o repositório:
    ```sh
    git clone https://github.com/lucastamashirolyt/SupraPrime_backend.git
    cd SupraPrime_backend
    ```

2. Configure o banco de dados no arquivo `api/config.php`:
    ```php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "auth_app"; // Atualize conforme necessário
    ```

3. Teste a conexão com o banco de dados:
    ```sh
    php api/testConfig.php
    ```

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

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.