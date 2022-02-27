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
            $table->unsignedBigInteger('compte_id');
            $table->unsignedBigInteger('journal_id');
            $table->unsignedBigInteger('periode_id');
            $table->foreign('compte_id')->references('id')->on('compte')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->foreign('journal_id')->references('id')->on('journal')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
                    
            $table->foreign('periode_id')->references('id')->on('periode')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            
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
        Schema::dropIfExists('ecritures');
    }
}
