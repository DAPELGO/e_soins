<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('consultation_type')->nullable();
            $table->double('cout_mise_en_observation')->nullable();
            $table->double('cout_total_equipement')->nullable();
            $table->double('cout_total_act')->nullable();
            $table->string('csps')->nullable();
            $table->string('district')->nullable();
            $table->string('drs')->nullable();
            $table->string('liste_eq')->nullable();
            $table->string('nom_agent')->nullable();
            $table->string('nom_patient')->nullable();
            $table->string('num_ordonnance')->nullable();
            $table->string('qualification')->nullable();
            $table->string('screen_act_type')->nullable();
            $table->double('total_act_cost')->nullable();
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
        Schema::dropIfExists('consultations');
    }
}
