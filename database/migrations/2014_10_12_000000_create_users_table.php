<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('groupe_id')->nullable();
            
            /*
            La creation des tables par migration se fait en fichier par fichier par ordre de creation des fichiers,
            alors lors de la lecture de du fichier create_users_table(cette fichier): le table user detient un foreign_key groupe_id du table groupe,
            or que le table groupe n'est pas encore crée le fichier chargé de créer la table groupe est plus récent que le fichier chargé de créer la
            table users.
            Ce qu'il faut faire pour que laravel ne leve pas une exception c'est de creer les tables sans foreign_key et creer en fin un/des fichiers 
            qui modifier la table à ajouter les contraintes 
            */


            # rememberToken est nécessaire pour laravel quand il s'agit de regler un mot de passe oublié
            $table->rememberToken();

            # timestamps cree les tables created_at et updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
