composer install --dev

composer require laravel/jetstream

php artisan jetstream:install livewire

php artisan key:generate



copie .env.example para .env

Cadastro de associados e anuidades/anuidades disponiveis dependendo do ano de filiacao do associado/anuidades podem ser "pagas" ou "em aberto", sendo as pagas registradas em uma tabela com chave estrangeiro para associado/tabela de checkout com valor total devido dependendo das anuidades que estao pagas/edicao de anuidades
