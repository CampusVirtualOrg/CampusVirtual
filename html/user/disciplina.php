<?php
include_once("../../controllers/conexao.php");
session_start();
if (isset($_SESSION['curso']) && isset($_SESSION['semestre']))  {
$course = $_SESSION['curso'];
$semestre = $_SESSION['semestre'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disciplinas</title>
  <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon">
</head>
<body>
  <h1><?php echo $course ?></h1>
  <h3><?php echo $semestre ?></h3>
</body>
</html>