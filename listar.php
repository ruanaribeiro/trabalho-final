<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style2.css">
    <title>cadastro</title>
</head>
<body class="listar">
    <h1>cadastro</h1>

    <?php
    $stmt = $pdo->query('SELECT * FROM cadastro ORDER BY id');
    $cadastros = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($cadastros)==0) {
        echo '<p>sem cadastro.</p>';
}else{
    echo '<table border="1">';
    echo '<thead>
                <tr>
                    <th>cadastro</th>
                    <th>E-mail</th>
                  
                    <th colspan="2">Opções</th>
                </tr>
            </thead>';
    echo '<tbody>';

    foreach ($cadastros as $cadastro) {
        echo '<tr>';
        echo '<td>' . $cadastro['tipo_conta'] . '</td>';
        echo '<td>' . $cadastro['email'] . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' .
        $cadastro['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' .
        $cadastro['id'] . '">Deletar</a></td>';
        

    }

    echo '</tbody>';
    echo '</table>';
    }
?>    
</body>
</html>