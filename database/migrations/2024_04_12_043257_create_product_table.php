<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();

            $table->string('name', 128);
            $table->double('price', 38, 2)->default(0);
            $table->string('category', 64);
            $table->text('description', 5000)->nullable();
            // $table->enum('fee_bearer', ['client', 'customer'])->default('client');
            $table->string('image', 128);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
