# i-Coins
Gestion de Budget et Finance de la communauté

## Installation
1. Lancer dans le terminal  'composer install'

   Si il y a l'exception : '[RuntimeException] vendor does not exist', lancer ces commandes:<br/>
   sudo cd ../ && chown -R {user} i-Coins/<br/>
   N.B: la commande 'whoami' return {user} au cas où

2. Copier '.env.example' dans  '.env'

3. Lancer ces commandes:<br/>
         php artisan key:generate<br/>
         php artisan migrate --seed<br/>
         php artisan storage:link
         

## Lancement
php artisan serve
