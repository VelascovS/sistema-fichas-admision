<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migraciones
     */
    public function up(): void
    {
        Schema::create('fichas_admisions', function (Blueprint $table) {
            $table->id();
            $table->char('periodo', 5);
            $table->integer('folio_solicitud');
            $table->char('carrera', 100);
            $table->integer('reticula');
            $table->integer('ficha');
            $table->char('curp', 18);
            $table->string('apellidos_aspirante', 100);
            $table->string('nombre_aspirante', 100);
            $table->date('fecha_nacimiento');
            $table->char('sexo', 1);
            $table->char('estado_civil', 1);
            $table->integer('tipo_escuela');
            $table->integer('clave_escuela');
            $table->string('escuela_procedencia', 100);
            $table->decimal('promedio_bachillerato', 5, 2);
            $table->integer('anio_termino_bachillerato');
            $table->string('entidad_federativa_proc', 50);

            // CAMPOS ADICIONALES (NULLABLE)

            $table->string('calle', 40)->nullable();
            $table->string('colonia', 40)->nullable();
            $table->string('ciudad', 50)->nullable();
            $table->string('municipio', 100)->nullable();
            $table->string('entidad_federativa', 50)->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('correo_electronico', 60)->nullable();
            $table->dateTime('fecha_hora_atencion')->nullable();
            $table->char('estatus_admision', 2)->nullable();
            $table->string('comunidad_indigena', 100)->nullable();
            $table->string('lengua_indigena', 100)->nullable();
            $table->char('nacionalidad', 3)->nullable();
            $table->integer('intentos_ingreso')->nullable();
            $table->char('area_formacion', 3)->nullable();
            $table->string('especifica_formacion', 60)->nullable();
            $table->integer('periodos_realizacion_bach')->nullable();
            $table->string('otros_periodos', 60)->nullable();
            $table->char('orientacion_profesional', 2)->nullable();
            $table->char('estudios_otra_institucion', 1)->nullable();
            $table->string('cual_estudios', 100)->nullable();
            $table->string('estudios_carrera', 100)->nullable();
            $table->char('convencido_carrera_sol', 2)->nullable();
            $table->char('interes_otra_carrera', 1)->nullable();
            $table->char('cual_otra_carrera', 3)->nullable();
            $table->char('tiene_mate_repro_prepa', 1)->nullable();
            $table->string('cuales_mate_repro', 150)->nullable();
            $table->string('materias_deficiencia', 150)->nullable();
            $table->string('materias_complejas', 150)->nullable();
            $table->char('necesario_habitos_estudio', 2)->nullable();
            $table->char('prestigio_eleccion', 2)->nullable();
            $table->char('compara_itq', 2)->nullable();
            $table->string('motivos_estudios_itq', 150)->nullable();
            $table->char('contribucion_prof_itq', 2)->nullable();
            $table->string('ofertar_otras_carreras', 150)->nullable();
            $table->char('habitos_suficientes', 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas_admisions');
    }
};
