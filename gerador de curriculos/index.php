<?php
// Inicia a sessão para futura transferência de dados
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Builder | Dados Pessoais</title>
    
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
                    <li class="nav-item"><a class="nav-link active" href="#">Dados Pessoais</a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="#">Experiência</a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="#">Visualizar</a></li>
                </ul>

                <h2 class="mb-3">Dados Pessoais</h2>
                <p class="text-muted mb-4">Preencha suas informações básicas para começar seu currículo.</p>

                <form action="experiencia.php" method="POST" id="form-pessoal">
                    
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                            <div id="data-nascimento-feedback" class="invalid-feedback">
                                A idade mínima para gerar o currículo é de 15 anos.
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="idade" class="form-label">Idade</label>
                            <input type="text" class="form-control" id="idade" name="idade" readonly>
                            <div class="form-text">Calculado automaticamente com base na data de nascimento.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(99) 99999-9999">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/seu_perfil">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="portfolio" class="form-label">Portfolio/Website</label>
                            <input type="url" class="form-control" id="portfolio" name="portfolio" placeholder="https://seuportfolio.com">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, número, bairro, cidade, estado, CEP">
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary disabled">Voltar</button>
                        <button type="submit" class="btn btn-primary">Próximo: Experiência &rarr;</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>