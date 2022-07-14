**LOG COMPTA**

*Installation*

`composer update` installation des modules nécessaires

Créer un fichier `.env` à partir du fichier `.env.example` et faire la configuration de la base des données dans le fichier de variable d'environnement.

`php artisan migrate` construction de la structure de la base

`php artisan serve` ou `php artisan serve --port=XXXX` lancement

**Les routes de l'API**

*Authentification*

`http://hostname:port/auth/login`

`http://hostname:port/auth/register`

`http://hostname:port/auth/logout`

`http://hostname:port/auth/refresh`

`http://hostname:port/auth/reset-password`

**CRUD**
<br/>

*Ecritures*

`http://hostname:port/ecriture/getAll` tous les écritures

`http://hostname:port/ecriture/get/{id}`

`http://hostname:port/ecriture/store`

`http://hostname:port/ecriture/update/{id}`

`http://hostname:port/ecriture/remove/{id}`
<br/>

*Journals*

`http://hostname:port/journal/getAll` tous les journals

`http://hostname:port/journal/get/{id}`

`http://hostname:port/journal/store`

`http://hostname:port/journal/update/{id}`

`http://hostname:port/journal/remove/{id}`
<br/>

*Comptes*

`http://hostname:port/compte/getAll` tous les comptes

`http://hostname:port/compte/get/{id}`

`http://hostname:port/compte/store`

`http://hostname:port/compte/update/{id}`

`http://hostname:port/compte/remove/{id}`





