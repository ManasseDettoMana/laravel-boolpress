<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            //se a user_id non avessi messo l'opzione nullable(), nella foreign come stringa nell'onDelete() avrei messo 'cascade', così da eliminare tutto il dato.
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('address', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('phone', 30)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_infos', function(Blueprint $table){
            $table->dropForeign('user_infos_user_id_foreign');  
        });

        Schema::dropIfExists('user_infos');
    }
}
