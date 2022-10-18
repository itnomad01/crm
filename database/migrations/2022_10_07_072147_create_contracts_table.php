<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number')->nullable(); // номер договора
            $table->date('date')->nullable(); // дата договора
            $table->date('begin')->nullable(); // дата начала оказания услуг
            $table->date('end')->nullable(); // дата завершения оказания услуг
            $table->decimal('sum', 14, 2)->default(0); // сумма по договору
            $table->unsignedInteger('number_billout')->nullable(); // номер счёта на оплату
            $table->date('date_billout')->nullable(); // дата выставления счёта на оплату
            $table->date('date_billout_payment')->nullable(); // дата полной оплаты по счёту
            $table->unsignedInteger('number_act')->nullable(); // номер акта
            $table->date('date_act')->nullable(); // дата акта
            $table->date('date_act_accept')->nullable(); // дата подписания акта
            $table->foreignId('client_id') // с кем договор
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('representative_id') // кто подписал договор от имени клиента
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
        Schema::dropIfExists('contracts');
    }
}
