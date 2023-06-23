<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/alunos.css">
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
                <input type="text" class="input" name="txt" id="procurar" placeholder="Procure por nome ou email"/>
                <button onclick="procurar()" type="submit" id="form-button""><i class="bi bi-search"></i></button>
            </div>
            <div class="filters">
                <a href="registroAluno.php">
                    <button>+</button>
                </a>
                <span>Ordenar por:</span>
                <div class="buttons">
                    <button>Nome</button>
                    <button>Curso</button>
                </div>
            </div>
        </div>
        <div class="main">
            <table>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>Matricula</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Semestre</th>
                </tr>
                <tr>
                    <td>texto</td>
                    <td>texto</td>
                    <td>texto</td>
                    <td>texto</td>
                    <td>texto</td>
                </tr>
            </table>
        </div>
    </section>

    <script>
        var inputSearch = document.getElementById('procurar');
        
        inputSearch.addEventListener("keydown", event => {
            if(event.key === "Enter") {
                procurar();
            }
        })

        function procurar() {
            window.location = `alunos.php?search=${inputSearch.value}`;
        }
    </script>
</body>
</html>