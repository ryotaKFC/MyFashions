<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFashionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fashions', function (Blueprint $table) {
            $table->id();
            $table->string('photo_path');
            $table->string('season');
            $table->string('weather');
            $table->integer('temperature');
            $table->integer('humidity');
            $table->string('luck');
            $table->string('comment');
            $table->date('date');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::table('fashions', function (Blueprint $table) {
            $table->dropForeign('fashions_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('fashions');
    }
}
