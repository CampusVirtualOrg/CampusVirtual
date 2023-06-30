<?php
include_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os parâmetros foram enviados
    if (isset($_POST["status"]) && isset($_POST["requerimento_id"])) {
        $status = $_POST["status"];
        $requerimentoId = $_POST["requerimento_id"];

        // Atualiza o status no banco de dados
        try {
            $sql = "UPDATE requerimentos SET status = :status WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":id", $requerimentoId);
            $stmt->execute();

            // Retorna uma resposta indicando sucesso
            echo "Status atualizado com sucesso";
        } catch (PDOException $e) {
            // Retorna uma resposta indicando falha
            echo "Erro ao atualizar o status: " . $e->getMessage();
        }
    } else {
        // Retorna uma resposta indicando falha de parâmetros
        echo "Parâmetros inválidos";
    }
} else {
    // Retorna uma resposta indicando um método de requisição inválido
    echo "Método de requisição inválido";
}
?>
