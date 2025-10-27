<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['formacao'])) {
        $_SESSION['formacoes'] = $_POST['formacao'];
    }
}

$dados = $_SESSION['dados_pessoais'] ?? [];
$experiencias = $_SESSION['experiencias'] ?? [];
$formacoes = $_SESSION['formacoes'] ?? [];

function formatarData($data) {
    if (empty($data)) return 'Atual';
    return date('Y', strtotime($data)); 
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Builder | Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        .curriculo-page {
            max-width: 800px; margin: 0 auto; padding: 30px; border: 1px solid #ccc;
        }
        @media print {
            .acoes, .nav-tabs { display: none !important; } 
            .curriculo-page { border: none; }
        }
    </style>
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
    <li class="nav-item"><a class="nav-link" href="formacao.php">Formação</a></li>
    <li class="nav-item"><a class="nav-link active" href="#">Visualizar</a></li>
</ul>
                
               <h2 class="mb-3">Visualizar Currículo</h2>
<p class="text-muted mb-4">Confira como seu currículo ficará e faça o download.</p>

<div class="curriculo-page bg-gray shadow-lg mb-4">
   
                    
                    <h1 class="text-primary border-bottom pb-2"><?php echo $dados['nome'] ?? 'Nome do Candidato'; ?></h1>
                    <p class="mb-1">📧 <?php echo $dados['email'] ?? 'email@exemplo.com'; ?></p>
                    <p class="mb-1">📞 <?php echo $dados['telefone'] ?? '(99) 99999-9999'; ?></p>
                    <p class="mb-4">🔗 <?php echo $dados['linkedin'] ?? 'linkedin.com/in/...'; ?></p>

                    <h3 class="mt-4 border-bottom pb-1">Experiência Profissional</h3>
                    <?php if (!empty($experiencias)): ?>
                        <?php foreach ($experiencias as $exp): ?>
                            <div class="mb-3">
                                <h5><?php echo $exp['cargo'] ?? 'Cargo'; ?> - <?php echo $exp['empresa'] ?? 'Empresa'; ?></h5>
                                <p class="text-muted mb-1">
                                    <?php echo formatarData($exp['inicio']); ?> - 
                                    <?php echo (isset($exp['atual']) && $exp['atual'] == 1) ? 'Atual' : formatarData($exp['fim']); ?>
                                </p>
                                <p class="small"><?php echo $exp['descricao'] ?? 'Descrição das atividades...'; ?></p>
                            </div> </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                         <p>Nenhuma experiência adicionada.</p>
                    <?php endif; ?>

                    <h3 class="mt-4 border-bottom pb-1">Formação Acadêmica</h3>
                    <?php if (!empty($formacoes)): ?>
                        <?php foreach ($formacoes as $formacao): ?>
                            <div class="mb-3">
                                <h5><?php echo $formacao['curso'] ?? 'Curso'; ?></h5>
                                <p class="mb-1"><?php echo $formacao['instituicao'] ?? 'Instituição'; ?></p>
                                <p class="text-muted small">
                                    <?php echo formatarData($formacao['inicio']); ?> - 
                                    <?php echo (isset($formacao['cursando']) && $formacao['cursando'] == 1) ? 'Cursando' : formatarData($formacao['fim']); ?>
                                </p>
                                <?php if (!empty($formacao['descricao'])): ?>
                                    <p class="small fst-italic"><?php echo $formacao['descricao']; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Nenhuma formação acadêmica adicionada.</p>
                    <?php endif; ?>

                </div>

                <div class="acoes d-flex justify-content-between mb-5">
                    <a href="formacao.php" class="btn btn-secondary">Voltar</a>
                    <button onclick="baixarCurriculo()" class="btn btn-success">Baixar PDF / Imprimir</button>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>