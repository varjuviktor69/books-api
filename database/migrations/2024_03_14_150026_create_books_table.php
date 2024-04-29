<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('author');
            $table->string('title');
            $table->timestamp('publish_date');
            $table->string('isbn');
            $table->text('summary');
            $table->integer('price');
            $table->integer('on_store')->comment('number of available copies');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
