<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->double('amount')->default(0);
            $table->text('address')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('status')->nullable();
            $table->boolean('order_status')->nullable();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('service_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null');

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
        Schema::dropIfExists('orders');
    }
}
