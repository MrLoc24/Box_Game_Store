<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('cardId')->autoIncrement('cardId')->primary('cardId');
            $table->string('userID');
            $table->foreign('userID')->references('userID')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('card_number');
            $table->integer('cvv');
            $table->dateTime('payment_date');
            $table->string('card_name');
            $table->string('image');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
