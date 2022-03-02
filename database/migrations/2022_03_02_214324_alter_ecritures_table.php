<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEcrituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ecriture', function(Blueprint $table){
            $table->foreign('compte_id')->references('id')->on('compte')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
                    
            $table->foreign('periode_id')->references('id')->on('periode')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
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
