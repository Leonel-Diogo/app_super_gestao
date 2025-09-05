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
        Schema::table(
            'fornecedores',
            function (Blueprint $table) {
                $table->string('email', 80);
                $table->string('uf', 5);
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
        Schema::dropColumns('fornecedores', 'email');
        Schema::dropColumns('fornecedores', 'uf');
    }
};
