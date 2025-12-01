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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name',100)->unique();
            $table->string('slug',100);
            //SEO
            $table->string("title",190);
            $table->string("description",300);
            $table->string("img",200);//480*480
            $table->string("code",30)->nullable();
            $table->text("details")->nullable();
            $table->integer("stock")->default(0);
            $table->decimal("price",10,2)->default(0.00);
            $table->integer("visits")->default(0);
            $table->integer("order")->default(0);
            $table->foreignId("category_id")->references('id')->on("categories")->onUpdate("cascade")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
