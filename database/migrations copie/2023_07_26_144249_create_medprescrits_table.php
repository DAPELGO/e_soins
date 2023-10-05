<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedprescritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medprescrits', function (Blueprint $table) {
            $table->id();
            $table->integer('ordonnnce_id')->nullable();
            $table->string('drugs_dispensation')->nullable();
            $table->string('orgunit_id')->nullable();
            $table->string('orgunit_name')->nullable();
            $table->datetime('date_dispensation')->nullable();
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
        Schema::dropIfExists('medprescrits');
    }
}
