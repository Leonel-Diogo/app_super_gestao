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
        #ADD COLUMN "contact_reason_id"
        Schema::table(
            'site_contatos',
            function (Blueprint $table) {
                $table->unsignedBigInteger('contact_reason_id');
            }
        );
        #ATRIBUIR OS VALORES DE contact_reason PARA contact_reason_id
        DB::statement('update site_contatos set contact_reason_id = contact_reason');
        #CRIAR A FK E REMOVER contact_reason
        Schema::table(
            'site_contatos',
            function (Blueprint $table) {
                $table->foreign('contact_reason_id')->references('id')->on('motivo_contatos');
                $table->dropColumn('contact_reason');
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
        #CRIAR contact_reason E REMOVER A FK 
        Schema::table(
            'site_contatos',
            function (Blueprint $table) {
                $table->integer('contact_reason');
                $table->dropForeign('site_contatos_contact_reason_id_foreign');
            }
        );
        #ATRIBUIR contact_reason_id PARA contact_reason
        DB::statement('update site_contatos set contact_reason = contact_reason_id');

        #DROP COLUMN "contact_reason_id"
        Schema::table(
            'site_contatos',
            function (Blueprint $table) {
                $table->dropColumn('contact_reason_id');
            }
        );
    }
};
