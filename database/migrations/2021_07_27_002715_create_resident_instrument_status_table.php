<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentInstrumentStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_instrument_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('resident_id');
            $table->string('s_psicologia')->nullable();
            $table->string('s_trabajo_social')->nullable();
            $table->string('s_medicina')->nullable();
            $table->string('s_enfermeria')->nullable();
            $table->string('s_consejeria')->nullable();
            $table->string('c_psicologia')->nullable();
            $table->string('c_trabajo_social')->nullable();
            $table->string('c_medicina')->nullable();
            $table->string('c_enfermeria')->nullable();
            $table->string('c_consejeria')->nullable();
            $table->string('f_consejeria')->nullable();
            $table->string('f_psicologia')->nullable();
            $table->string('f_trabajo_social')->nullable();
            $table->string('f_medicina')->nullable();
            $table->string('f_enfermeria')->nullable();
        
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
        Schema::dropIfExists('resident_instrument_status');
    }
}
