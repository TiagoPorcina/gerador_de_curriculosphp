<?php
// PHP: Recebe dados da tela anterior (experiência) e armazena na sessão
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['experiencia'])) {
    // Armazena Experiências na sessão
    $_SESSION['experiencias'] = $_POST['experiencia'];
}

// Se não houver dados pessoais na sessão, pode-se redirecionar para o início
if (empty($_SESSION['dados_pessoais']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
     // header('Location: index.php');
     // exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Builder | Formação Acadêmica</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/favicon.ico" alt="Logo do CV Builder" class="d-inline-block align-text-top">
                <span class="fw-bold text-primary">GERADOR DE CURRÍCULOS</span>
                <div class="unipar ms-auto">
                <img src="img/unipar.ico" alt="Símbolo UNIPAR"> 
            </div>
            </a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
             <ul class="nav nav-tabs mb-4">
    <li class="nav-item"><a class="nav-link" href="index.php">Dados Pessoais</a></li>
    <li class="nav-item"><a class="nav-link" href="experiencia.php">Experiência</a></li>
    <li class="nav-item"><a class="nav-link active" href="#">Formação</a></li>
    <li class="nav-item"><a class="nav-link" href="visualizar.php">Visualizar</a></li> 
</ul>

                <h2 class="mb-3">Formação Acadêmica</h2>
                <p class="text-muted mb-4">Adicione seus cursos de nível superior, técnico ou especialização.</p>

                <form action="visualizar.php" method="POST" id="form-formacao">
                    
                    <div id="formacoes_container">
                        <div class="card p-4 mb-4 formacao-bloco" data-id="1">
                            <h5>Formação #1</h5>
                            <div class="mb-3">
                                <label class="form-label">Nome do Curso/Grau</label>
                                <input type="text" class="form-control" name="formacao[1][curso]" placeholder="Ex: Ciência da Computação" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Instituição de Ensino</label>
                                <input type="text" class="form-control" name="formacao[1][instituicao]" placeholder="Ex: Universidade de São Paulo" required>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Data de Início</label>
                                    <input type="date" class="form-control" name="formacao[1][inicio]" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Data de Conclusão</label>
                                    <input type="date" class="form-control data-fim-formacao" name="formacao[1][fim]">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input cursando" type="checkbox" name="formacao[1][cursando]" value="1" id="cursando-1">
                                        <label class="form-check-label" for="cursando-1">Cursando Atualmente</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Informações Adicionais (Opcional)</label>
                                <textarea class="form-control" name="formacao[1][descricao]"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="btn-add-formacao" class="btn btn-success mb-4">
                        + Adicionar Nova Formação
                    </button>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="experiencia.php" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Próximo: Visualizar Currículo &rarr;</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>