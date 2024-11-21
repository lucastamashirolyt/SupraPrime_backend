<?php
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    $user_id = intval($data['id']);
    $nome = $conn->real_escape_string($data['nome']);
    $email = $conn->real_escape_string($data['email']);
    $role = $conn->real_escape_string($data['role']);

    if ($user_id <= 0 || empty($nome) || empty($email) || empty($role)) {
        echo json_encode(['success' => false, 'message' => 'Dados inválidos.']);
        exit();
    }

    $stmt = $conn->prepare("UPDATE users SET nome = ?, email = ?, role = ? WHERE id = ?");
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Erro na preparação da consulta: ' . $conn->error]);
        exit();
    }
    $stmt->bind_param("sssi", $nome, $email, $role, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Usuário atualizado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar usuário: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
}
?>
