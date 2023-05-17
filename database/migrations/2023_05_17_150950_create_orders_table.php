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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number', 255);
            $table->bigInteger('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')->on('suppliers')->references('id')->onDelete('set null')->onUpdate('set null');
            $table->decimal('price');
            $table->decimal('vat')->nullable();
            $table->decimal('price_vat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
