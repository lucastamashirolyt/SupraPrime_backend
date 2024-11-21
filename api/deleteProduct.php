<?php
// FILE: deleteProduct.php

header('Content-Type: application/json');

// Incluir o arquivo de configuração usando o caminho absoluto baseado no diretório atual
include(__DIR__ . '/config.php');

// Desabilitar exibição de erros para evitar que mensagens de erro sejam enviadas no JSON
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

// Verificar método da requisição
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
    exit();
}

// Obter o ID do produto a ser deletado a partir da query string
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Preparar a consulta para deletar o produto
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo json_encode(['success' => true, 'message' => 'Produto deletado com sucesso.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Produto não encontrado.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro na execução: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro na preparação da consulta: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID de produto inválido.']);
}

$conn->close();
?>