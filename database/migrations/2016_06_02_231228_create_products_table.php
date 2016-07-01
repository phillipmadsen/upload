<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateproductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->boolean('ispromo');
            $table->boolean('is_published');
            $table->string('availability')->nullable();

            $table->string('status')->nullable();
            $table->string('office_status')->nullable();

            $table->string('model')->nullable();
            $table->string('sku', 13)->nullable();
            $table->string('upc', 13)->nullable();
            $table->string('mpn')->nullable();
            $table->string('name');
            $table->string('subtitle')->nullable();
            $table->text('short_description');
            $table->text('description');

            $table->string('category')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('facebook_title')->nullable();
            $table->string('google_plus_title')->nullable();
            $table->string('twitter_title')->nullable();
            $table->integer('price')->nullable();
            $table->integer('promo_price')->unsigned()->nullable();
            $table->integer('msrp_price')->unsigned()->nullable();
            $table->integer('dealer_price')->unsigned()->nullable();
            $table->integer('employee_price')->unsigned()->nullable();

            $table->integer('quantity')->unsigned()->nullable();

            $table->string('video_url')->nullable();


            $table->string('product_doc')->nullable();
            $table->string('product_doc_label')->nullable();
            $table->integer('product_doc_file_size')->unsigned()->nullable();
            $table->string('tracking')->nullable();
            $table->string('datalayer')->nullable();
            $table->timestamp('pubished_at')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
