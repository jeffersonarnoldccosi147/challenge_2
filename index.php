<?php

function findDuplicates($arr) {
    $result = [];
    $seen = [];

    foreach ($arr as $value) {
        if (isset($seen[$value])) {
            $result[] = $value;
        } else {
            $seen[$value] = true;
        }
    }

    return array_unique($result);
}

$n = 0;
$a = [];
$duplicates = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = isset($_POST['n']) ? intval($_POST['n']) : 0;
    $rawInput = isset($_POST['numbers']) ? $_POST['numbers'] : '';

    
    $a = preg_split('/[\s,]+/', $rawInput);
    $a = array_map('intval', $a);


    $duplicates = findDuplicates($a);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Verificar Números Duplicados</title>
</head>
<body>
    <center>
    <img src="img/dado.png" alt="logo" height="300" width="300" >
    <h1>Verificar Números Duplicados</h1>
    <br><br><br>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="n">Ingresa la cantidad de números:</label>
        <input type="text" name="n" id="n" required>
        <br>
        <label for="numbers">Ingresa los números separados por espacios o comas:</label>
        <input type="text" name="numbers" id="numbers" required>
        <br>
        <br><br><br>
        <button type="submit">Verificar Duplicados</button>
    </form>
    <br><br><br><br><br>

    <?php
   
    if (!empty($duplicates)) {
        echo "<p>Los números que se están repitiendo son: " . implode(', ', $duplicates) . "</p>";
    } else {
        echo "<p>No hay números que se estén repitiendo en la lista.</p>";
    }
    ?>
    </center>
</body>
</html>


