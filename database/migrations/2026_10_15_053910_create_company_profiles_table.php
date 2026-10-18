<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('company_profiles', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable();
        $table->text('history')->nullable();
        $table->string('image')->nullable();
        $table->text('vision')->nullable();
        $table->text('mission')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
