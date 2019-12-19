<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCollectRequestProducts
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CreateCollectRequestProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collect_request_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_collect_request')->unsigned()->nullable(false);
            $table->bigInteger('id_product')->unsigned()->nullable(false);
            $table->string('quantity')->nullable(false);
            $table->enum('unit_of_measurement', ['g', 'L', 'm', 'c'])->nullable(false);
            $table->text('note');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('collect_request_product', function(Blueprint $table)
        {
            $table->foreign('id_collect_request', 'fk1_collect_requests_products_id_order_request')
                ->references('id')
                ->on('collect_requests')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('id_product', 'fk2_order_requests_products_id_product')
                ->references('id')
                ->on('products')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collect_request_product');
    }
}
