<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission', function (Blueprint $table) {
            $table->id();

            # A partir d'ici les attributs sont de types selection | enum en mysql
            # Enum est un type de donnée propre à mysql qui permet de definir des valeurs prédefinie
            # faire à ce que l'attribut de type Enum ne vas pouvoir contenir que l'une de ses valeurs
            $table->enum('compte_p', ['none', 'read', 'write','readAndWrite']);
            $table->enum('ecriture_p', ['none', 'read', 'write','readAndWrite']);
            $table->enum('journal_p', ['none', 'read', 'write','readAndWrite']);
            $table->enum('periode', ['none', 'read', 'write','readAndWrite']);
            $table->enum('dashboard', ['none', 'read', 'write','readAndWrite']);
            $table->enum('user_p', ['none', 'read', 'write','readAndWrite']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
