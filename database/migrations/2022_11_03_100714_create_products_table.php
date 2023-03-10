<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->unsignedBigInteger('categoryId ');
            $table->foreign('categoryId ')->references('id')->on('categories');
            $table->unsignedBigInteger('productUnitId');
            $table->foreign('productUnitId')->references('id')->on('productUnitId');
            $table->string('productPrice');
            $table->string('productDiscount');
            $table->string('productShipCharge');
            $table->string('productSlug');
            $table->string('productImage');
            $table->string('productDescription');
            $table->integer('status')->default(0);
            $table->integer('is_featured')->nullable();
            $table->integer('is_newArrival')->nullable();
            $table->integer('is_offers')->nullable();
            $table->integer('is_bestSelling')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
