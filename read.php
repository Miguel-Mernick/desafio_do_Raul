<?php
// Conectar ao banco de dados
include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Consultar todos os usuários
$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch todos os dados

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="style.css"> <!-- Inclui o arquivo de estilo -->
</head>
<body>
    <div class="container">
        <h1>Lista de Usuários</h1>
        <a href="create.php" class="btn">Adicionar Novo Usuário</a>
        
        <!-- Tabela de usuários -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <!-- Links de Ação -->
                                <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn">Editar</a>
                                <a href="delete.php?id=<?php echo $user['id']; ?>" class="btn delete" onclick="return confirm('Deseja realmente excluir este usuário?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhum usuário encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
