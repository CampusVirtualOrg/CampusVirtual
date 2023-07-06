<?php
include_once("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["status"]) && isset($_POST["requerimento_id"])) {
        $status = $_POST["status"];
        $requerimentoId = $_POST["requerimento_id"];
        try {
            $sql = "UPDATE requerimentos SET status = :status WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":id", $requerimentoId);
            $stmt->execute();
            echo "Status atualizado com sucesso";
        } catch (PDOException $e) {
            echo "Erro ao atualizar o status: " . $e->getMessage();
        }
    } else {
        echo "Parâmetros inválidos";
    }
} else {
    echo "Método de requisição inválido";
}
?>
