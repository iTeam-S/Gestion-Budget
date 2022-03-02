<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcritureJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecriture_journal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journal_id'); # foreign_key de l'id du table journal
            $table->unsignedBigInteger('ecriture_id'); # foreign_key de l'id du table ecriture
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ecriture_journal');
    }
}
