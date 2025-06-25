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
        Schema::create('rental_items', function (Blueprint $table) {
            $table->id();
            $table->integer('rental_order_id')->nullable(false)->constrained('rental_order')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('books_id')->nullable(false)->constrained('books')->onDelete('restrict')->onUpdate('cascade');
            $table->date('returned_at')->nullable();
            $table->decimal('total_late_fee',10)->nullable()->default(0);
            $table->enum('status',['active','completed','overdue']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_items');
    }
};
