<?php

header('Content-Type: application/json');

// Start output buffering
// ob_start(); // Optional: Remove if not needed

// Disable error display
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// Log errors to a file
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');

// Include the configuration file
include(__DIR__ . '/config.php');

// Read the incoming JSON data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Verify JSON decoding
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['success' => false, 'message' => 'Dados JSON inválidos.']);
    exit();
}

// Validate and sanitize input data
$nome = isset($data['nome']) ? trim($data['nome']) : '';
$preco = isset($data['preco']) ? floatval($data['preco']) : 0;
$imagem = isset($data['imagem']) ? trim($data['imagem']) : '';

// Check for required fields
if (empty($nome) || $preco <= 0 || empty($imagem)) {
    echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos corretamente.']);
    exit();
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO produtos (nome, preco, imagem) VALUES (?, ?, ?)");
if (!$stmt) {
    error_log("Erro na preparação da consulta: " . $conn->error);
    echo json_encode(['success' => false, 'message' => 'Erro na preparação da consulta.']);
    exit();
}

// Bind parameters
$stmt->bind_param("sds", $nome, $preco, $imagem);

// Execute and check the result
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Produto criado com sucesso']);
} else {
    error_log("Erro ao criar produto: " . $stmt->error);
    echo json_encode(['success' => false, 'message' => 'Erro ao criar produto']);
}

// Close statement and connection
$stmt->close();
$conn->close();