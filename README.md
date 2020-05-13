# Vending Machine

## Setup

1. Ensure you have a machine with `git`, `docker` and `docker-compose` installed.
2. Run `git clone https://github.com/mdjnelson/vending-machine && cd vending-machine`.
3. Run `docker run --rm -v $(pwd):/app composer install`.
4. Run `docker-compose up -d --build`.
5. Run `docker exec php php artisan migrate` to create the DB schema.
6. Run `docker exec php php artisan db:seed` to populate the DB with data.

### Note

1. There are a list of valid coins (coinid) the vending machine will accept.
   These are -
    1. `1` - 5 cents.
    2. `2` - 10 cents.
    3. `3` - 25 cents.
    4. `4` - 1 dollar.

## Inserting money.

1. Run `docker exec php php artisan insertcoin <coinid>` to insert coins.
    - eg. `docker exec php php artisan insertcoin 4`
