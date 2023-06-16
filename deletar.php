<?php
include 'db.php';

if (!isset($_GET['id'])){
    header('location : listar.php');
    exit;
}

$id= $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM cadastro WHERE id =?');
$stmt->execute([$id]);
$appointment = $stmt -> fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('location : listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $stmt = $pdo->prepare('DELETE FROM cadastro WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: listar.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deletar cadastro</title>
</head>
<body>
    <h1> Deletar cadastro</h1>
    <p> tem certeza que deseja deletar o cadastro 
        <?php echo $appointment['email'];?>
        <?php echo $appointment['tipo_conta'];?>
       
        <form method="post">
            <button type="submit">Sim</button>
            <a href="listar.php">Não</a>
</form></body></html>
</body>
</html>
