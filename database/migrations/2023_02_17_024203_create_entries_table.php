<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('name', 50);
            $table->string('email', 255)->unique();
            $table->string('zip', 7);
            $table->string('prefecture', 20);
            $table->string('address', 255);
            $table->string('building', 255)->nullable();
            $table->string('gender', 6);
            $table->string('image', 255)->nullable();
            $table->string('tel', 12);
            $table->text('message')->nullable();
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
        Schema::dropIfExists('entries');
    }
}
