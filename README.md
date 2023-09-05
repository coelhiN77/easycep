# Instruções para Configurar e Executar Localmente

Se você deseja configurar e executar este projeto Laravel em sua máquina local, siga as etapas abaixo:

## Pré-requisitos

Certifique-se de que você tenha as seguintes ferramentas e versões instaladas em sua máquina:

-   PHP (versão 8.2.10 ou superior)
-   Composer (versão 2.5.8 ou superior)
-   Laravel (versão 5.1.0)
-   XAMPP (ou equivalente)

## Configuração do Ambiente

1. Clone este repositório para sua máquina local:

    ```bash
    git clone https://github.com/coelhiN77/easycep.git
    ```

2. Acesse o diretório do projeto:

```bash
   git cd easycepdb
```

Abra o arquivo .env e configure as informações de conexão com o banco de dados. Você pode usar as seguintes configurações como exemplo, mas ajuste-as conforme necessário:

dotenv
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=easycepdb
DB_USERNAME=root
DB_PASSWORD=
Certifique-se de que o Apache e o MySQL do XAMPP (ou equivalente) estejam iniciados.

Acesse a configuração do Apache e edite o arquivo phpMyAdmin/config.inc.php. Encontre a linha que define o host do MySQL e adicione a porta 3307, conforme o exemplo abaixo:

$cfg['Servers'][$i]['host'] = '127.0.0.1:3307';
Abra o arquivo de configuração do Apache httpd.conf e altere a porta padrão de 80 para 8087, ou outra porta disponível, se necessário.

Abra o arquivo de configuração do MySQL (geralmente chamado de my.ini) e ajuste a porta de 3306 para 3307, se ainda não tiver sido feito.

Executando o Projeto
Inicie o servidor de desenvolvimento do Laravel:
php artisan serve

O Laravel gerará um link semelhante a [http://127.0.0.1:8000]. Abra este link em seu navegador.

Agora, o projeto Laravel estará sendo executado localmente em sua máquina.

Lembre-se de substituir seu-usuario e seu-repositorio pelas informações corretas do seu repositório. Além disso, verifique se todas as versões e configurações são compatíveis.
