<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador</title>
    <!-- link favicon -->
    <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon" />
    <!-- link css -->
    <link rel="stylesheet" href="./styles/adm.css" />
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <!-- link Js -->
    <script src="../js/adm.js" defer></script>
  </head>

  <body>
    <aside>
      <a href="/" class="header-aside">
        <h2 id="h2-aside">Painel administrativo</h2>
        <h3 id="h3-aside">Campus Virtual</h3>
      </a>
      <div class="anchors">
        <a id="a-aside" href="alunos.php"><i class="bi bi-people-fill"></i>Alunos</a>

        <a id="a-aside" href="requerimentos.php"><i class="bi bi-file-earmark-text-fill"></i>Requerimentos</a>

        <a id="a-aside" href="/dashboard-admin/turmas" id="card-center"><i class="bi bi-easel2-fill"></i>Turmas
        </a>

        <a id="a-aside" href="/dashboard-admin/disciplinas"><i class="bi bi-book-half"></i>Disciplinas</a>

        <a id="a-aside" href="/dashboard-admin/cursos"><i class="bi bi-c-square-fill"></i>Cursos</a>
      </div>

      <a href="/" id="logoAside">
        <img src="./images/logoPortal.png" alt="Campus Virtual" id="logoAsideImg">
      </a>
    </aside>

    <section>
      <div class="header-section">

        <div class="perfil">
          <img src="./images/myPerfil.png" alt="" class="img-perfil" />
          <p>Olá, <span style="color: #3065ac; font-weight: 500;">Caio Rodrigues!</span></p>
        </div>

        <div class="box">
          <form name="search">
            <input type="text" class="input" name="txt" onmouseout="this.value = ''; this.blur();" />
            <i class="bi bi-search"></i>
          </form>
        </div>

        <div class="buttons">
          <i class="bi bi-bell-fill"></i>
          <i class="bi bi-caret-down-square-fill"></i>
          <a href="./index.html"><i class="bi bi-door-open-fill"></i></a>
        </div>
      </div>

      <div class="content">

        <a class="card" href="alunos.php">
          <div class="head">
            <i class="bi bi-people-fill"></i>
            <span class="card-title">Alunos</span>
          </div>
          <div class="texts">
            <p>Veja aqui tudo sobre alunos</p>
          </div>
        </a>

        <a class="card" href="requerimentos.php">
          <div class="head">
            <i class="bi bi-file-earmark-text-fill"></i>
            <span class="card-title">Requerimentos</span>
          </div>
          <div class="texts">
            <p>Veja os requerimentos</p>
          </div>
        </a>

        <a class="card" href="requerimentos.php">
          <div class="head">
            <i class="bi bi-book-half"></i>
            <span class="card-title">Turmas</span>
          </div>
          <div class="texts">
            <p>Veja todas as turmas</p>
          </div>
        </a>

        <a class="card" href="requerimentos.php">
          <div class="head">
            <i class="bi bi-file-earmark-text-fill"></i>
            <span class="card-title">Disciplinas</span>
          </div>
          <div class="texts">
            <p>Veja todas as disciplinas</p>
          </div>
        </a>

        <a class="card" href="requerimentos.php">
          <div class="head">
            <i class="bi bi-c-square-fill"></i>
            <span class="card-title">Cursos</span>
          </div>
          <div class="texts">
            <p>Veja todos os cursos</p>
          </div>
        </a>

      </div>
    </section>
  </body>

</html>