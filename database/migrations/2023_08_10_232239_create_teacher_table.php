<?php

use App\Models\Teacher\Teacher;
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
        Schema::create('teachers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('identification');
            $table->string('email');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        /*  Teacher::create([
            "name" => "Arnuel",
            "identification" => "42382434237",
            "email" => "arnuel@gmail.com"
        ]); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher');
    }
};
