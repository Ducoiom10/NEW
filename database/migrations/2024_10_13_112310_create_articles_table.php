<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('articles', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('body');
        $table->string('image')->nullable();
        $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->integer('views')->default(0);
        $table->timestamp('published_at')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('articles');
}

};