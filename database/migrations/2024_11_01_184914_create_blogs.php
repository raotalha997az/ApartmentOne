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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('title', 255); // title VARCHAR(255)
            $table->string('slug', 255); // slug VARCHAR(255)
            $table->string('short_description', 1000); // short_description VARCHAR(1000)
            $table->text('long_description'); // long_description TEXT
            $table->string('page_title', 255)->nullable(); // page_title VARCHAR(255) NULL
            $table->string('meta_tag', 255)->nullable(); // meta_tag VARCHAR(255) NULL
            $table->string('image', 255); // image VARCHAR(255)
            $table->tinyInteger('is_popular')->default(0); // is_popular TINYINT(4) DEFAULT 0
            $table->tinyInteger('is_trending')->default(0); // is_trending TINYINT(4) DEFAULT 0
            $table->tinyInteger('is_latest')->default(0);
            $table->timestamps(); // created_at and updated_at TIMESTAMP NULL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
