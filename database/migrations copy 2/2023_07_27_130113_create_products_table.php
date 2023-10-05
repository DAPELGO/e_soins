<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code_product')->nullable();
            $table->string('name')->nullable();
            $table->string('unit')->nullable();
            $table->string('product_id')->nullable();
            $table->string('description')->nullable();
            $table->string('category')->nullable();
            $table->string('program_id')->nullable();
            $table->string('cost')->nullable();
            $table->string('max_age_months')->nullable();
            $table->string('form')->nullable();
            $table->string('optional')->nullable();
            $table->string('med_key')->nullable();
            $table->string('dose_style')->nullable();
            $table->string('max_weight')->nullable();
            $table->string('id_traceur')->nullable();
            $table->string('class')->nullable();
            $table->string('min_weight')->nullable();
            $table->string('prix_drd')->nullable();
            $table->string('min_age_months')->nullable();
            $table->string('short')->nullable();
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
        Schema::dropIfExists('products');
    }
}
