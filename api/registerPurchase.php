
<?php
session_start();
header('Content-Type: application/json');
include('config.php'); // Inclua o arquivo de configuração para a conexão com o banco de dados

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não está logado.']);
    exit();
}

$user_id = $_SESSION['user_id'];
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$cart = $data['cart'] ?? [];

if (empty($cart)) {
    echo json_encode(['success' => false, 'message' => 'Carrinho vazio.']);
    exit();
}

$stmt = $conn->prepare("INSERT INTO registros_clientes (user_id, produto_id, quantidade, data_compra) VALUES (?, ?, ?, NOW())");

foreach ($cart as $item) {
    $produto_id = $item['id'];
    $quantidade = 1; // Ajuste conforme necessário
    $stmt->bind_param("iii", $user_id, $produto_id, $quantidade);
    $stmt->execute();
}

$stmt->close();
$conn->close();

echo json_encode(['success' => true, 'message' => 'Compra registrada com sucesso.']);
?>