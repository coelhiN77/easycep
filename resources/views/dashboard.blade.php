<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- obter token csrf -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>EasyCep - Dashboard</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-left">
            <img class="logo-easy" src="{{ asset('assets/logoeasycep.png') }}">
        </div>
        <!-- Aparece foto, nome e botão de sair -->
        <div class="navbar-right">
            <div class="user-info">
                @if(empty(auth()->user()->profile_image))
                     <img src="{{ asset('assets/defaultPhoto.png') }}">
                @else
                    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}">
                @endif
                <span>{{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}">Sair</a>
            </div>
        </div>
    </nav>

    <div class="container">
      <div class="left-side">
        <!-- Add foto de perfil -->
        <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1>Painel do Usuário</h1>
                <hr />
                <div class="profile-photo">
                    @if(empty(auth()->user()->profile_image))
                        <img src="{{ asset('assets/defaultPhoto.png') }}">
                    @else
                        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}">
                    @endif
                    <div class="profile-button">
                        <div class="upload-message" style="display: none; color: blue;"></div>
                        <label for="profile-image-upload" class="file-upload-btn">
                            <i class="fa fa-camera"></i> Escolher Foto
                        </label>
                        <input type="file" name="profile_image" id="profile-image-upload" accept="image/*" style="display: none;">
                        <button type="submit" class="file-upload-btn">
                            <i class="fa fa-save"></i> Salvar Foto
                        </button>
                    </div>
                </div>

            <div class="profile-desc">
                <div>
                    <label>Nome:</label>
                    <span id="name" name="name">{{ auth()->user()->name }}</span>
                </div>
                <div>
                    <label>Email:</label>
                    <span id="email" name="email">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </form>
      </div>

      <!-- CEP (API e Salvamento) -->
      <div class="right-side">
            <form id="cep-form">
                @csrf
                <div id="cep-error" style="color: red; font-size: 20px;"></div>
                <label for="cep" style="font-size: 20px">CEP</label>
                <input type="text" id="cep" name="cep" placeholder="Digite o CEP">

                <!-- informações da pesquisa do cep -->
                <div id="endereco">
                    <div class="row">
                        <div class="label">Rua:</div>
                        <div class="value"><span id="rua"></span></div>

                        <div class="label">Bairro:</div>
                        <div class="value"><span id="bairro"></span></div>
                    </div>

                    <div class="row">
                        <div class="label">Cidade:</div>
                        <div class="value"><span id="cidade"></span></div>

                        <div class="label">Estado:</div>
                        <div class="value"><span id="estado"></span></div>
                    </div>

                    <div class="row">
                        <div class="label">DDD:</div>
                        <div class="value"><span id="ddd"></span></div>

                        <div class="label">IBGE:</div>
                        <div class="value"><span id="ibge"></span></div>
                    </div>
                </div>

                <!-- salvar cep -->
                <button type="button" id="save-cep-button" class="button-cep">Salvar CEP</button>
                <div id="cep-salvo" style="color: blue; font-size: 20px;"></div>
            </form>
      </div>

    </div>
    <!-- FOOTER -->
    <footer class="footer">
        <p>coelhiN <span>❤</span></p>
    </footer>

    <!-- API, SAVE CEP e SAVE FOTO DE PERFIL-->
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/profile.js') }}"></script>

    <script>
        var saveCepUrl = "{{ route('save.cep') }}";
    </script>
    <script src="{{ asset('js/cep.js') }}"></script>
</body>
</html>
