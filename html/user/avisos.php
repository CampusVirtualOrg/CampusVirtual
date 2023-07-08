<?php
include_once("../../controllers/conexao.php");
session_start();
if (isset($_SESSION['nome'])) {
  $nome = $_SESSION['nome'];

  try {
    $sql = "SELECT * FROM avisos;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $avisos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$avisos) {
      $avisos = "Nenhum Aviso Por Aqui";
    }
  } catch (PDOException $e) {
    echo "Erro na execução da consulta: " . $e->getMessage();
  }
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boletim</title>

  <link rel="stylesheet" href="../../css/user/avisos.css">
  <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon">
</head>

<body>
  <div class="header">
    <h1>Olá, <?php echo $nome ?></h1>
    <h2>Confira os avisos enviados pelos professores!</h2>
  </div>

  <main>
    <?php foreach ($avisos as $aviso) : ?>
      <div class="card">
        <div class="cardHeader">
          <h3><?= $aviso['remetente'] ?></h3>
          <span><?= $aviso['data'] ?></span>
        </div>
        <div class="cardContent">
          <p><?= $aviso['aviso'] ?></p>
        </div>
      </div>
    <?php endforeach ?>
  </main>
</body>

</html>