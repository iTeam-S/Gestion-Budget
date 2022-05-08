<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {

        Schema::create('ecritures', function (Blueprint $table) {
            // pour la table type, c'est pour savoir si l'écriture est entrant ou sortant
            /* pour la table state, c'est pour savoir si l'écriture est en attente de validation
            par les admin */

            $table->id();
            $table->float('somme');
            $table->text('motif');
            // tokony asina image par default ihany attachment ty
            $table->string('attachment')->default("storage/defaultAttachment.png");
            $table->foreignId('account_id')->constrained();
            $table->foreignId('journal_id')->constrained();
            $table->boolean('type');
            $table->boolean('state');
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
        Schema::dropIfExists('ecritures');
    }
};
