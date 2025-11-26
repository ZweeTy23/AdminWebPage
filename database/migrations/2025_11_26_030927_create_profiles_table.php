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
            $table->string('company_name',100);
            $table->string("slogan",150);
            $table->string("title",150);
            $table->text("description");
            $table->string("logo");
            $table->string("seo");
            $table->string("favicon");
            $table->string("direction",200);
            $table->string("phone",20);
            $table->string("email",100);
            $table->string("facebook",100)->nullable();
            $table->string("instagram",100)->nullable();
            $table->string("tiktok",100)->nullable();
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
