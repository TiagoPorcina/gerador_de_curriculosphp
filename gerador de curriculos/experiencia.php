<?php
// PHP: Recebe dados da tela anterior e armazena na sessão
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validação e armazenamento dos Dados Pessoais na sessão
    $_SESSION['dados_pessoais'] = $_POST;
}

// Se não houver dados, idealmente redireciona de volta para index.php
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
    <title>CV Builder | Experiência</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item"><a class="nav-link" href="index.php">Dados Pessoais</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Experiência</a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="#">Visualizar</a></li>
                </ul>

                <h2 class="mb-3">Experiência Profissional</h2>
                <p class="text-muted mb-4">Adicione suas experiências profissionais mais relevantes.</p>

                <form action="visualizar.php" method="POST">
                    
                    <div id="experiencias_container">
                        <div class="card p-4 mb-4 experiencia-bloco" data-id="1">
                            <h5>Experiência #1</h5>
                            <div class="mb-3">
                                <label class="form-label">Nome da Empresa</label>
                                <input type="text" class="form-control" name="experiencia[1][empresa]" placeholder="Ex: Google Brasil" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cargo</label>
                                <input type="text" class="form-control" name="experiencia[1][cargo]" placeholder="Ex: Desenvolvedor Frontend" required>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Data de Início</label>
                                    <input type="date" class="form-control" name="experiencia[1][inicio]" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Data de Fim</label>
                                    <input type="date" class="form-control data-fim" name="experiencia[1][fim]">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input trabalho-atual" type="checkbox" data-target=".data-fim" name="experiencia[1][atual]" value="1" id="atual-1">
                                        <label class="form-check-label" for="atual-1">Trabalho atual</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Descrição das Atividades</label>
                                <textarea class="form-control" name="experiencia[1][descricao]" rows="3" placeholder="Descreva suas principais responsabilidades e conquistas nesta posição"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="btn-add-experiencia" class="btn btn-success mb-4">
                        + Adicionar Nova Experiência
                    </button>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="index.php" class="btn btn-secondary">Voltar</a>
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