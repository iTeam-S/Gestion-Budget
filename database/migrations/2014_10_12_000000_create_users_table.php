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
        Schema::connection("mysql")->create('users', function (Blueprint $table) {
            $table->integer("id")->unique();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('prenom_usuel', 50)->unique();
            $table->string("user_pic", 255);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->primary("id");
            $table->foreignId("groupe_id")->constrained()
                ->onUpdate("cascade")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection("mysql")->dropIfExists('users');
    }
}
