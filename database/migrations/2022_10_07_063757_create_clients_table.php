<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('fulltitle', 512)->nullable();
            $table->string('title', 128)->nullable();
            $table->string('brandtitle', 128)->nullable();
            $table->unsignedTinyInteger('type')->default(0); // Тип клиента:  0 - юр.лицо, 1 - ИП, 2 - физ.лицо (не ИП)
            $table->string('ogrn', 15)->nullable();
            $table->string('inn', 12)->nullable();
            $table->string('kpp', 9)->nullable();
            $table->string('address', 255); // адрес регистрации
            $table->string('fintitle', 255)->nullable(); // наименование получателя в платежном поручении
            $table->string('personal_acc', 20)->nullable(); // расчётный счёт
            $table->string('bank_name', 128)->nullable(); // наименование банка
            $table->string('bic', 9)->nullable(); // БИК банка
            $table->string('corresp_acc', 20)->nullable(); // корр.счёт
            $table->string('oktmo', 11)->nullable(); // ОКТМО
            $table->string('email', 255)->nullable(); // E-mail
            $table->string('site', 255)->nullable(); // Адрес сайта
            $table->string('tel', 10)->nullable(); // Телефон
            $table->string('comment', 255)->nullable(); // Комментарий
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
        Schema::dropIfExists('clients');
    }
}
