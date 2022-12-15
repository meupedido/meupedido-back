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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('payment_methods');
            $table->decimal('minimum_order');
            $table->decimal('delivery_fee');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->time('opening_hours');
            $table->time('closing_hours');
            $table->string('password');
            $table->foreignId('branch_id')->constrained('line_of_business');
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
        Schema::dropIfExists('companies');
    }
};
