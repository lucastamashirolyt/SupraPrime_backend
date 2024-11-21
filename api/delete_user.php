<?php
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $input = file_get_contents("php://input");
    parse_str($input, $params);
    $user_id = intval($params['id']);

    error_log("Recebido: " . $input); // Log para depuração
    error_log("ID do usuário: " . $user_id); // Log para depuração

    if ($user_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'ID de usuário inválido.']);
        exit();
    }

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Erro na preparação da consulta: ' . $conn->error]);
        exit();
    }
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Usuário deletado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao deletar usuário: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
}
?>