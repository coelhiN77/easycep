<h1 align="center">
    <p>Easycep</p>
</h1>

## 💻 Sobre o projeto

📍 EasyCEP é uma aplicação web construída com Laravel que tem como objetivo tornar a integração com a API de CEP do Brasil mais simples.

---

## 🚀 Como executar o projeto

### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:

-   [Git](https://git-scm.com/downloads)
-   [XAMPP](https://www.apachefriends.org/)
-   [PHP](https://www.php.net/downloads.php) (versão 8.2.10 ou superior)
-   [Composer](https://getcomposer.org/download/) (versão 2.5.8 ou superior).

---

#### ⚙️ Configurando o XAMPP

**Nota importante:** Por favor, observe que as únicas alterações a serem feitas são nos números, conforme descrito abaixo. Existem referências para você se localizar nos arquivos, nas primeiras linhas, depois da explicação do que fazer.

1. Acesse a configuração do **Apache** e edite o arquivo 'phpMyAdmin/config.inc.php' e adicione apenas 3007

```bash
# Antes
/* Bind to the localhost ipv4 address and tcp */
$cfg['Servers'][$i]['host'] = '127.0.0.1';

# Depois
/* Bind to the localhost ipv4 address and tcp */
$cfg['Servers'][$i]['host'] = '127.0.0.1:3307';

```

2. Acesse a configuração do **Apache** e edite o arquivo 'httpd.conf' e mude apenas de 80 para 8087

```bash
# Antes
Listen 12.34.56.78:80
Listen 80

# Depois
Listen 12.34.56.78:80
Listen 8087
```

3. Acesse a configuração do **MySQL** e edite o 'my.ini' e mude apenas de 3306 para 3307

```bash
# Antes
The MySQL server
default-character-set=utf8mb4
[mysqld]
port=3306

# Depois
The MySQL server
default-character-set=utf8mb4
[mysqld]
port=3307
```

Inicie o Apache e o MySQL depois de ter feito as configurações anteriores. Para visualizar o banco de dados, clique em 'Admin' do MySQL, aguarde abrir no navegador a URL e, em seguida, adicione 8087 à URL.

```bash
# Antes
http://localhost/phpmyadmin/

# Depois
http://localhost:8087/phpmyadmin/
```

---

#### 🎲 Rodando o projeto

```bash
# Clone este repositório
$ git clone https://github.com/coelhiN77/easycep.git

# Acesse a pasta do projeto no terminal/cmd
$ cd easycep

# Abra o Visual Studio Code (VSCode) na pasta do projeto digitando no terminal
$ code .

# Abra o arquivo .env e configure ele da seguinte forma
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=easycepdb
DB_USERNAME=root
DB_PASSWORD=

# Instale as dependências do Laravel
$ composer install

# Abra o terminal e digite
$ php artisan serve

O Laravel gerará um link semelhante a 'http://127.0.0.1:8000'. Abra este link em seu navegador.
```

---
