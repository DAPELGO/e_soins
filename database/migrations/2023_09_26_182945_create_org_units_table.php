<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_units', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('nom')->nullable();
            $table->string('type')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('ref_externe')->nullable();
            $table->string('parent_one')->nullable();
            $table->string('parent_two')->nullable();
            $table->string('parent_three')->nullable();
            $table->string('parent_four')->nullable();
            $table->string('ref_parent_one')->nullable();
            $table->string('ref_parent_two')->nullable();
            $table->string('ref_parent_three')->nullable();
            $table->string('ref_parent_four')->nullable();
            $table->boolean('is_delete')->nullable()->default(false);
            $table->integer('id_user_created')->nullable()->default(0);
            $table->integer('id_user_modified')->nullable()->default(0);
            $table->integer('id_user_delete')->nullable()->default(0);
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
        Schema::dropIfExists('org_units');
    }
}
