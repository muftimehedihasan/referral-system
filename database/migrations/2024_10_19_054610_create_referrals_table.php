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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('referrer_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('referrer_id');  // First, create the foreign key column

            $table->foreign('referrer_id')              // Then, define the foreign key relationship
            ->references('id')                    // This foreign key references the 'id' column
            ->on('users')                         // On the 'users' table
            ->onDelete('cascade');                // With cascade delete, when a user is deleted, related rows are also deleted

            $table->string('email')->unique();
            $table->string('referral_code')->unique();
            $table->boolean('is_registered')->default(false);
            // $table->boolean('is_invited')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
