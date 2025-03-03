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
        Schema::create('all_courses', function (Blueprint $table) {
            $table->id();
            $table->string("course_code")->unique();
            $table->string("course_name");
            $table->string("department");
            $table->integer("level");
            $table->integer("semester");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_courses');
    }
};
