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
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->longText('descripcion');
            $table->enum('categoria',['Practicas I', 'Practicas II']);
            $table->string('centro');
            $table->string('pdf');
            $table->date('fecha');


            //Llave Foranea
            $table->foreignId('docente_id')->nullable()->constrained('docentes')->onDelete('cascade');
            // $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('estudiante_id')->nullable()->constrained('estudiantes')->onDelete('cascade');

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
        Schema::dropIfExists('informes');
    }
};
