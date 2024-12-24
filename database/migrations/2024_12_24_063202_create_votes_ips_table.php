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
        Schema::create('votes_ips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('votes_id');
            $table->string('ip_address');
            $table->timestamps();

            $table->foreign('votes_id')->references('id')->on('votes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes_ips');
    }
};
