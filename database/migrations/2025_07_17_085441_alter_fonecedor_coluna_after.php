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
        #ADD COLUMN
        Schema::table('fornecedores',
         function (Blueprint $table) {
            $table->string('site', 150)->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        #DROP COLUMN
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropColumn('site');
        });
    }
};
