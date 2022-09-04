<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['Cuti','Aktif','Selesai','Non Aktif','Drop Out','Skorsing','Passing Out']);
            $table->string('generation');
            $table->enum('level_of_study',['S1','S2','S3']);
            $table->string('fakultas');
            $table->string('major');
            $table->enum('entrance',['SNMPTN','SBMPTN','MANDIRI']);
            $table->float('ipk')->default(0);
            $table->char('semester')->default(1);
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
        Schema::dropIfExists('data');
    }
}