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
        Schema::create('letter_statuses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid("letter_receiver_id")->constrained("letter_receivers");
            $table->enum("status", ["sented", "received", "disposition"]);
            $table->boolean("read")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_statuses');
    }
};
