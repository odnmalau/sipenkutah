<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedByToFormAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_antrian', function (Blueprint $table) {
            $table->unsignedBigInteger('updated_by')->after('id_napi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_antrian', function (Blueprint $table) {
            $table->dropColumn('updated_by');
        });
    }
}
