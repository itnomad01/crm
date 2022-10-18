<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();
            $table->string('family', 256)->nullable(); // Фамилия
            $table->string('name', 256)->nullable(); // Имя
            $table->string('ibn', 256)->nullable(); // Отчество
            $table->string('role', 256)->nullable(); // должность / роль
            $table->string('email', 255)->nullable(); // E-mail
            $table->string('tel', 10); // Телефон
            $table->foreignId('client_id') // на кого работает
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('creater_id') // какой пользователь создал
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('updater_id') // какой последний пользователь внёс изменения
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
        Schema::dropIfExists('representatives');
    }
}
