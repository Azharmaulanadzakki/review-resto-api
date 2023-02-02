<?php

use App\Models\User;
use App\Models\Resto;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('text', 'max:750');
            $table->unsignedInteger('rating')->default(0);
            $table->timestamps();
            $table->foreignIdFor(User::class, 'user_id')->cascadeOnDelete();
            $table->foreignIdFor(Resto::class, 'resto_id')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
