$(document).ready(function () {
    $("#save-cep-button").click(function () {
        var cep = $("#cep").val();
        var rua = $("#rua").text();
        var bairro = $("#bairro").text();
        var cidade = $("#cidade").text();
        var estado = $("#estado").text();
        var ddd = $("#ddd").text();
        var ibge = $("#ibge").text();
        var cepSalvoElement = $("#cep-salvo");

        // Faça uma solicitação AJAX para verificar o CEP na API ViaCep
        $.ajax({
            type: "GET",
            url: `https://viacep.com.br/ws/${cep}/json/`,
            success: function (data) {
                if (data.erro) {
                    cepSalvoElement.text("CEP inválido. Digite um CEP válido com 8 dígitos.");
                    // Limpe os campos preenchidos anteriormente
                    $("#rua, #bairro, #cidade, #estado, #ddd, #ibge").text("");
                    // Depois de 4 segundos limpa a mensagem de erro
                    setTimeout(function () {
                        cepSalvoElement.text("");
                    }, 4000);
                } else {
                    // Verifique se todos os campos obrigatórios estão preenchidos
                    if (!rua || !bairro || !cidade || !estado || !ddd || !ibge) {
                        cepSalvoElement.text("Preencha todos os campos antes de salvar o CEP.");
                        // Depois de 4 segundos limpa a mensagem de erro
                        setTimeout(function () {
                            cepSalvoElement.text("");
                        }, 4000);
                        return; // Impede que a solicitação seja enviada
                    }

                    // Se o CEP é válido e todos os campos estão preenchidos, faça a solicitação para salvar
                    $.ajax({
                        type: "POST",
                        url: saveCepUrl,
                        data: {
                            cep: cep,
                            rua: rua,
                            bairro: bairro,
                            cidade: cidade,
                            estado: estado,
                            ddd: ddd,
                            ibge: ibge,
                            _token: $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function (data) {
                            cepSalvoElement.text("CEP salvo com sucesso!");
                            // Limpe os campos preenchidos anteriormente
                            $("#rua, #bairro, #cidade, #estado, #ddd, #ibge").text("");
                            // Depois de 4 segundos limpa a mensagem de sucesso
                            setTimeout(function () {
                                cepSalvoElement.text("");
                            }, 4000);
                        },
                        error: function (error) {
                            cepSalvoElement.text("Erro ao salvar CEP. Tente novamente mais tarde.");
                            // Depois de 4 segundos limpa a mensagem de erro
                            setTimeout(function () {
                                cepSalvoElement.text("");
                            }, 4000);
                            console.error("Erro ao salvar CEP:", error);
                        },
                    });
                }
            },
            error: function (error) {
                console.error("Erro ao verificar o CEP:", error);
            },
        });
    });
});
