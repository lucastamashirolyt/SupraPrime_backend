<?php
session_start();
header('Content-Type: application/json');
include('config.php');

// Receber dados JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

$nome = trim($data['nome'] ?? '');
$email = trim($data['email'] ?? '');
$senha = trim($data['senha'] ?? '');
$telefone = trim($data['telefone'] ?? '');
$data_nascimento = trim($data['data_nascimento'] ?? '');
$genero = trim($data['genero'] ?? '');
$endereco1 = trim($data['endereco1'] ?? '');
$endereco2 = trim($data['endereco2'] ?? '');
$pais = trim($data['pais'] ?? '');
$cidade = trim($data['cidade'] ?? '');
$regiao = trim($data['regiao'] ?? '');
$cep = trim($data['cep'] ?? '');

if (empty($nome) || empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos obrigatórios.']);
    exit();
}

$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
    echo json_encode(['success' => false, 'message' => 'Email inválido.']);
    exit();
}

// Verificar se o usuário já existe
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Usuário já existe.']);
    exit();
}

// Inserir novo usuário
$hashed_senha = password_hash($senha, PASSWORD_BCRYPT);
$stmt = $conn->prepare("INSERT INTO users (nome, email, senha, telefone, data_nascimento, genero, endereco1, endereco2, pais, cidade, regiao, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $nome, $email, $hashed_senha, $telefone, $data_nascimento, $genero, $endereco1, $endereco2, $pais, $cidade, $regiao, $cep);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Usuário registrado com sucesso.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao registrar usuário: ' . $conn->error]);
}

$stmt->close();
$conn->close();
?>