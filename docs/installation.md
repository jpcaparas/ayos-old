## Installation

## Steps

1. Run `php composer install`.
2. Copy the `.env.example` file to an `.env` file and change  values accordingly.
3. Run `php artisan key:generate` to generate an encryption key on the `.env` file.
4. Run `php artisan migrate:refresh --seed` to create (and seed)  database tables.
5. Run `php artisan vendor:publish` to publish all necessary vendor files.
6. Run `php artisan passport:install` to install the OAuth 2.0 server and its components.