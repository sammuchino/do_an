<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSizeColorProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_size_color_product', function (Blueprint $table) {
            $table->increments('size_color_product_id');
            $table->integer('size_id');
            $table->integer('color_id');
            $table->string('size_name');
            $table->string('size_kichthuoc');
            $table->string('color_name');
            $table->string('color_mamau');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_size_color_product');
    }
}
