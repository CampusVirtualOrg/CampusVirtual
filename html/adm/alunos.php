<?php
require("../../controllers/conexao.php");

$ordem = ""; // Variável para armazenar a cláusula ORDER BY
$search = ""; # Para armazenar o texto da consulta por input;

if (isset($_GET['ordem'])) {
    if ($_GET['ordem'] == 'semestre') {
        $ordem = "ORDER BY semestre"; // Ordenar por semestre em ordem decrescente
    } elseif ($_GET['ordem'] == 'nome') {
        $ordem = "ORDER BY nome"; // Ordenar por tipo de requerimento em ordem crescente
    }
}

// Lógica da busca por input

if (isset($_GET['search'])) {
    $filter = $_GET['search'];
    $search = "WHERE id LIKE '%$filter%' OR nome LIKE '%$filter%' OR email LIKE '%$filter%';";
}

$sql = "SELECT * FROM alunos $ordem$search;";

$stmt = $conn->prepare($sql);
$stmt->execute();

$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/alunos.css">
    <!-- link favicon -->
    <link rel="shortcut icon" href="../../img/logoPortal.png" type="image/x-icon" />
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <title>Alunos</title>
</head>

<body>
    <aside>
        <a href="./admin.php" class="header-aside">
            <h2 id="h2-aside">Painel administrativo</h2>
            <h3 id="h3-aside">Campus Virtual</h3>
        </a>
        <div class="anchors">
            <a id="a-aside" href="alunos.php"><i class="bi bi-people-fill"></i>Alunos</a>

            <a id="a-aside" href="./requerimentos.php"><i class="bi bi-file-earmark-text-fill"></i>Requerimentos</a>

            <a id="a-aside" href="/dashboard-admin/turmas" id="card-center"><i class="bi bi-easel2-fill"></i>Turmas
            </a>

            <a id="a-aside" href="/dashboard-admin/disciplinas"><i class="bi bi-book-half"></i>Disciplinas</a>

            <a id="a-aside" href="/dashboard-admin/cursos"><i class="bi bi-c-square-fill"></i>Cursos</a>
        </div>

        <a href="./admin.php" id="logoAside">
            <img src="./images/logoPortal.png" alt="Campus Virtual" id="logoAsideImg">
        </a>
    </aside>
    <section>
        <div class="header-section">
            <h1>Alunos</h1>
            <div class="form-procurar">
                <input type="text" class="input" name="txt" id="procurar" placeholder="Procure por nome ou email" />
                <button class="buttonsPagAluno" onclick="procurar()" type="submit" id="form-button"><i class=" bi bi-search"></i></button>
                <a href="registroAluno.php">
                    <button class="buttonsPagAluno">+</button>
                </a>
            </div>
            <div class="filters">
                <span>Ordenar por:</span>
                <div class="buttons">
                    <button class="buttonsPagAluno" onclick="location.href='alunos.php?ordem=nome'">Nome</button>
                    <button class="buttonsPagAluno" onclick="location.href='alunos.php?ordem=semestre'">Semestre</button>
                </div>
            </div>
        </div>
        <!-- <div class="testeDialog">
            <dialog id="dialogMain">
                <form action="">
                    <input type="email" placeholder="Novo Email">
                    <input type="password" placeholder="Novo Email">
                    <button>Atualizar</button>
                    <button type="reset" id="fecharBtn">Cancelar</button>
                </form>
            </dialog>

            <button id="meuBtn">abrirDialogo</button>
        </div>

        <script>
            var meuModal = document.getElementById('dialogMain');
            var btnModal = document.getElementById('meuBtn');
            var btnCancel = document.getElementById('fecharBtn');

            btnModal.addEventListener('click', () => {
                meuModal.showModal();
            })

            btnCancel.addEventListener('click', () => {
                meuModal.close()
            })
        </script> -->
        <div class="main">
            <table>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>Matricula</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Semestre</th>
                    <th>Telefone</th>
                    <th>Excluir</th>
                </tr>
                <?php if ($alunos) : ?>
                    <?php foreach ($alunos as $aluno) : ?>
                        <tr>
                            <td><?= $aluno["nome"] ?></td>
                            <td><?= $aluno["matricula"] ?></td>
                            <td><?= $aluno["email"] ?></td>
                            <td><?= $aluno["curso_id"] ?></td>
                            <td><?= $aluno["semestre"] ?></td>
                            <td><?= $aluno["telefone"] ?></td>
                            <td><a href="../../controllers/deleteAluno.php?id=<?= $aluno['id'] ?>">Excluir</a></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8">Nenhum requerimento encontrado</td>
                    </tr>
                <?php endif ?>
            </table>
        </div>
    </section>

    <script>
        var inputSearch = document.getElementById('procurar');

        inputSearch.addEventListener("keydown", event => {
            if (event.key === "Enter") {
                procurar();
            }
        })

        function procurar() {
            window.location = `alunos.php?search=${inputSearch.value}`;
        }
    </script>
</body>

</html>