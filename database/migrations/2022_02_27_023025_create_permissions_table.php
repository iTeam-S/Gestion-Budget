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
            # Enum est un type de donnée propre à mysql qui permet de definir des valeurs prédefinie et de
            # ne pas pouvoir contenir que l'une de ses valeurs
            # les valeurs prédefinies ici sont fictifs
            # J'aurai pensé à un type boolean
            $table->enum('compte_p', ['oui', 'non']);
            $table->enum('ecriture_p', ['oui', 'non']);
            $table->enum('journal_p', ['oui', 'non']);
            $table->enum('periode', ['oui', 'non']);
            $table->enum('dashboard', ['oui', 'non']);
            $table->enum('user_p', ['oui', 'non']);
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
