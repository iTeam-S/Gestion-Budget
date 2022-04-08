# Installation

etape 1
> composer update

etape 2
> - copier le fichier ".env.example" dans une autre fichier
> - renommer la copie en ".env"
> - faire la configuration de la base des données dans le fichier .env

etape 3
> - php artisan key:generate
> - php artisan migrate
> - php artisan migrate --seed
> - php artisan storage:link

## Lancement

> php artisan serve

### Recommendation

> - Faire des enregistrements(insertion de données) dans la table writings(1 ou 2 ligne suffit)<br>
> - Afin d'exploiter les résultats

#### Authentification

nom d'utilisateur

> admin@iteams.mg<br>
> lead@iteams.mg<br>
> utilisateur@iteams.mg<br>

mot de passe(la même pour tous les comptes)
> secret
