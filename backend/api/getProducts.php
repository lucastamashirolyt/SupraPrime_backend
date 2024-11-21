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

// Prepare the SQL statement to fetch all products
$stmt = $conn->prepare("SELECT id, nome, preco, imagem FROM produtos");
if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    $produtos = [];
    while ($row = $result->fetch_assoc()) {
        $produtos[] = [
            'id' => $row['id'],
            'nome' => $row['nome'],
            'preco' => floatval($row['preco']),
            'imagem' => $row['imagem']
        ];
    }

    echo json_encode(['success' => true, 'produtos' => $produtos]);
    $stmt->close();
} else {
    // Error preparing the statement
    error_log("Erro na preparação da consulta: " . $conn->error);
    echo json_encode(['success' => false, 'message' => 'Erro interno do servidor.']);
}

// Close the connection
$conn->close();

// Clean (erase) the output buffer and turn off output buffering
// ob_end_clean(); // Remove this line