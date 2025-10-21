<?php
// PHP: Processamento dos dados para a geração do currículo
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Armazena Experiências na sessão
    $_SESSION['experiencias'] = $_POST['experiencia'] ?? [];
    
    // Adicione a Formação Acadêmica aqui, se você criar um passo para ela.
}

// Junta todos os dados
$dados = $_SESSION['dados_pessoais'] ?? [];
$experiencias = $_SESSION['experiencias'] ?? [];

// Função de Ajuda para formatação (PHP)
function formatarData($data) {
    if (empty($data)) return 'Atual';
    // Formato Brasileiro (opcionalmente pode ser apenas o ano)
    return date('m/Y', strtotime($data)); 
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
            .acoes, .nav-tabs { display: none !important; } /* Esconde a interface de navegação e botões na impressão/download */
            .curriculo-page { border: none; }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="mb-3">Visualizar Currículo</h2>
                <p class="text-muted mb-4">Confira como seu currículo ficará e faça o download.</p>

                <div class="curriculo-page bg-white shadow-lg mb-4">
                    
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
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                         <p>Nenhuma experiência adicionada.</p>
                    <?php endif; ?>

                    <h3 class="mt-4 border-bottom pb-1">Formação Acadêmica</h3>
                    <p class="mb-1">Ciência da Computação</p>
                    <p class="text-muted small">Universidade de São Paulo | 2019-2023</p>

                </div>

                <div class="acoes d-flex justify-content-between mb-5">
                    <a href="experiencia.php" class="btn btn-secondary">Voltar</a>
                    <button onclick="baixarCurriculo()" class="btn btn-success">Baixar PDF / Imprimir</button>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>