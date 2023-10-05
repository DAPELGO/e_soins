<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreanceDettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creance_dettes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('exercice_id')->default(0);
            $table->bigInteger('structure_id')->default(0);
            $table->date('date_reception_facture')->nullable();
            $table->string('num_facture')->nullable();
            $table->bigInteger('id_type_creancedette')->default(0);
            $table->string('type_creancedette')->nullable();
            $table->string('nom_creancier_debiteur')->nullable();
            $table->string('libelle_creance_dette')->nullable();
            $table->double('montant_creance_dette')->default(0);
            $table->bigInteger('id_type_creance')->default(0);
            $table->bigInteger('id_type_dette')->default(0);
            $table->date('date_echeance')->nullable();
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
        Schema::dropIfExists('creance_dettes');
    }
}
