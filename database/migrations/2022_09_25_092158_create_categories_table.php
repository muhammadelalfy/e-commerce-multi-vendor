<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('categories' , 'id')
                ->nullOnDelete();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('slug')->unique();
            $table->string('logo_image')->unique()->nullable();
            $table->string('cover_image')->unique()->nullable();
            $table->enum('status',['active' , 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
