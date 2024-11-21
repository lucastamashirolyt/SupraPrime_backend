<?php
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    if ($user_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'ID de usuário inválido.']);
        exit();
    }

    $stmt = $conn->prepare("SELECT id, nome, email, role FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        echo json_encode(['success' => true, 'user' => $user]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Parâmetros insuficientes.']);
}
?>