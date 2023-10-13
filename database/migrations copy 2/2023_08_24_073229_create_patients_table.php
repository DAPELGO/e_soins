<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->date('birth_date')->nullable();
            $table->string('name')->nullable();
            $table->string('sexe')->nullable();
            $table->string('village')->nullable();
            $table->string('mother')->nullable();
            $table->string('affiliation_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('extrait_naissance')->nullable();
            $table->string('cnib_father')->nullable();
            $table->string('cnib_mother')->nullable();
            $table->string('gaspa_mother')->nullable();
            $table->boolean('is_delete')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
