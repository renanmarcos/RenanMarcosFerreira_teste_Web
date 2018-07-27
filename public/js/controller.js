$(function () {
    listenLoginForm();
    listenInsertMotoristaForm();
    listenInsertPassageiroForm();
    listenUpdateMotoristaForm();
    listenCadastroCorridaForm();
    listenPesquisar();
    listenLogout();
    enableEffects();
});

function listenCadastroCorridaForm() {
    $('#form-cadastroCorrida').on('submit', (e) => {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../functions/inserirCorrida.php',
            data: $('#form-cadastroCorrida').serialize(),
            success: function (data) {
                if (data == 1) {
                    location.reload();
                } else {
                    alert(data);
                    alert("Erro na inserção da corrida.");
                }
            }
        });

    });
}

function listenUpdateMotoristaForm() {
    $('#form-status').on('submit', (e) => {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../functions/atualizar.php',
            data: $('#form-status').serialize(),
            success: function (data) {
                if (data == 1) {
                    location.reload();
                } else {
                    alert("Erro na atualização.");
                }
            }
        });

    });
}

function listenLogout() {
    $('.logout').click((e) => {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../functions/logout.php',
            success: function (data) {
                if (data == 1)
                    location.reload();
            }
        });
    });
}

function listenPesquisar() {
    $('#form-pesquisarMotorista').on('submit', (e) => {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../functions/pesquisar.php',
            data: $('#form-pesquisarMotorista').serialize() + "&options=motoristas",
            success: function (data) {
                if (data == 1)
                    location.reload();
            }
        });

    });

    $('#form-pesquisarPassageiro').on('submit', (e) => {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../functions/pesquisar.php',
            data: $('#form-pesquisarPassageiro').serialize() + "&options=passageiros",
            success: function (data) {
                if (data == 1)
                    location.reload();
            }
        });

    });

    $('#form-pesquisarCorrida').on('submit', (e) => {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../functions/pesquisar.php',
            data: $('#form-pesquisarCorrida').serialize() + "&options=corridas",
            success: function (data) {
                if (data == 1)
                    location.reload();
            }
        });

    });
}

function listenLoginForm() {
    $('#form-login').on('submit', (e) => {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../functions/login.php',
            data: $('#form-login').serialize(),
            success: function (data) {
                if (data == 1) {
                    location.reload();
                } else {
                    alert("Usuário ou senha incorretos.");
                }
            }
        });

    });
}

function listenInsertMotoristaForm() {
    $('#form-cadastroMotorista').on('submit', (e) => {

        e.preventDefault();

        let formulario = $('#form-cadastroMotorista').serializeArray();
        let validarCPF = /\d{3}.\d{3}.\d{3}-\d{2}/i;
        let validarDataNasc = /\d{2}\/\d{2}\/\d{4}/i;

        if (!validarCPF.test(formulario[2].value) || !validarDataNasc.test(formulario[3].value)) {
            alert('CPF ou Data de nascimento estão no formato inválido.');
        } else {
            $.ajax({
                type: 'POST',
                url: '../functions/inserir.php',
                data: $('#form-cadastroMotorista').serialize(),
                success: function (data) {
                    if (data == 1) {
                        $('#modalInserirMotorista').modal('toggle');                    
                        setTimeout(function(){
                            location.reload();
                          }, 220);
                    } else {
                        alert('Erro no cadastro.');
                    }
                }
            });
        }

    });
}

function listenInsertPassageiroForm() {
    $('#form-cadastroPassageiro').on('submit', (e) => {

        e.preventDefault();

        let formulario = $('#form-cadastroPassageiro').serializeArray();
        let validarCPF = /\d{3}.\d{3}.\d{3}-\d{2}/i;
        let validarDataNasc = /\d{2}\/\d{2}\/\d{4}/i;

        if (!validarCPF.test(formulario[2].value) || !validarDataNasc.test(formulario[1].value)) {
            alert('CPF ou Data de nascimento estão no formato inválido.');
        } else {
            $.ajax({
                type: 'POST',
                url: '../functions/inserirPassageiro.php',
                data: $('#form-cadastroPassageiro').serialize(),
                success: function (data) {
                    if (data == 1) {
                        $('#modalInserirPassageiro').modal('toggle');                    
                        setTimeout(function(){
                            location.reload();
                          }, 220);
                    } else {
                        alert('Erro no cadastro.');
                    }
                }
            });
        }

    });
}