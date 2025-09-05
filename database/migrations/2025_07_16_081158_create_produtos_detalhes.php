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
        Schema::create(
            'produtos_detalhes',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('produto_id');
                $table->float('length', 8, 2);
                $table->float('width', 8, 2);
                $table->float('height', 8, 2);
                $table->timestamps();
                #FOREIGN KEY
                $table->foreign('produto_id')
                    ->references('id')->on('produtos');
                #RELATIONSHIP
                $table->unique('produto_id');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_detalhes');
    }
};
