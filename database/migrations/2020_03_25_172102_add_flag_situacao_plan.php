<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlagSituacaoPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function($table) {
            $table->char('flag_situacao', 1)
                  ->comment('0 ATIVO, 1 INATIVO')
                  ->default(0)
                  ->nullable()
                  ->after('description'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function($table) {
            $table->dropColumn('flag_situacao');
        });
    }
}
