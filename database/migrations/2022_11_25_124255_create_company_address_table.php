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
        Schema::create('companies_address', function (Blueprint $table) {
            $table->id();
            $table->text('street');
            $table->text('number');
            $table->text('district');
            $table->text('city');
            $table->text('state');
            $table->text('cep');
            $table->text('point_of_reference')->nullable();
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
        Schema::dropIfExists('companies_address');
    }
};
