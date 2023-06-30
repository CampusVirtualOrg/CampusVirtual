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
  <h2>Veja as Disciplinas do seu curso!</h2>
  <h3>Curso: <?php echo $course ?></h3>
  <h3>Semestre: <?php echo $semestre ?></h3>
  <table>
  <tr>
    <th>Disciplina</th>
    <th>Código</th>
    <th class="last-column">Carga Horária</th>
  </tr>

  <?php
if (isset($_SESSION['disciplinas']) && !empty($_SESSION['disciplinas'])) {
  $disciplinas = $_SESSION['disciplinas'];

  $disciplinas = array_unique($disciplinas, SORT_REGULAR);

  foreach ($disciplinas as $disciplina) {
    echo "<tr>";
    echo "<td>" . $disciplina['nome_disciplina'] . "</td>";
    echo "<td>" . $disciplina['codigo'] . "</td>";
    echo "<td class='last-column'>" . $disciplina['carga_horaria'] . "</td>";
    echo "</tr>";
  }
}
?>
</table>
</body>

</html>
