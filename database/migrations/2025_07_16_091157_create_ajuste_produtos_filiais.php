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
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        #ADD PRODUTO FILIAL
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->timestamps();
            #COLUNAS DE PRODUTOS/REFATORAÇÃO
            $table->float('price', 8, 2)->default(0.01);
            $table->integer('min_stock')->default(1);
            $table->integer('max_stock')->default(1);

            #ADD FOREIGN KEY PRODUTO FILIAL
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        #DROP COLUMNS PRODUTOS/REFATORADAS
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['price', 'min_stock', 'max_stock']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        #ADD COLUMNS PRODUTOS/REFATORADAS
        Schema::table('produtos', function (Blueprint $table) {
            #COLUNAS DE PRODUTOS/REFATORAÇÃO
            # $table->float('price', 8, 2)->default(0.01);
            $table->integer('min_stock')->default(1);
            $table->integer('max_stock')->default(1);
        });

        #DROP FOREIGN KEY PRODUTO FILIAL
        Schema::table('produto_filiais', function (Blueprint $table) {
            $table->dropColumn('filial_id');
            $table->dropColumn('produto_id');
        });

        #DROP PRODUTO_FILIAL
        Schema::dropIfExists('produtos_filiais');

        #DROP FILIAL
        Schema::dropIfExists('filiais');
    }
};
