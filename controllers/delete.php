<?php
include_once("conexao.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  try {
    // Prepara a consulta SQL para excluir o requerimento com base no ID
    $sql = "DELETE FROM requerimentos WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // Executa a consulta, passando o valor do parâmetro ID
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Verifica se a exclusão foi realizada com sucesso
    if ($stmt->rowCount() > 0) {
      header("location: ../html/adm/requerimentos.php");
      // Redirecione o usuário para a página de requerimentos ou faça qualquer outra ação necessária após a exclusão.
    } else {
      echo "Falha ao excluir o requerimento.";
    }
  } catch (PDOException $e) {
    echo "Erro na execução da consulta: " . $e->getMessage();
  }
} else {
  echo "ID do requerimento não fornecido.";
}

?>