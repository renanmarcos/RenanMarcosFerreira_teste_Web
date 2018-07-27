function enableEffects() {
    $('#datepicker').datepicker({
        footer: true,
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd/mm/yyyy'
    });
}

function abrirDetalhes(id, tipo) {

    $.ajax({
        type: 'POST',
        url: '../functions/pegarDetalhes.php',
        data: {id, tipo},
        success: function (data) {
    
            let detalhes = JSON.parse(data);

            let dtNasc = new Date(detalhes.datanascimento);
            let diaNasc = dtNasc.getDate() + 1;
            let mesNasc = dtNasc.getMonth() + 1;

            if (diaNasc < 10)
                diaNasc = '0' + diaNasc;
            
            if (mesNasc < 10) 
                mesNasc = '0' + mesNasc;

            $('#detalhesTitulo').text("Detalhes de " + detalhes.nome);
            $('#dtNasc').text("Data de nascimento: " + diaNasc + '/' + mesNasc + '/' + dtNasc.getFullYear());
            $('#cpf').text("CPF: " + detalhes.cpf)
            $('#sexo').text("Gênero: " + (detalhes.sexo == 'M' ? "Masculino" : "Feminino") );
            $('#details-id').val(detalhes.id);
            $('#status').val(detalhes.status == 1 ? "Ativo" : "Inativo");
            $('#modalDetalhes').modal('show');
        }
    });
}

function abrirFormInsertCorrida() {

    $('#motorista').empty();
    $('#passageiro').empty(); 

    $.ajax({
        type: 'POST',
        url: '../functions/consultarMotoristasEPassageiros.php',
        success: function (data) {
            console.log(data);
            let objetos = JSON.parse(data);
            let qtdMotoristas = qtdPassageiros = 0;

            objetos.forEach((objeto, index) => {

                if (objeto.is_motorista) {

                    qtdMotoristas++;
                    $('#motorista').append($('<option>', {
                        value: objeto.id,
                        text: objeto.nome
                    }));

                } else {

                    qtdPassageiros++;
                    $('#passageiro').append($('<option>', {
                        value: objeto.id,
                        text: objeto.nome
                    }));

                }

            });
            
            if (qtdMotoristas == 0) {
                $('#motorista').append($('<option>', {
                    text: "Nenhum motorista disponível."
                }));
                $('#form-cadastroCorrida').find(':submit').hide();
                $('#motoristaHelpBlock').text('Não é possível cadastrar uma corrida sem motoristas.');
            }

            if (qtdPassageiros == 0) {
                $('#motorista').append($('<option>', {
                    text: "Não existe passageiros."
                }));
                $('#form-cadastroCorrida').find(':submit').hide();
                $('#motoristaHelpBlock').text('Não é possível cadastrar uma corrida sem passageiros.');
            }

            $('#modalInserirCorrida').modal('show');
        }
    });

}