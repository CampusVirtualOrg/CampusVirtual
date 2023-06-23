<?php
include_once("../../controllers/conexao.php");
session_start();
if (isset($_SESSION['nome']) && isset($_SESSION['matricula']) && isset($_SESSION['email']) && isset($_SESSION['cpf'])) {
  $name = $_SESSION['nome'];
  $matricula = $_SESSION['matricula'];
  $email = $_SESSION['email'];
  $cpf = $_SESSION['cpf'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Requerimentos</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/logoPortal.png" type="image/x-icon" />
  <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon">
  <!-- Link css -->
  <!-- icons bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../../css/user/requerimentos.css" />
</head>

<body>
  <div style="height:100vh; display:flex; flex-direction:column; align-items:center; justify-content:center; gap: 1rem;">
    <div style="display: flex; align-items: center; gap: 0.4rem;">
      <h1 style="font-size: 2.2rem; font-weight: 600; color: #3065ac;">Faça seu Requerimento</h1>
      <i style="color: #3065ac; font-size: 2rem;" class="bi bi-file-earmark-text-fill"></i>
    </div>
    
    <form id="myForm" action="../../controllers/requeriments.php" method="post" enctype="multipart/form-data">
      <div class="container-form">
        <div>

          <div class="form-label-input">
            <div class="label">
              <label for="name">Nome:</label>
            </div>
            <div>
              <input class='input' type='text' name='name' id='name' value='<?php echo $name ?>' placeholder='Nome' required>
            </div>
          </div>
          
          <div class="form-label-input">
            <div class="label">
              <label for="matricula">Matrícula:</label>
            </div>
            <div>
              <input type="text" id="matricula" name="matricula" value='<?php echo $matricula ?>' placeholder="Matrícula" require>
            </div>
          </div>
          
          <div class="form-label-input">
            <div class="label">
          <label for="email">Email:</label>
        </div>
        <div>
          <input class="input" type="email" name="email" id="email" value='<?php echo $email ?>' placeholder="Seu email" require>
        </div>
        </div>
        
      </div>
      
        <div class="form-label-input">
        <div class="label">
          <label for="cpf">CPF:</label>
        </div>
        <div>
          <input class="input" type="text" name="cpf" id="cpf" value='<?php echo $cpf ?>' placeholder="Seu cpf" require>
        </div>
        </div>

        <div class="form-label-input">
        <div class="label">
          <label for="requerimentos">Tipo:</label>
        </div>
        <select class="input" name="requerimentos" id="requerimentos">
          <option value="Escolher" selected>Escolher</option>
          <option value="Admissão por Transferência e Análise Curricular">Admissão por Transferência e Análise Curricular</option>
          <option value="Ajuste de Matrícula Semestral">Ajuste de Matrícula Semestral</option>
          <option value="Autorização para cursar disciplinas em outras Instituições de Ensino Superior">Autorização para cursar disciplinas em outras Instituições de Ensino Superior</option>
          <option value="Cancelamento de Matrícula">Cancelamento de Matrícula</option>
          <option value="Cancelamento de Disciplina">Cancelamento de Disciplina</option>
          <option value="Certificado de Conclusão">Certificado de Conclusão</option>
          <option value="Certidão - Autencidade">Certidão - Autencidade</option>
          <option value="Complementação de Matrícula">Complementação de Matrícula</option>
          <option value="Cópia Xerox de Documento">Cópia Xerox de Documento</option>
          <option value="Declaração de Colação de Grau e Tramitação de Diploma">Declaração de Colação de Grau e Tramitação de Diploma</option>
          <option value="Declaração de Matrícula ou Matrícula Vínculo">Declaração de Matrícula ou Matrícula Vínculo</option>
          <option value="Declaração de Monitoria">Declaração de Monitoria</option>
          <option value="Declaração para Estágio">Declaração para Estágio</option>
          <option value="Diploma 1ºvia/2º">Diploma 1ºvia/2º</option>
          <option value="Dispensa da prática de Educação Física">Dispensa da prática de Educação Física"</option>
          <option value="Declaração Tramitação de Diploma">Declaração Tramitação de Diploma</option>
          <option value="Ementa de disciplina">Ementa de disciplina</option>
          <option value="Guia de Transferência">Guia de Transferência</option>
          <option value="Histórico Escolar">Histórico Escolar</option>
          <option value="Isenção de disciplinas cursadas">Isenção de disciplinas cursadas</option>
          <option value="Justificativa de falta(s) ou prova 2º chamada">Justificativa de falta(s) ou prova 2º chamada</option>
          <option value="Matriz curricular">Matriz curricular</option>
          <option value="Reabertura de Matrícula">Reabertura de Matrícula</option>
          <option value="Reintegração para Cursar">Reintegração para Cursar</option>
          <option value="Solicitação de Conselho de Classe">Solicitação de Conselho de Classe</option>
          <option value="Trancamento de Matrícula">Trancamento de Matrícula</option>
          <option value="Transferência de Turno">Transferência de Turno</option>
          <option value="Lançamento de Nota">Lançamento de Nota</option>
          <option value="Revisão de Nota">Revisão de Nota</option>
          <option value="Revisão de Faltas">Revisão de Faltas</option>
          <option value="Tempo de escolaridade">Tempo de escolaridade</option>
          <option value="Outros">Outros</option>
        </select>
        </div>
        
        <label for="observation">Observações:</label>
        <textarea name="observation" id="observation" cols="20" rows="5"></textarea>
    

        <div class="submit-div">
          <input id="submit" class="submit" type="submit" value="Confirmar" onclick="mostrarDados()">
        </div>
      </div>
    </form>
  </div>
  <script src="../js/requerimentos.js"></script>
</body>

</html>