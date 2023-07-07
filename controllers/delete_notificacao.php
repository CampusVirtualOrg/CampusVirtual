<?php

include_once('./conexao.php');

if (isset($_GET['id']) && isset($_GET['notId'])) {

    $id = $_GET['id'];
    $notId = $_GET['notId'];

    try {

        $sql = 'DELETE FROM notificacoes WHERE aluno_id = :id AND id = :notId;';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':notId', $notId);

        if ($stmt->execute()) {
            echo "Limpo com sucesso";
            header('location: ../html/user/user.php');
            exit();
        } else {
            echo "falha ao limpar";
            header('location: ../html/user/user.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro na execução da consulta: " . $e->getMessage();
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {

        $sql = 'DELETE FROM notificacoes WHERE aluno_id = :id;';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "Limpo com sucesso";
            header('location: ../html/user/user.php');
            exit();
        } else {
            echo "falha ao limpar";
            header('location: ../html/user/user.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro na execução da consulta: " . $e->getMessage();
    }
} else {
    echo "ID do aluno não fornecido";
}
