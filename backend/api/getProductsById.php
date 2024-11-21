<?php
header('Content-Type: application/json');
include('config.php'); // Inclua o arquivo de configuração para a conexão com o banco de dados

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
        echo json_encode(['success' => true, 'produto' => $produto]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Produto não encontrado.']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'ID do produto não fornecido.']);
}

$conn->close();
?>