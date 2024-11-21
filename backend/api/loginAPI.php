<?php
session_start(); // Inicia uma sessão segura
include('config.php');
// Habilitar exibição de erros (para desenvolvimento)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Receber dados do formulário via POST
$email = $_POST['email'] ?? '';
$senha = $_POST['password'] ?? ''; // Deve ser 'password' para corresponder ao frontend
$role = $_POST['role'] ?? 'user'; // Adicionado para definir o papel do usuário
// Verificar se os campos estão preenchidos
if (empty($email) || empty($senha)) {
    echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos.']);
    exit();
}
// Filtrar e validar o email
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
    echo json_encode(['success' => false, 'message' => 'Email inválido.']);
    exit();
}
// Preparar a consulta para evitar injeção de SQL
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Erro interno do servidor.']);
    exit();
}
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
// Verificar se o usuário existe
if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
    exit();
}
$user = $result->fetch_assoc();
if (password_verify($senha, $user['senha'])) {
    // Autenticação bem-sucedida
    session_regenerate_id(true); // Regenera o ID da sessão para segurança
    $_SESSION['user_id'] = $user['id']; // Ensure this line sets the session
    $_SESSION['user_name'] = $user['nome'];
    $_SESSION['isLoggedIn'] = true; // Adicionado para definir o estado de login
    $_SESSION['user_role'] = $user['role']; // Adicionado para definir o papel do usuário
    echo json_encode(['success' => true, 'message' => 'Login realizado com sucesso', 'role' => $user['role']]);
} else {
    // Senha incorreta
    echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
}
$conn->close();
?>