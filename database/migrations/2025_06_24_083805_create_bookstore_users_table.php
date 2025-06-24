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
        // untuk user 
        Schema::create('bookstore_users', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable(false);
            $table->string('email',100)->unique()->nullable(false);
            $table->string('password',255)->nullable(false);
            $table->rememberToken();
            $table->enum('gender',['man','woman','other'])->nullable(false);
            $table->string('phone',20)->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('restrict')->onUpdate('cascade');
            $table->string('place_of_birth',100)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('age')->nullable();
            $table->string('address',255)->nullable();
            $table->string('photo',100)->nullable();
            $table->boolean('can_buy')->default('true');
            $table->boolean('can_rent')->default('true');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_user_reset_tokens',function(Blueprint $table){
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookstore_users');
        Schema::dropIfExists('password_user_reset_tokens');
    }
};
