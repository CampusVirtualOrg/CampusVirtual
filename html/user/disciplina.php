<?php
include_once("../../controllers/conexao.php");
session_start();
if (isset($_SESSION['nome']) && isset($_SESSION['curso']) && isset($_SESSION['semestre'])) {
  $nome = $_SESSION['nome'];
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

  <link rel="stylesheet" href="../../css/user/disciplina.css">
  <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon">
</head>

<body>
  <h1><?php echo $nome ?></h1>
  <h2>Confira as disciplinas em que está matriculado!</h2>
  <h3>Curso: <?php echo $course ?></h3>
  <h3>Semestre de entrada: <?php echo $semestre ?></h3>

  <table>
    <tr>
      <th>Disciplina</th>
      <th>Curso</th>
      <th>Semestre</th>
    </tr>

    <tr>
      <td>Disciplina</td>
      <td><?= $course ?></td>
      <td><?= $semestre ?></td>
    </tr>
  </table>
</body>

</html>