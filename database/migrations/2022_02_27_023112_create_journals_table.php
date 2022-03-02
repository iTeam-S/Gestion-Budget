<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('ecriture_id');
            $table->foreign('ecriture_id')->references('id')->on('ecriture')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            # 3 chiffres entier et 0 chiffres apres virgule
            $table->double('row', 3, 0);
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
        Schema::dropIfExists('journal');
    }
}
