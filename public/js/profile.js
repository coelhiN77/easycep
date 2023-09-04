$(document).ready(function () {
    $('#profile-image-upload').on('change', function () {

        // Verifica se a imagem foi selecionada
        if (this.files && this.files[0]) {
            // Aparece a mensagem que a foto foi escolhida depois de abrir ela
            $('.upload-message').text('Foto Escolhida').fadeIn();

            // Depois de 4 segundos a mensagem some
            setTimeout(function () {
                $('.upload-message').fadeOut();
            }, 4000);
        }
    });
});
