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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_vn');
            $table->string('product_slug_en');
            $table->string('product_slug_vn');
            $table->string('product_code');
            $table->string('product_quantity');
            $table->string('product_tag_en');
            $table->string('product_tag_vn');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_vn')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_vn');
            $table->int('selling_price');
            $table->int('discount_price')->nullable();
            $table->text('short_description_en');
            $table->text('short_description_vn');
            $table->text('long_description_en');
            $table->text('long_description_vn');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deal')->nullable();
            $table->integer('status')->default(0);
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