<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('assunto');
            $table->boolean('enviado_para_sibi')->nullable();
            $table->boolean('normalizado')->nullable();
            /* $table->char('enviado_para_sibi');
            $table->char('normalizado'); */
            $table->string('observacao')->nullable();
            $table->string('classificacao')->nullable();
            $table->string('categoria')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
