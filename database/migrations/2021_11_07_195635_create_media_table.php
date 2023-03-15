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
    public function up() :void
    {
        $allowedMediaType = config('site.AllowedMediaType');
        $allowedMediaRole = config('site.allowedImageRole');

        Schema::create('media', function (Blueprint $table) use ($allowedMediaType, $allowedMediaRole){
            $table->id();
            $table->string('name');
            $table->enum('type', $allowedMediaType);
            $table->string('path');
            $table->string('media_type')->nullable();
            $table->bigInteger('media_id')->nullable();
            $table->enum('media_role', $allowedMediaRole)
                ->default($allowedMediaRole[0])
                ->comment('Media Usage Type');
            $table->string('size');
            $table->string('mime');
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
        Schema::dropIfExists('media');
    }
};
