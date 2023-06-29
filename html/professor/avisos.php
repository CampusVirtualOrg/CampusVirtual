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
  <title>Avisos</title>

  <link rel="stylesheet" href="../../css/user/disciplina.css">
  <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon">

  <style>
    input,
    select {
      width: 18rem;
      height: 2.4rem;
      font-size: 12pt;
      border-radius: 8px;
      border: 2px solid #dfdfdf;
      background: none;
      padding: 0.4rem;
      outline: none;
    }

    textarea {
      border: 2px solid #dfdfdf;
      margin-bottom: 0.5rem;
      border-radius: 8px;
      font-size: 12pt;
      border-radius: 8px;
      padding: 0.4rem;
    }

    input:focus,
    textarea:focus,
    select:focus {
      outline: none;
      border: 2px solid #3065ac;
    }

    .submit {
      padding: 0.8rem;
      color: #fff;
      background-color: #3065ac;
      border: none;
      border-radius: 8px;
      transition: all 0.2s;
      font-size: 14pt;
      font-weight: 500;
      cursor: pointer;
      transition: ease 0.22s;
    }

    .submit:hover {
      background-color: #1d1d96;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: start;
      justify-content: center;
      gap: 1rem;
      margin-top: 2rem;
    }

    .avisoDiv, .titleDiv {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    label {
      font-size: 14pt;
    }
    
  </style>
</head>

<body>
  <h1>Olá <?= $nome  ?>Nome</h1>
  <h2>Mande seus avisos!</h2>
  <form action="#">
    <div class="titleDiv">
      <label for="title">Titulo do Aviso:</label>
      <input type="text" name="title">
    </div>
    <div class="avisoDiv">
      <label for="aviso">Aviso:</label>
      <textarea name="aviso" id="aviso" cols="50" rows="5"></textarea>
    </div>
    <button class="submit">Enviar aviso</button>
  </form>
</body>

</html>