$(document).ready(function() {
    
    // --- Lógica 1: Cálculo e Validação da Idade (index.php) ---
    
    const IDADE_MINIMA = 15;

    // Função principal de validação e cálculo de idade
    function validarEcalcularIdade(dataNascStr) {
        const inputData = $('#data_nascimento');
        const inputIdade = $('#idade');
        
        if (!dataNascStr) {
            inputIdade.val('');
            inputData.removeClass('is-invalid');
            return false;
        }

        const dataNasc = new Date(dataNascStr);
        const hoje = new Date();
        
        let idade = hoje.getFullYear() - dataNasc.getFullYear();
        const mes = hoje.getMonth() - dataNasc.getMonth();
        
        // Ajuste se o aniversário ainda não ocorreu este ano
        if (mes < 0 || (mes === 0 && hoje.getDate() < dataNasc.getDate())) {
            idade--;
        }
        
        inputIdade.val(idade);
        
        // VALIDAÇÃO: Idade Mínima
        if (idade < IDADE_MINIMA) {
            inputData.addClass('is-invalid'); // Adiciona classe de erro do Bootstrap
            return false;
        } else {
            inputData.removeClass('is-invalid'); // Remove classe de erro
            return true;
        }
    }

    // Acionamento da validação no evento 'change' do campo
    $('#data_nascimento').on('change', function() {
        validarEcalcularIdade($(this).val());
    });
    
    // Bloquear o envio do formulário se a idade for inválida
    $('#form-pessoal').on('submit', function(e) {
        const dataNascStr = $('#data_nascimento').val();
        
        // Se a validação retornar false (idade < 15), previne o envio
        if (!validarEcalcularIdade(dataNascStr)) {
            e.preventDefault();
        }
    });


    // --- Lógica 2: Inclusão Dinâmica de Experiência (experiencia.php) ---
    
    let expCount = 1;

    // Garante que o campo de data de fim é desabilitado/limpo se for 'Trabalho atual'
    $(document).on('change', '.trabalho-atual', function() {
        const bloco = $(this).closest('.experiencia-bloco');
        const dataFimInput = bloco.find('.data-fim');
        if ($(this).is(':checked')) {
            dataFimInput.val('');
            dataFimInput.prop('disabled', true);
        } else {
            dataFimInput.prop('disabled', false);
        }
    });

    // Função para adicionar novo bloco de experiência
    $('#btn-add-experiencia').on('click', function() {
        expCount++;
        const novoBloco = `
            <div class="card p-4 mb-4 experiencia-bloco" data-id="${expCount}">
                <div class="d-flex justify-content-between">
                    <h5>Experiência #${expCount}</h5>
                    <button type="button" class="btn btn-danger btn-sm btn-remove-exp">Remover</button>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nome da Empresa</label>
                    <input type="text" class="form-control" name="experiencia[${expCount}][empresa]" placeholder="Ex: Empresa" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <input type="text" class="form-control" name="experiencia[${expCount}][cargo]" placeholder="Ex: Cargo" required>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Data de Início</label>
                        <input type="date" class="form-control" name="experiencia[${expCount}][inicio]" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Data de Fim</label>
                        <input type="date" class="form-control data-fim" name="experiencia[${expCount}][fim]">
                        <div class="form-check mt-1">
                            <input class="form-check-input trabalho-atual" type="checkbox" name="experiencia[${expCount}][atual]" value="1" id="atual-${expCount}">
                            <label class="form-check-label" for="atual-${expCount}">Trabalho atual</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição das Atividades</label>
                    <textarea class="form-control" name="experiencia[${expCount}][descricao]" rows="3" placeholder="Descreva suas principais responsabilidades"></textarea>
                </div>
            </div>
        `;
        $('#experiencias_container').append(novoBloco);
    });

    // Função para remover blocos dinamicamente
    $(document).on('click', '.btn-remove-exp', function() {
        $(this).closest('.experiencia-bloco').remove();
    });

});

// --- Lógica 3: Download/Impressão (visualizar.php) ---
function baixarCurriculo() {
    window.print();
}