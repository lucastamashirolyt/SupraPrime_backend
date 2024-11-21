<?php
header('Content-Type: application/json');
include('config.php'); // Inclua o arquivo de configuração para a conexão com o banco de dados

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 9; // Número de produtos por página (múltiplo de 3)
$offset = ($page - 1) * $limit;
$start_id = isset($_GET['start_id']) ? intval($_GET['start_id']) : 0;
$end_id = isset($_GET['end_id']) ? intval($_GET['end_id']) : 0;

$stmt = $conn->prepare("SELECT * FROM produtos WHERE id BETWEEN ? AND ? ORDER BY id LIMIT ? OFFSET ?");
$stmt->bind_param("iiii", $start_id, $end_id, $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
$produtos = [];

while ($row = $result->fetch_assoc()) {
    $produtos[] = $row;
}

// Adicionar produtos "indisponíveis" se necessário
while (count($produtos) < $limit) {
    $produtos[] = [
        'id' => 0,
        'nome' => 'Indisponível',
        'imagem' => 'img/indisponivel.png', // Caminho para a imagem padrão
        'preco' => 0.00
    ];
}

echo json_encode(['success' => true, 'produtos' => $produtos]);

$stmt->close();
$conn->close();
?>