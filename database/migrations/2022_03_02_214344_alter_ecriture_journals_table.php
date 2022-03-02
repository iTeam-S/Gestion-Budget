<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEcritureJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ecriture_journal', function(Blueprint $table){
            $table->foreign('journal_id')->references('id')->on('journal')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->foreign('ecriture_id')->references('id')->on('ecriture')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
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
        //
    }
}
