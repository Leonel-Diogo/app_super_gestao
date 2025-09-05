<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidades', 5); #cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();
        });
        #ADICIONANDO RELACIONAMENTO COM PRODUTOS
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            #ADD FOREIGN KEY
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        #ADICIONANDO RELACIONAMENTO COM PRODUTOS_DETALHES
        Schema::table('produtos_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            #FOREIGN KEY
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        #REMOVENDO RELACIONAMENTO COM PRODUTOS_DETALHES
        Schema::table('produtos_detalhes', function (Blueprint $table) {
            #DROP FOREIGN KEY
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');//[table]_[column]_foreign
            #DROP COLUMN
            $table->dropColumn('unidade_id');
        });

        #REMOVENDO RELACIONAMENTO COM PRODUTOS
        Schema::table('produtos', function (Blueprint $table) {
            #DROP FOREIGN KEY
            $table->dropForeign('produtos_unidade_id_foreign');//[table]_[column]_foreign
            #DROP COLUMN
            $table->dropColumn('unidade_id');
        });
        #REMOVENDO A TABELA UNIDADES
        Schema::dropIfExists('unidades');
    }
};
