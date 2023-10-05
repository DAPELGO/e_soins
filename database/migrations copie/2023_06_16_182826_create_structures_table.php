<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_typestructure')->default(0);
            $table->bigInteger('parent_id')->default(0);
            $table->string('nom_structure');
            $table->text('description_structure')->nullable();
            $table->bigInteger('id_user_created')->default(0);
            $table->bigInteger('id_user_updated')->default(0);
            $table->bigInteger('id_user_deleted')->default(0);
            $table->boolean('is_delete')->default(FALSE);
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
        Schema::dropIfExists('structures');
    }
}
