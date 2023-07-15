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
        Schema::create('letter_receivers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("disposition_id")->constrained("users")->default(null);
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("sent_letter_id")->constrained("sent_letters");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_receivers');
    }
};
