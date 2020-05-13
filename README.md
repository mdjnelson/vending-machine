# Vending Machine

## Setup

1. Ensure you have a machine with `git`, `docker` and `docker-compose` installed.
2. Run `git clone https://github.com/mdjnelson/vending-machine && cd vending-machine`.
3. Run `docker run --rm -v $(pwd):/app composer install`.
4. Run `docker-compose up -d --build`.
5. Run `docker exec php php artisan migrate` to create the DB schema.
6. Run `docker exec php php artisan db:seed` to populate the DB with data.

### Note

1. These are a list of valid coins the vending machine will accept.
    1. `1` - 5 cents.
    2. `2` - 10 cents.
    3. `3` - 25 cents.
    4. `4` - 1 dollar.
2. These are a list of valid items that the vending machine will stock.
    1. `1` - Water.
    2. `2` - Juice.
    3. `3` - Soda.
    
The command `docker exec php php artisan db:seed` will define the items that can be bought, and the coins that can
be used. However, to fill the vending machine with items and coins please use the `service` commands listed below.

## Usage

### Servicing the machine.

1. Adding more items to the machine can be done via the command
    `docker exec php php artisan service:additem <itemid> <amount>`
    - eg. `docker exec php php artisan service:additems 1 20` will insert 20 waters.
2. Adding more coins to the machine can be done via the command
    `docker exec php php artisan service:addcoin <coinid> <amount>`
    - eg. `docker exec php php artisan service:addcoins 3 20` will insert 20 25 cents.

### Inserting money.

1. Run `docker exec php php artisan insertcoin <coinid>` to insert coins to buy an item.
    - eg. `docker exec php php artisan insertcoin 4` will insert a dollar coin.

### Buying an item.

1. Once you have inserted enough money you are able to buy items via the command
    `docker exec php php artisan buyitem <itemid>`.
    - eg. `docker exec php php artisan buyitem 1` will attempt to purchase water.

### Return coins.

1. This will return all the inserted coins in the vending machine via the command
    `docker exec php php artisan returncoins`.
