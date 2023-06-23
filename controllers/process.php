<?php
include_once("conexao.php");

$name =  htmlspecialchars(filter_input(INPUT_POST, 'name'));
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$matricula = htmlspecialchars(filter_input(INPUT_POST, 'matricula'));
$password = htmlspecialchars(filter_input(INPUT_POST, 'passwd'));
$course = htmlspecialchars(filter_input(INPUT_POST, 'course'));
$semestre = htmlspecialchars(filter_input(INPUT_POST, 'semestre'));
$cpf =  htmlspecialchars(filter_input(INPUT_POST, 'cpf'));
$tel =   htmlspecialchars(filter_input(INPUT_POST, 'telefone'));
$adress =  htmlspecialchars(filter_input(INPUT_POST, 'endereco'));
$gener = filter_input(INPUT_POST, 'sexo');
$date =  filter_input(INPUT_POST, 'data_nascimento');
$image = $_FILES['imagem']['name']; // Recuperando o nome do arquivo da imagem

$caminho_temporario = $_FILES['imagem']['tmp_name']; // Obtém o caminho temporário do arquivo
$caminho_destino = '../uploads/' . $image;
// Move o arquivo da pasta temporária para o destino final
if (move_uploaded_file($caminho_temporario, $caminho_destino)) {
    // Preparar a consulta
    $alunos = "INSERT INTO alunos (nome, email, senha, matricula, curso, semestre, cpf, telefone, endereco, sexo, data_nascimento, imagem) VALUES (:name, :email, :password, :matricula, :course, :semestre, :cpf, :tel, :adress, :gener, :date, :image)";
    $stmt = $conn->prepare($alunos);

    // Vincular os valores dos parâmetros
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':matricula', $matricula);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':semestre', $semestre);   
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':adress', $adress);
    $stmt->bindParam(':gener', $gener);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':image', $image);

    // Executar a consulta
    $result = $stmt->execute();
    header("location: ../html/adm/registroAluno.php");
} else {
    echo "Erro ao salvar a imagem.";
}

?>
