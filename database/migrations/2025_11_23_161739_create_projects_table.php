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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users", "id")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("name");
            $table->string("short_description");
            $table->text("description");
            $table->string("android")->nullable();
            $table->string("ios")->nullable();
            $table->string("repo")->nullable();
            $table->enum("status", ["published", "draft"]);
            $table->json("features");
            $table->json("technology");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
