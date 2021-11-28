<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hires', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->double('total_amount')->default(0);
            $table->double('per_hour')->default(0);
            $table->string('working_hour')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('transaction_by')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('payment_status')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hires');
    }
}
