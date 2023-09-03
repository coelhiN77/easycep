<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="navbar-right">
            <div class="user-info">
                <img src="" alt="test">
                <span>{{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}">Sair</a>
            </div>
        </div>
    </nav>

    <div class="container">
      <div class="left-side">
        <form action="" method="POST">
                @csrf
                <h1>Painel do Usuário</h1>
                <hr />
                <div class="profile-photo">
                        <img src="" alt="test">
                    <div class="profile-button">
                        <div class="upload-message" style="display: none; color: blue;"></div>
                        <label for="profile-image-upload" class="file-upload-btn">
                            <i class="fa fa-camera"></i> Escolher Foto
                        </label>
                        <input>
                        <button>
                            <i class="fa fa-save"></i> Salvar Foto
                        </button>
                    </div>
                </div>

            <div class="profile-desc">
                <div>
                    <label>Nome:</label>
                    <span>{{ auth()->user()->name }}</span>
                </div>
                <div>
                    <label>Email:</label>
                    <span>{{ auth()->user()->email }}</span>
                </div>
            </div>
        </form>
      </div>

      <div class="right-side">
            <form>
                @csrf
                <div></div>
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" placeholder="Digite o CEP">
            </form>

            <!-- RESULTS SEARCH CEP -->
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
      </div>

    </div>
    <!-- FOOTER -->
    <footer class="footer">
        <p>coelhiN <span>❤</span></p>
    </footer>

    <!-- SCRIPTS HERE-->

</body>
</html>
