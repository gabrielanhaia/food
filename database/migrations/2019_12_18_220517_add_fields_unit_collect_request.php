<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddFieldsUnitCollectRequest
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class AddFieldsUnitCollectRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collect_requests', function (Blueprint $table) {
            $table->string('quantity')->after('description');
            $table->enum('unit_of_measurement', ['g', 'L', 'm', 'c'])->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collect_requests', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('unit_of_measurement');
        });
    }
}
