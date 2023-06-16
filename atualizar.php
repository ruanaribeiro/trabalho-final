<?php
include 'db.php';
if (!isset($_GET['id'])){
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo -> prepare('SELECT * FROM cadastro WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment){
    header('Location : listar.php');
    exit;
}

$email = $appointment['email'];
$tipo_conta = $appointment['tipo_conta'];


?>

<!DOCTYPE html>
<html>
<head>
    <title>atualizar compromisso</title>
</head>
<body>
    <h1>atualizar compromisso</h1>
    <form method="post">

        <label for="email">email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"required><br>

        <label for="tipo_conta">tipo_conta:</label>
        <input type="text" name="tipo_conta" value="<?php echo $tipo_conta; ?>"required><br>

        <button type="submit">atualizar</button>
</form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['email'], $_POST['tipo_conta'])) {
    $email = $_POST['email'];
    $tipo_conta = $_POST['tipo_conta'];
    $stmt = $pdo->prepare('UPDATE cadastro SET email=?, tipo_conta=? WHERE id = ?');
    $stmt->execute([$email, $tipo_conta, $id]);
    header('Location: listar.php');
exit;
}}
?>