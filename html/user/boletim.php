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
  <h2>Confira suas notas, faltas e médias!</h2>
  <h3>Curso: <?php echo $course ?></h3>
  <h3>Semestre de entrada: <?php echo $semestre ?></h3>

  <table>
    <tr>
      <th>Disciplina</th>
      <th>N1</th>
      <th>N2</th>
      <th>N3</th>
      <th>N4</th>
      <th>Faltas</th>
      <th>Média Final</th>
    </tr>

    <tr>
      <td style="background-color: #5585c4; color: white; font-weight: 600;">Testes</td>
      <td>4.0</td>
      <td>8.0</td>
      <td>7.0</td>
      <td>6.0</td>
      <td>4</td>
      <?php if($mediaFinal >= 7): ?>
        <td style="color: green; font-weight: 500;"><?= $mediaFinal ?></td>
      <?php else: ?>
        <td style="color: red; font-weight: 500;"><?= $mediaFinal ?></td>
      <?php endif ?>
    </tr>

    <tr>
      <td style="background-color: #5585c4; color: white; font-weight: 600;">Analises</td>
      <td>6.0</td>
      <td>10.0</td>
      <td>7.0</td>
      <td>7.0</td>
      <td>12</td>
      <?php if($mediaFinal2 >= 7): ?>
        <td style="color: green; font-weight: 500;"><?= $mediaFinal2 ?></td>
      <?php else: ?>
        <td style="color: red; font-weight: 500;"><?= $mediaFinal2 ?></td>
      <?php endif ?>
    </tr>
  </table>
</body>

</html>