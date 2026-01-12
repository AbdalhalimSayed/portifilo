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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users", "id")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("job_name");
            $table->string("hero_description");
            $table->json("tech_skills");
            $table->string("linked_in")->nullable();
            $table->string("facebook")->nullable();
            $table->string("whatsapp")->nullable();
            $table->string("github")->nullable();
            $table->string("about_caption");
            $table->text("description");
            $table->json("soft_skills");
            $table->integer("apps");
            $table->integer("experience");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
