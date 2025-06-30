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
        Schema::table('bookstore_users', function (Blueprint $table) {
            $table->string('code_user')->nullable(false)->unique()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookstore_users', function (Blueprint $table) {
            $table->dropColumn('code_user');
        });
    }
};
