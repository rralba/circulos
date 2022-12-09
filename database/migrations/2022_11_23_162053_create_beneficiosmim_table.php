<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiosmimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiosmim', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->integer('proyect_id')->unsigned();
            $table->date('fecha_gen');
            $table->decimal('beneficio',9,0);
            $table->enum('status',['0','1','2'])->default('0');
            $table->decimal('num_pago',2,0)->nullable();
            $table->date('mes_pago')->nullable();
            $table->timestamps();
            $table->foreign('proyect_id')->references('id')->on('proyectsmim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiosmim');
    }
}
