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
        Schema::create('rental_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(false)->constrained('bookstore_users')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('books_id')->nullable(false)->constrained('books')->onDelete('restrict')->onUpdate('cascade');
            $table->string('code_rent')->nullable(false)->unique();
            $table->date('rental_date')->nullable();
            $table->date('due_at')->nullable();
            $table->date('returned_at')->nullable();
            $table->decimal('late_fee_per_week',10)->nullable()->default(15000);
            $table->decimal('total_late_fee')->nullable();
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
        Schema::dropIfExists('rental_orders');
    }
};
