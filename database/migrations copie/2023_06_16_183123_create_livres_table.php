<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('exercice_id')->default(0);
            $table->bigInteger('livre_id')->default(0);
            $table->bigInteger('id_categorie')->default(0);
            $table->date('date_evenement')->nullable();
            $table->string('num_enregistrement')->nullable();
            $table->string('ref_piece_justificative')->nullable();
            $table->bigInteger('id_type_operation')->default(0);
            $table->bigInteger('id_libelle')->default(0);
            $table->text('designation')->nullable();
            $table->bigInteger('id_type_evacuation')->default(0);
            $table->string('nom_prenom_patient')->nullable();
            $table->date('age_patient')->nullable();
            $table->string('id_structure_evacuation')->nullable();
            $table->string('action_livre')->nullable();
            $table->string('id_de_vers')->nullable();
            $table->double('montant_livre')->nullable();
            $table->boolean('is_actif')->nullable();
            $table->string('type_structure')->nullable();
            $table->text('description_livre')->nullable();
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
        Schema::dropIfExists('livres');
    }
}
