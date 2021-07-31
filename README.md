## Sobre este sistema

Projeto básico em Laravel utilizando o JWT para geração de Token 

## Requisitos Mínimos ##

Debian 10 
PHP 7.4
MariaDB
Composer


## Instalação

### PHP
```
sudo apt install apt-transport-https ca-certificates curl software-properties-common zip gnupg git
sudo curl -fsSL https://packages.sury.org/php/apt.gpg | sudo apt-key add -
sudo add-apt-repository "deb https://packages.sury.org/php/ $(lsb_release -cs) main"
sudo apt update
sudo apt install php7.4-common php7.4-cli libapache2-mod-php7.4
sudo apt-get install php7.4-mbstring php7.4-xml php7.4-mysql
```

### Composer
```
sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

### MYSQL
```
sudo apt update
sudo apt install mariadb-server
```

Acesse o Mysql de sua máquina como o usuário root
```
mysql -u root
```

Criando o Banco:
```
create database api;

CREATE USER 'apiUser'@'localhost' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON api.* TO 'apiUser'@'localhost';

FLUSH PRIVILEGES;

quit;

```

## Projeto
Acessar a pasta
```
cd /var/www/html
```

Remover arquivo index.html
```
rm /var/www/html/index.html
```


Clonar o Projeto
```
sudo git clone https://github.com/fladermorais/api.git api
```

Acessar a pasta do projeto
```
cd api
```

Copiando o arquivo .env
```
cp .env.example .env
```

Altere as configurações referente ao banco nas linhas correspondentes ao '''mysql''' e '''configurações '''
```
APP_URL=http://meudominio.com.br


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api
DB_USERNAME=apiUser
DB_PASSWORD=password
```

Instalando dependencias:
```
composer update
```

Agora que o arquivo .env foi criado e configurado o banco de dados é necessário gerar a chave(key) do Laravel e criar um link para a pasta storage dentro diretorio public
```
php artisan key:generate
php artisan storage:link

```

### Criando as tabelas no Banco de Dados
Para gerar as tabelas no banco execute o seguinte comando
```
php artisan migrate --seed
```

## Dando permissão para a pasta storage
É necessário dar permissão para a pasta storage, para o sistema gerar alguns logs e arquivos necessários.
Dentro da pasta raiz do projeto execute o seguinte comando:
```
sudo chmod -R 777 storage
```

### Usuário padrão do sistema
```
usuário:    admin@admin.com.br
senha:      Mudar123@
```



## Configuracoes Adicionais (manuais)

### Apache

Edite o arquivo sites-enabled/api.conf e adicione os certificados corretos
Tem um exemplo dentro da pasta common/apache