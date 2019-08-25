<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('title', 255);
            $table->string('slug', 128)->unique();
            $table->longText('description');
            $table->tinyInteger('in_stock')->default(1);
            $table->decimal('price', 10, 2);
            $table->string('product_image');
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists('products');
    }
}
