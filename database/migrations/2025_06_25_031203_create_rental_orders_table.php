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
            $table->string('code_rent')->nullable(false)->unique();
            $table->timestamp('rental_date');
            $table->date('borrowed')->nullable(false);
            $table->date('due_at')->nullable(false);
            $table->decimal('late_fee_per_week')->default(15000);
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
