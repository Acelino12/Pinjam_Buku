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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(false)->constrained('bookstore_user')->onDelete('restrict')->onUpdate('cascade');
            $table->string('code_purchase',20)->nullable(false)->unique();
            $table->date('purchase_date')->nullable();
            $table->decimal('total_amount',10)->nullable();
            $table->enum('status',['pending','completed','cancelled','shipped']);
            $table->enum('payment_status',['paid','unpaid','refunded']);
            $table->string('shipping_address',255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
