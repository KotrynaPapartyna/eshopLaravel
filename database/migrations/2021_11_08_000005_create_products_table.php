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
            $table->string("title");
            $table->string("excertpt",600);
            $table->longText("description");
            $table->integer("price");
            $table->string("image");

            $table->unsignedBigInteger("category_id");

            // rysio stulpelis
            // sukurus- komanda- php artisan migrate:fresh
            $table->foreign("category_id")->references('id')->on("categories");

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
