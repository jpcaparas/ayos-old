## Installation

## Steps

1. Run `php composer install`.
1. Copy the `.env.example` file to an `.env` file and change  values accordingly.
1. Run `php artisan key:generate` to generate an encryption key on the `.env` file.
1. Run `php artisan migrate:refresh --seed` to create (and seed)  database tables.
1. Run `php artisan vendor:publish` to publish all necessary vendor files.
1. Run `php artisan passport:install` to install the OAuth 2.0 server and its components.

## Gotchas

1. These installation steps were performed on OSX Sierra 10.12 (Unix-like), so there is no guarantee yet it will install flawless on Windows.
1. Laravel Valet was used to serve the application.
1. A Vagrant/Docker box will be created soon.
