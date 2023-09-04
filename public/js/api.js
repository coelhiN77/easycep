const cepInput = document.getElementById("cep");
const ruaElement = document.getElementById("rua");
const bairroElement = document.getElementById("bairro");
const cidadeElement = document.getElementById("cidade");
const estadoElement = document.getElementById("estado");
const cepErrorElement = document.getElementById("cep-error");
const dddElement = document.getElementById("ddd");
const ibgeElement = document.getElementById("ibge");

cepInput.addEventListener("input", () => {
    let cep = cepInput.value;

    // remover caracters que não são númericos do cep
    cep = cep.replace(/\D/g, '');

    // limite de 8 dígitos
    cep = cep.slice(0, 8);

    // formatar para ficar estilo cep
    if (cep.length === 8) {
        cep = cep.replace(/(\d{5})(\d{3})/, "$1-$2");
    }

    cepInput.value = cep;

    // verifica se tem 8 dígitos e bloqueia depois se tentar digitar
    if (cep.length >= 8) {
        // solicitação pela API ViaCep obtendo as informações abaixo
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    // mensagem de erro se o cep não for real
                    cepErrorElement.textContent = "CEP não encontrado.";
                    ruaElement.textContent = "";
                    bairroElement.textContent = "";
                    cidadeElement.textContent = "";
                    estadoElement.textContent = "";
                    dddElement.textContent = "";
                    ibgeElement.textContent = "";
                } else {
                    // Preenche os campos com o cep digitado
                    cepErrorElement.textContent = "";
                    ruaElement.textContent = data.logradouro;
                    bairroElement.textContent = data.bairro;
                    cidadeElement.textContent = data.localidade;
                    estadoElement.textContent = data.uf;
                    dddElement.textContent = data.ddd;
                    ibgeElement.textContent = data.ibge;
                }
            })
            .catch(error => {
                // manipulador de erro ou solicitação
                console.error("Erro ao buscar o CEP:", error);
            });
    } else {
        ruaElement.textContent = "";
        bairroElement.textContent = "";
        cidadeElement.textContent = "";
        estadoElement.textContent = "";
        dddElement.textContent = "";
        ibgeElement.textContent = "";
    }
});
