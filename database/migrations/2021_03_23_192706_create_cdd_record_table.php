<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCddRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdd_record', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('cdd_id')->constrained('cdds')->onDelete('cascade');
            $table->foreignId('record_id')->constrained('records')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cdd_record');
    }
    
}
