<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128)->nullable(); // название заявки
            $table->text('about')->nullable(); // текст задания по заявке
            $table->unsignedTinyInteger('type')->default(1); // Статус заявки: 1 - обращение, 2 - ожидание решения клиента, 3 - договор заключен, 4 - завершен доовор, 0 - отказ клиента
            $table->foreignId('client_id') // от кого заявка
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('representative_id') // основной представитель клиента по заявке
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
        Schema::dropIfExists('bids');
    }
}
