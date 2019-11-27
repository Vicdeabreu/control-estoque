<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriandoProdutosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function(Blueprint $table){ // Necesita de dos parámetros, el nombre de la columna y el objeto que va a ejecutar la función para generar la columna. El objeto y la función Blueprint (una clase), que se usa para generar una columna y solo recibe un parámetro. En este caso $table.Resumen:Blueprint es un generador de columna.
            $table->bigIncrements('id');
            $table->string('nome', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // El método down elimina la tabla en caso de existir
    {
        Schema::dropIfExists('produtos'); // Elimina la tabla completa si lo necesitas

    }
}


