<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/requerimentos.css">
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <title>Requerimentos</title>
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
            <h1>Requerimentos</h1>
            <div class="form-procurar">
                <input type="text" class="input" name="txt" id="procurar" placeholder="Procure por nome ou email" />
                <button onclick="procurar()" type="submit" id="form-button"><i class="bi bi-search"></i></button>
            </div>

            <div class="filters">
                <span>Ordenar por:</span>
                <div class="buttons">
                    <button style="cursor:pointer;" onclick="location.href='requerimentos.php?ordem=data'">Data</button>
                    <button onclick="location.href='requerimentos.php?ordem=tipo'">Tipo</button>
                </div>
            </div>
        </div>
        <div class="main">
            <table>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>Matricula</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Observações</th>
                    <th>Status</th>
                    <th>Data de Solicitação</th>
                    <th>Excluir</th>
                </tr>
                <?php
                include_once("../../controllers/conexao.php");

                try {
                    $ordem = ""; // Variável para armazenar a cláusula ORDER BY
                    $search = ""; # Para armazenar o texto da consulta por input;

                    if (isset($_GET['ordem'])) {
                        if ($_GET['ordem'] == 'data') {
                            $ordem = "ORDER BY data_requerimento DESC"; // Ordenar por data em ordem decrescente
                        } elseif ($_GET['ordem'] == 'tipo') {
                            $ordem = "ORDER BY tipo_requerimento"; // Ordenar por tipo de requerimento em ordem crescente
                        }
                    }

                    // Lógica da busca por input

                    if (isset($_GET['search'])) {
                        $filter = $_GET['search'];
                        $search = "WHERE id LIKE '%$filter%' OR nome LIKE '%$filter%' OR email LIKE '%$filter%';";
                    }

                    // Prepara a consulta SQL para recuperar os requerimentos
                    $sql = "SELECT id, nome, matricula, email, tipo_requerimento, observacoes, status, data_requerimento FROM requerimentos $search$ordem";
                    $stmt = $conn->prepare($sql);

                    // Executa a consulta
                    $stmt->execute();

                    // Recupera os resultados da consulta
                    $requerimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Verifica se existem requerimentos retornados
                    if ($requerimentos) {
                        foreach ($requerimentos as $requerimento) {
                            echo "<tr>";
                            echo "<td>" . $requerimento['nome'] . "</td>";
                            echo "<td>" . $requerimento['matricula'] . "</td>";
                            echo "<td>" . $requerimento['email'] . "</td>";
                            echo "<td>" . $requerimento['tipo_requerimento'] . "</td>";
                            echo "<td>" . $requerimento['observacoes'] . "</td>";
                            if ($requerimento['status'] === "negado") {
                                echo "<td style='color: red; text-transform: capitalize;'>" . $requerimento['status'] . "</td>";
                            } elseif ($requerimento['status'] === "aceito") {
                                echo "<td style='color: green; text-transform: capitalize;'>" . $requerimento['status'] . "</td>";
                            } else {
                                echo "<td style='color: #8f8f00; text-transform: capitalize;'>" . $requerimento['status'] . "</td>";
                            }

                            echo "<td>" . date('d/m/Y', strtotime($requerimento['data_requerimento'])) . "</td>";
                            echo "<td><a href='../../controllers/delete.php?id=" . $requerimento['id'] . "' class='btn-delete'>Excluir</a></td>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan='8'>Nenhum requerimento encontrado.</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr>";
                    echo "<td colspan='8'>Erro na execução da consulta: " . $e->getMessage() . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        </table>
        </div>
    </section>


    <script>
        var inputSearch = document.getElementById('procurar');

        inputSearch.addEventListener('keydown', event => {
            if (event.key === "Enter") {
                procurar();
            }
        })

        function procurar() {
            window.location = `requerimentos.php?search=${inputSearch.value}`;
        }

        // AGORA É SÓ RECEBER NO PHP O PARAMETRO Search via get             
        // DEPOIS FAZER A CONSULTA SQL ASSIM: 
        // "SELECT * FROM alunos WHERE nome LIKE "%$search% OR curso LIKE "%$search%""
    </script>
</body>

</html>