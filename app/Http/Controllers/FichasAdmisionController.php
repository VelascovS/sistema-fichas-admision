<?php

namespace App\Http\Controllers;

use App\Models\FichasAdmision;
use Illuminate\Http\Request;

class FichasAdmisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las fichas ordenadas por periodo
        $fichas_admision = FichasAdmision::orderBy('periodo')->get();
        
        // Retornar la vista con los datos
        return view('fichas_admision.index', compact('fichas_admision'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fichas_admision.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'periodo' => 'required|max:5',
            'folio_solicitud' => 'required|integer',
            'carrera' => 'nullable|max:100',
            'reticula' => 'nullable|integer',
            'ficha' => 'required|integer',
            'curp' => 'nullable|max:18',
            'apellidos_aspirante' => 'nullable|max:100',
            'nombre_aspirante' => 'nullable|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|max:1',
            'estado_civil' => 'nullable|max:1',
            'tipo_escuela' => 'nullable|integer',
            'clave_escuela' => 'nullable|integer',
            'escuela_procedencia' => 'nullable|max:100',
            'promedio_bachillerato' => 'nullable|numeric|between:0,100',
            'anio_termino_bachillerato' => 'nullable|integer|digits:4',
            'entidad_federativa_proc' => 'nullable|max:50',

            // CAMPOS ADICIONALES (NULLABLE)

            'calle' => 'nullable|max:40',
            'colonia' => 'nullable|max:40',
            'ciudad' => 'nullable|max:50',
            'municipio' => 'nullable|max:100',
            'entidad_federativa' => 'nullable|max:50',
            'codigo_postal' => 'nullable|integer',
            'telefono' => 'nullable|max:30',
            'correo_electronico' => 'nullable|email|max:60',
            'fecha_hora_atencion' => 'nullable|date',
            'estatus_admision' => 'nullable|max:2',
            'comunidad_indigena' => 'nullable|max:100',
            'lengua_indigena' => 'nullable|max:100',
            'nacionalidad' => 'nullable|max:3',
            'intentos_ingreso' => 'nullable|integer',
            'area_formacion' => 'nullable|max:3',
            'especifica_formacion' => 'nullable|max:60',
            'periodos_realizacion_bach' => 'nullable|integer',
            'otros_periodos' => 'nullable|max:60',
            'orientacion_profesional' => 'nullable|max:2',
            'estudios_otra_institucion' => 'nullable|max:1',
            'cual_estudios' => 'nullable|max:100',
            'estudios_carrera' => 'nullable|max:100',
            'convencido_carrera_sol' => 'nullable|max:2',
            'interes_otra_carrera' => 'nullable|max:1',
            'cual_otra_carrera' => 'nullable|max:3',
            'tiene_mate_repro_prepa' => 'nullable|max:1',
            'cuales_mate_repro' => 'nullable|max:150',
            'materias_deficiencia' => 'nullable|max:150',
            'materias_complejas' => 'nullable|max:150',
            'necesario_habitos_estudio' => 'nullable|max:2',
            'prestigio_eleccion' => 'nullable|max:2',
            'compara_itq' => 'nullable|max:2',
            'motivos_estudios_itq' => 'nullable|max:150',
            'contribucion_prof_itq' => 'nullable|max:2',
            'ofertar_otras_carreras' => 'nullable|max:150',
            'habitos_suficientes' => 'nullable|max:2',

        ]);

        try {
            // Crear la ficha
            FichasAdmision::create($validated);
            
            return redirect()
                ->route('fichas_admision.index')
                ->with('success', 'Ficha de admisión creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear la ficha: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FichasAdmision $fichas_admision)
    {
        return view('fichas_admision.show', compact('fichas_admision'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FichasAdmision $fichas_admision)
    {
        return view('fichas_admision.edit', compact('fichas_admision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FichasAdmision $fichas_admision)
    {
        // Validar los datos
        $validated = $request->validate([
            'periodo' => 'required|max:5',
            'folio_solicitud' => 'required|integer',
            'carrera' => 'nullable|max:100',
            'reticula' => 'nullable|integer',
            'ficha' => 'required|integer',
            'curp' => 'nullable|max:18',
            'apellidos_aspirante' => 'nullable|max:100',
            'nombre_aspirante' => 'nullable|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|max:1',
            'estado_civil' => 'nullable|max:1',
            'tipo_escuela' => 'nullable|integer',
            'clave_escuela' => 'nullable|integer',
            'escuela_procedencia' => 'nullable|max:100',
            'promedio_bachillerato' => 'nullable|numeric|between:0,100',
            'anio_termino_bachillerato' => 'nullable|integer|digits:4',
            'entidad_federativa_proc' => 'nullable|max:50',

            // CAMPOS ADICIONALES (NULLABLE)

            'calle' => 'nullable|max:40',
            'colonia' => 'nullable|max:40',
            'ciudad' => 'nullable|max:50',
            'municipio' => 'nullable|max:100',
            'entidad_federativa' => 'nullable|max:50',
            'codigo_postal' => 'nullable|integer',
            'telefono' => 'nullable|max:30',
            'correo_electronico' => 'nullable|email|max:60',
            'fecha_hora_atencion' => 'nullable|date',
            'estatus_admision' => 'nullable|max:2',
            'comunidad_indigena' => 'nullable|max:100',
            'lengua_indigena' => 'nullable|max:100',
            'nacionalidad' => 'nullable|max:3',
            'intentos_ingreso' => 'nullable|integer',
            'area_formacion' => 'nullable|max:3',
            'especifica_formacion' => 'nullable|max:60',
            'periodos_realizacion_bach' => 'nullable|integer',
            'otros_periodos' => 'nullable|max:60',
            'orientacion_profesional' => 'nullable|max:2',
            'estudios_otra_institucion' => 'nullable|max:1',
            'cual_estudios' => 'nullable|max:100',
            'estudios_carrera' => 'nullable|max:100',
            'convencido_carrera_sol' => 'nullable|max:2',
            'interes_otra_carrera' => 'nullable|max:1',
            'cual_otra_carrera' => 'nullable|max:3',
            'tiene_mate_repro_prepa' => 'nullable|max:1',
            'cuales_mate_repro' => 'nullable|max:150',
            'materias_deficiencia' => 'nullable|max:150',
            'materias_complejas' => 'nullable|max:150',
            'necesario_habitos_estudio' => 'nullable|max:2',
            'prestigio_eleccion' => 'nullable|max:2',
            'compara_itq' => 'nullable|max:2',
            'motivos_estudios_itq' => 'nullable|max:150',
            'contribucion_prof_itq' => 'nullable|max:2',
            'ofertar_otras_carreras' => 'nullable|max:150',
            'habitos_suficientes' => 'nullable|max:2',

        ]);

        try {
            // Actualizar la ficha
            $fichas_admision->update($validated);
            
            return redirect()
                ->route('fichas_admision.index')
                ->with('success', 'Ficha de admisión actualizada exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al actualizar la ficha: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FichasAdmision $fichas_admision)
    {
        try {
            $fichas_admision->delete();
            
            return redirect()
                ->route('fichas_admision.index')
                ->with('success', 'Ficha de admisión eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Error al eliminar la ficha: ' . $e->getMessage());
        }
    }
}
