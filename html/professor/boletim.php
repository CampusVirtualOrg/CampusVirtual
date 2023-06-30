<?php
include_once("../../controllers/conexao.php");
session_start();
if (isset($_SESSION['nome']) && isset($_SESSION['curso']) && isset($_SESSION['semestre'])) {
  $nome = $_SESSION['nome'];
  $course = $_SESSION['curso'];
  $semestre = $_SESSION['semestre'];
}

$mediaFinal = 6.3;
$mediaFinal2 = 8.9;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boletim</title>

  <link rel="stylesheet" href="../../css/user/boletim.css">
  <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon">
</head>

<body>
  <h1>Olá, <?php echo $nome ?></h1>
  <h2>Atualize as notas e médias dos seus alunos.</h2>
</body>

</html>