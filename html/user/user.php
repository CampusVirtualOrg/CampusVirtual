<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../img/logoPortal.png"
      type="image/x-icon"
    />
    <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/user/user.css" />
    <title>Usuário</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <script src="../js/user.js" defer></script>
  </head>

  <body>
    <header>
    <div class="header-left">
    <?php
    session_start();
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
          <input
            type="text"
            class="input"
            name="txt"
          />
        </form>
        <i class="bi bi-search"></i>
      </div>
      <div class="buttons">
        <div>
          <i class="bi bi-bell-fill notification-icon"></i>
          <button class="button-select" >
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
          <a href="#"
            ><p>
              <span class="title">Avisos</span>Veja aqui os avisos mais recentes publicados
              pelos professores.
            </p></a
          >
        </button>
        <button class="button-section">
          <i class="bi bi-layout-text-window img-section"></i>
          <a href="disciplina.php">
            <p>
              <span class="title">Disciplina</span>Aqui estão notas de atividades, trabalhos e
              etc.
            </p></a
          >
        </button>
        <button class="button-section">
          <i class="bi bi-receipt img-section"></i>         
           <a href="boletim.php">
            <p>
              <span class="title">Boletim</span>Notas e faltas do semestre aparecerão aqui.
            </p></a
          >
        </button>
        <button class="button-section">
          <i class="bi bi-check-square img-section"></i>          
          <a href="#">
            <p><span class="title">Registro</span>Seus registros estão aqui.</p></a
          >
        </button>
        <button class="button-section">
          <i class="bi bi-pencil-square img-section"></i>          
          <a href="requeriments.php">
            <p>
              <span class="title">Requerimentos</span>Faça seus requerimentos pro bloco
              administrativo.
            </p></a
          >
        </button>
        
      </section>
      <i class="bi bi-chat chat-icon" ></i>

    
  </body>
</html>
