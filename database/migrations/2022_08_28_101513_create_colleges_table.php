<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_id');
            $table->foreignId('user_id');
            $table->string('nik')->unique();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('birthday');
            $table->enum('gender',['Laki-Laki','Perempuan']);
            $table->string('religion');
            $table->string('address');
            $table->string('phone_number');
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
        Schema::dropIfExists('colleges');
    }
}