<?php
include_once("conexao.php");

$name = trim(htmlspecialchars(filter_input(INPUT_POST, 'name')));
$matricula = trim(htmlspecialchars(filter_input(INPUT_POST, 'matricula')));
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cpf = preg_replace('/[^0-9]/', '', htmlspecialchars(filter_input(INPUT_POST, 'cpf')));
$requerimento = filter_input(INPUT_POST, 'requerimentos');
$observation = trim(htmlspecialchars(filter_input(INPUT_POST, 'observation')));


try {
  // Obtém a data e hora atual no fuso horário de Brasília
  date_default_timezone_set('America/Sao_Paulo');
  $dataHoraRequerimento = new DateTime();
  
  // Extrai a data e hora em formatos adequados
  $dataRequerimento = $dataHoraRequerimento->format('Y-m-d'); // Formato AAAA-MM-DD
  $horaRequerimento = $dataHoraRequerimento->format('H:i:s'); // Formato HH:MM:SS
  
  // Prepara a consulta SQL para inserção dos dados na tabela requerimentos
  $sql = "INSERT INTO requerimentos (nome, matricula, email, cpf, tipo_requerimento, observacoes, data_requerimento, hora_requerimento) VALUES (:nome, :matricula, :email, :cpf, :tipo_requerimento, :observacoes, :data_requerimento, :hora_requerimento)";
  $stmt = $conn->prepare($sql);

  // Executa a consulta SQL passando os valores dos parâmetros
  $stmt->bindParam(':nome', $name);
  $stmt->bindParam(':matricula', $matricula);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':cpf', $cpf);
  $stmt->bindParam(':tipo_requerimento', $requerimento);
  $stmt->bindParam(':observacoes', $observation);
  $stmt->bindParam(':data_requerimento', $dataRequerimento);
  $stmt->bindParam(':hora_requerimento', $horaRequerimento);

  // Verifica se a inserção foi realizada com sucesso
  if ($stmt->execute()) {
    header("location: ../html/user/requeriments.php");
    // Aqui você pode redirecionar o usuário para uma página de confirmação ou realizar outras ações necessárias após a inserção do requerimento.
  } else {
    echo "Erro ao inserir o requerimento.";
  }
} catch (PDOException $e) {
  echo "Erro na execução da consulta: " . $e->getMessage();
}

?>