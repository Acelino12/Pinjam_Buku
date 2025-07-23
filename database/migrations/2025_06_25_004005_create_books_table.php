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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable(false);
            $table->integer('author_id')->nullable()->constrained('authors')->onDelete('restrict')->onUpdate('cascade');
            $table->string('code_book', 20)->nullable(false)->unique();
            $table->integer('publisher')->nullable()->constrained('publishers')->onDelete('restrict')->onUpdate('cascade');
            $table->text('description')->nullable();
            $table->boolean('is_saleable');
            $table->integer('stock_for_sale')->nullable(false);
            $table->decimal('sale_price', 10)->nullable(false);
            $table->boolean('is_rentable');
            $table->integer('stock_for_rent')->nullable(false);
            $table->string('book_cover')->nullable();
            $table->integer('pages');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
