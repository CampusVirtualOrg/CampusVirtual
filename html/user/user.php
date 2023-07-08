<?php

include_once("../../controllers/conexao.php");
session_start();

$id = $_SESSION['idAluno'];

$sql = "SELECT * FROM notificacoes WHERE aluno_id = :idAluno";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":idAluno", $id);
$stmt->execute();

$notificacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../img/logoPortal.png" type="image/x-icon" />
  <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon">
  <link rel="stylesheet" href="../../css/user/user.css" />
  <title>Usuário</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <script src="../js/user.js" defer></script>
</head>

<body>
  <header>
    <div class="header-left">
      <?php
      if (isset($_SESSION['nome']) && isset($_SESSION['imagem'])) {
        $nomeUsuario = $_SESSION['nome'];
        $nomeImagem = $_SESSION['imagem'];
        $caminhoImagem = "../../uploads/" . $nomeImagem;
        echo "<img src='$caminhoImagem' alt='Imagem do perfil' class='img-perfil' />";
        echo "<div>";
        echo "<p>Olá, <span class='user_name'>$nomeUsuario</span></p>";
        echo "</div>";
      } else {
        echo "<p>Olá convidado</p>";
      }
      ?>
    </div>
    <div class="box">
      <form name="search">
        <input type="text" class="input" name="txt" />
      </form>
      <i class="bi bi-search"></i>
    </div>
    <div class="buttons">
      <div class="notfications-sect">
        <i class="bi bi-bell-fill notification-icon" id="notBtn"></i>
        <div class="notDad" id="notDad">
          <div class="notifications" id="notifications">
            <div class="notHeader">
              <span>Notificações</span>
              <a href="../../controllers/delete_notificacao.php?id=<?= $id ?>">LIMPAR TODAS</a>
            </div>
            <?php foreach ($notificacoes as $notificacao) : ?>
              <div class="notCard">
                <div class="notMessage">

                  <i class="bi bi-pencil-square img-section"></i>

                  <?php if ($notificacao['status_requerimento'] == "concluido") : ?>
                    <span><?= $notificacao['mensagem'] ?> <span class="bolders" style="color: green;"><?= $notificacao['status_requerimento'] ?>.</span>
                    </span>

                  <?php elseif ($notificacao['status_requerimento'] == "rejeitado") : ?>
                    <span><?= $notificacao['mensagem'] ?> <span class="bolders" style="color: red;"><?= $notificacao['status_requerimento'] ?>.</span>
                    </span>

                  <?php elseif ($notificacao['status_requerimento'] == "pendente") : ?>
                    <span><?= $notificacao['mensagem'] ?> <span class="bolders" style="color: yellow;"><?= $notificacao['status_requerimento'] ?>.</span>
                    </span>
                  <?php endif ?>
                </div>
                <a href="../../controllers/delete_notificacao.php?id=<?= $id ?>&notId=<?= $notificacao['id'] ?>">LIMPAR</a>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>

      <button class="button-select">
        <i class="bi bi-caret-down"></i>
      </button>

      <a href="../../index.php"><i class="bi bi-box-arrow-left fs-1"></i></a>
    </div>
    <div class="select-wrapper"></div>
    </div>
  </header>
  <section>
    <button class="button-section">
      <i class="bi bi-app-indicator img-section"></i>
      <a href="./avisos.php">
        <p>
          <span class="title">Avisos</span>Veja aqui os avisos mais recentes publicados
          pelos professores.
        </p>
      </a>
    </button>
    <button class="button-section">
      <i class="bi bi-layout-text-window img-section"></i>
      <a href="disciplina.php">
        <p>
          <span class="title">Disciplina</span>Aqui estão notas de atividades, trabalhos e
          etc.
        </p>
      </a>
    </button>
    <button class="button-section">
      <i class="bi bi-receipt img-section"></i>
      <a href="boletim.php">
        <p>
          <span class="title">Boletim</span>Notas e faltas do semestre aparecerão aqui.
        </p>
      </a>
    </button>
    <button class="button-section">
      <i class="bi bi-check-square img-section"></i>
      <a href="#">
        <p><span class="title">Registro</span>Seus registros estão aqui.</p>
      </a>
    </button>
    <button class="button-section">
      <i class="bi bi-pencil-square img-section"></i>
      <a href="requeriments.php">
        <p>
          <span class="title">Requerimentos</span>Faça seus requerimentos pro bloco
          administrativo.
        </p>
      </a>
    </button>

  </section>
  <i class="bi bi-chat chat-icon"></i>

  <script>
    var buttonToggle = document.getElementById('notBtn');
    var notifications = document.getElementById('notDad');

    buttonToggle.addEventListener('click', () => {
      notifications.style.display = 'block';
    })

    buttonToggle.addEventListener('dblclick', ()=>{
      notifications.style.display = 'none';
    })

    // Tentei fazer ficar visivel de acordo com isso abaixo mas não foi

    // let visible = false;

    // buttonToggle.addEventListener('click', ()=>{
    //   visible = !visible;
    //   console.log(visible)
    // })

    // if (visible == true) {
    //   notifications.style.display = 'block';
    // }
  </script>
</body>

</html>