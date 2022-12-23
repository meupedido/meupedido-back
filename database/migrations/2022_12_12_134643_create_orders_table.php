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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('demanded');
            $table->integer('quantity');
            $table->string('payment');
            $table->float('value');
            $table->enum('delivery_method', ['delivery', 'removal']);
            $table->string('address')->nullable();
            $table->string('comments');
            $table->enum('status', ['in_preparation', 'ready']);
            $table->foreignId('company_id')->constrained('companies');
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
};
