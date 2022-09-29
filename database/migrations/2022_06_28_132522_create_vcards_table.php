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
        Schema::create('vcards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('name', 50);
            $table->string('title', 50);
            $table->date('birthday')->nullable();
            $table->string('Organization_name',50)->nullable();
            $table->mediumText('phone')->nullable();
            $table->mediumText('email')->nullable();
            $table->mediumText('website')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('image')->nullable();
            $table->string('note')->nullable();
            $table->string('link');

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
        Schema::dropIfExists('vcards');
    }
};
