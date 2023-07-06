<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link rel="shortcut icon" href="../img/logoPortal.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/styleRegister.css">
    <!-- link favicon -->
    <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon" />
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  </head>

  <body>
    <aside>
      <a href="./admin.php" class="header-aside">
        <h2 id="h2-aside">Painel administrativo</h2>
        <h3 id="h3-aside">Campus Virtual</h3>
      </a>
      <div class="anchors">
        <a id="a-aside" href="registroAluno.php"><i class="bi bi-people-fill"></i>Alunos</a>

        <a id="a-aside" href="requerimentos.php"><i class="bi bi-file-earmark-text-fill"></i>Requerimentos</a>

        <a id="a-aside" href="/dashboard-admin/turmas" id="card-center"><i class="bi bi-easel2-fill"></i>Turmas
        </a>

        <a id="a-aside" href="/dashboard-admin/disciplinas"><i class="bi bi-book-half"></i>Disciplinas</a>

        <a id="a-aside" href="/dashboard-admin/cursos"><i class="bi bi-c-square-fill"></i>Cursos</a>
      </div>

      <a href="./admin.php" id="logoAside">
        <img src="./images/logoPortal.png" alt="Campus Virtual" id="logoAsideImg">
      </a>
    </aside>
    <section>
      <form id="myForm" action="../../controllers/process.php" method="POST" enctype="multipart/form-data">
        <h1>Registrar novo aluno</h1>
        <div class="background-form">
          <div class="form form-column">
            <div class="labels-inputs">
              <label for="name">Nome</label>
              <input type="text" id="name" name="name" placeholder="Nome" required />
            </div>
            <div class="labels-inputs">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Email" required />
            </div>
            <div class="labels-inputs">
              <label for="matricula">Matrícula</label>
              <input type="text" id="matricula" name="matricula" placeholder="Matrícula" require>
            </div>
            <div class="labels-inputs">
              <label for="password">Senha</label>
              <input type="password" id="password" name="passwd" placeholder="Senha" required
                autocomplete="current-password" />
            </div>
            <div class="labels-inputs">
              <label for="cpf">CPF</label>
              <input type="text" id="cpf" name="cpf" placeholder="CPF" required />
            </div>
            <div class="labels-inputs">
              <label for="course">Curso</label>
              <select name="curso_id">
  <option value="1">Sistemas para Internet</option>
  <option value="2">Administração</option>
  <option value="3">Gestão de Qualidade</option>
  <option value="4">Logística</option>
</select>

            </div>
          </div>
          
          <div class="form form-column">
            <div class="labels-inputs">
              <label for="tel">Telefone</label>
              <input type="tel" id="tel" name="telefone" placeholder="Telefone" />
            </div>
            <div class="labels-inputs">
              <label for="address">Endereço</label>
              <input type="text" id="address" name="endereco" placeholder="Endereço" required />
            </div>
            <div class="labels-inputs">
              <label for="semestre">Semestre</label>
              <input type="text" name="semestre" id="semestre" placeholder="2023.2">
            </div>
            <div class="labels-inputs">
              <label for="sexo">Sexo:</label>
              <select id="sexo" name="sexo">
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outro">Outro</option>
              </select>
            </div>
            <div class="labels-inputs">
              <label for="date">Data Nascimento</label>
              <input type="date" id="date" name="data_nascimento" required />
            </div>
            
            <div class="buttons">
              <button class="button-cancel buttons" type="reset">Cancelar</button>
              <button class="button-save buttons" type="submit">
                Salvar
              </button>
            </div>
          </div>
          <div class="form form-column">
            <div class="labels-inputs">
              <label for="image">Imagem</label>
              <input type="file" id="image" name="imagem" enctype="multipart/form-data" />
              <img id="preview" src="#" alt="">
            </div>
          </div>
    
        </div>
        </form>
      </section>

    <script src="../js/home.js"></script>
    <script>
      function previewImage() {
        var preview = document.querySelector('#preview');
        var file = document.querySelector('#image').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
          preview.src = reader.result;
          preview.style.display = 'block'; // Tornar a imagem visível
        }

        if (file) {
          reader.readAsDataURL(file);
        } else {
          preview.src = "";
          preview.style.display = 'none'; // Ocultar a imagem se nenhum arquivo for selecionado
        }
      }

      // Associar a função à mudança do input de arquivo
      document.querySelector('#image').addEventListener('change', previewImage);
    </script>
  </body>

</html>