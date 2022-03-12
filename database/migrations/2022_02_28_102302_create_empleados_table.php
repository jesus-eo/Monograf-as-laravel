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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamp('fecha_alt')->nullable();
            $table->decimal('salario', 6, 2);
             //Seis lugares con dos decimales
            $table->foreignId('departamento_id')->constrained('departamentos');
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
        Schema::dropIfExists('empleados');
    }
};
/*           $table->id();
            $table->string('codigo',6)->unique();
            $table->foreignId('origen_id')->constrained('aeropuertos');
            $table->timestamp('llegada');
            $table->decimal('plazas',3);
            $table->decimal('precio',8,2);ocupa 8 lugares total dos de ellos decimales
            $table->timestamps();
             $table->year('anyo')->nullable();
              $table->time('duracion');//HH::MM::SS
              $table->integer('numero');
              */
