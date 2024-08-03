<?php
session_start();
include_once('config.php'); // Arquivo de configuração do banco de dados

// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    header("location:../Cadastro/TelaLogin.php");
    exit;
}

$email = $_SESSION['email'];

// Buscar os dados do usuário a partir do banco de dados
$query = "SELECT * FROM Motorista WHERE email = '$email'";
$result = $conexao->query($query);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Usuário não encontrado.";
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
<h2>Editar Perfil</h2>
<form action="atualizarPerfil.php" method="POST">
    <div class="inputBox">
        <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
        <label for="nome">Nome Completo</label>
    </div>

    <div class="inputBox">
        <input type="password" name="senha" required>
        <label for="senha">Senha</label>
    </div>

    <div class="inputBox">
        <input type="text" name="cpf" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" required>
        <label for="cpf">CPF</label>
    </div>

    <div class="inputBox">
        <input type="text" name="telefone" value="<?php echo htmlspecialchars($usuario['telefone']); ?>" required>
        <label for="telefone">Número de Telefone</label>
    </div>

    <div class="inputBox">
        <input type="text" name="cidade" value="<?php echo htmlspecialchars($usuario['cidade']); ?>" required>
        <label for="cidade">Cidade</label>
    </div>

    <div class="inputBox">
        <input type="text" name="estado" value="<?php echo htmlspecialchars($usuario['estado']); ?>" required>
        <label for="estado">Estado</label>
    </div>

    <div class="inputBox">
        <input type="text" name="endereco" value="<?php echo htmlspecialchars($usuario['endereco']); ?>" required>
        <label for="endereco">Endereço</label>
    </div>

    <div class="inputBox">
        <input type="text" name="carteira_motor" value="<?php echo htmlspecialchars($usuario['carteira_motor']); ?>" required>
        <label for="carteira_motor">Nº de Registro</label>
    </div>

    <input type="submit" name="submit" value="Salvar">
</form>
</body>
</html>