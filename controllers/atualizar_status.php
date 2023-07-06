<?php
include_once("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["status"]) && isset($_POST["requerimento_id"])) {
        $status = $_POST["status"];
        $requerimentoId = $_POST["requerimento_id"];
        $mensagem = $_POST['mensagem'];
        try {
            $sql = "UPDATE requerimentos SET status = :status WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":id", $requerimentoId);
            $stmt->execute();
            echo "Status atualizado com sucesso<br>";

            // Capturando a matricula do aluno pelo id do requerimento
            
            $sql = "SELECT matricula FROM requerimentos WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $requerimentoId);
            $stmt->execute();
            
            $matriculaArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $matricula = $matriculaArray['matricula'];
            echo "Matricula do aluno $matricula<br>";

            // Capturando o id do aluno pela matricula dele
            
            $sql = "SELECT id FROM alunos WHERE matricula = :matricula";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":matricula", $matricula);
            $stmt->execute();
            
            $idArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $idAluno = intval($idArray['id']);
            echo "ID do ALUNO: $idAluno<br>";

            // Inserindo a notificação no banco de dados

            $sql = "INSERT INTO notificacoes (aluno_id, mensagem, data, status_requerimento) VALUES (:id_aluno, :mensagem, NOW() ,:status_req);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id_aluno", $idAluno);
            $stmt->bindParam(":mensagem", $mensagem);
            $stmt->bindParam(":status_req", $status);
            $stmt->execute();

            echo $sql;
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
