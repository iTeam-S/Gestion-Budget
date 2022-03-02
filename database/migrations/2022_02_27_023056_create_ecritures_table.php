<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcrituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecriture', function (Blueprint $table) {
            $table->id();
            $table->float('somme');
            $table->text('motif');
            $table->string('piece_jointe');
            $table->unsignedBigInteger('compte_id'); # foreign_key de l'id du table compte
            $table->unsignedBigInteger('periode_id');  # foreign_key de l'id du table periode
            
            # timestamps cree la table created_at pour savoir la date de creation
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
        Schema::dropIfExists('ecriture');
    }
}
