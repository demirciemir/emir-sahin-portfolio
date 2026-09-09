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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title')->after('client_id');
            $table->string('slug')->after('title');
            
            $table->string('youtube_url')->nullable()->after('type');
            $table->string('image_path')->nullable()->after('youtube_url');
            $table->string('thumbnail_image')->nullable()->after('image_path');

            $table->dropColumn(['url', 'thumbnail']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('url');
            $table->string('thumbnail')->nullable();
            
            $table->dropColumn(['title', 'slug', 'youtube_url', 'image_path', 'thumbnail_image']);
        });
    }
};
