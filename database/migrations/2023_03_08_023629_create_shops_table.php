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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->float('rating')->default(0);
            $table->text('about')->nullable();
            $table->string('cell')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('location_id')
                ->nullable()
                ->constrained('locations');
            $table->text('location_name');
            $table->float('latitude', 8,2);
            $table->float('longitude', 8,2);
            $table->integer('sort')->default(0);
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
