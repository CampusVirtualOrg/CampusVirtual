<?php

include_once('./conexao.php');

if (isset($_POST['remetente'])) {
    $remetente = $_POST['remetente'];
    $titulo = $_POST['titulo'];
    $aviso = $_POST['aviso'];

    try {
        $sql = "INSERT INTO avisos (remetente, titulo, aviso) VALUES (:remetente, :titulo, :aviso);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':remetente', $remetente);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':aviso', $aviso);

        if($stmt->execute()) {
            header("location: ../html/professor/avisos.php");
            exit();

        } else {
            // header('location: ../html/professor/avisos.php');
            echo "Erro ao enviar mensagem";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro na execução da consulta: " . $e->getMessage();
    }
}
