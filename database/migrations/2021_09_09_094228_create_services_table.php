<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('tagline')->nullable();
            $table->bigInteger('service_category_id')->unsigned()->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('discount')->nullable();
            $table->enum('discount_type', ['fixed', 'percent'])->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
