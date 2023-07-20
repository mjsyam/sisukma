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
        Schema::create('sent_letters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("title");
            $table->string("refrences_number");
            $table->string("letter_destination")->nullable();
            $table->string("body");
            $table->string("sender")->nullable();
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("letter_category_id")->constrained("letter_categories");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sent_letters');
    }
};
