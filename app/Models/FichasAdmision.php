<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichasAdmision extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos
     */
    protected $table = 'fichas_admisions';

    /**
     * Atributos que se pueden asignar masivamente
     */
    protected $fillable = [
        'periodo',
        'folio_solicitud',
        'carrera',
        'reticula',
        'ficha',
        'curp',
        'apellidos_aspirante',
        'nombre_aspirante',
        'fecha_nacimiento',
        'sexo',
        'estado_civil',
        'tipo_escuela',
        'clave_escuela',
        'escuela_procedencia',
        'promedio_bachillerato',
        'anio_termino_bachillerato',
        'entidad_federativa_proc',
        
        // CAMPOS ADICIONALES (NULLABLE)

        'calle',
        'colonia',
        'ciudad',
        'municipio',
        'entidad_federativa',
        'codigo_postal',
        'telefono',
        'correo_electronico',
        'fecha_hora_atencion',
        'estatus_admision',
        'comunidad_indigena',
        'lengua_indigena',
        'nacionalidad',
        'intentos_ingreso',
        'area_formacion',
        'especifica_formacion',
        'periodos_realizacion_bach',
        'otros_periodos',
        'orientacion_profesional',
        'estudios_otra_institucion',
        'cual_estudios',
        'estudios_carrera',
        'convencido_carrera_sol',
        'interes_otra_carrera',
        'cual_otra_carrera',
        'tiene_mate_repro_prepa',
        'cuales_mate_repro',
        'materias_deficiencia',
        'materias_complejas',
        'necesario_habitos_estudio',
        'prestigio_eleccion',
        'compara_itq',
        'motivos_estudios_itq',
        'contribucion_prof_itq',
        'ofertar_otras_carreras',
        'habitos_suficientes',
    ];

    /**
     * Atributos que deben ser convertidos a tipos nativos
     */
    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_hora_atencion' => 'datetime',
        'promedio_bachillerato' => 'decimal:2',
    ];
}
