@extends('layouts.app1')

@section('title', 'Nueva Ficha de Admisión')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nueva Ficha de Admisión</h4>
                </div>
                <div class="card-body">
                    
                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('fichas_admision.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <!-- Periodo -->
                            <div class="col-md-12 mb-3">
                                <label for="periodo" class="form-label">
                                    Periodo <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('periodo') is-invalid @enderror" 
                                    id="periodo" 
                                    name="periodo" 
                                    value="{{ old('periodo') }}"
                                    placeholder="Ej: 2024A"
                                    maxlength="5"
                                    required>
                                @error('periodo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Folio De Solicitud -->
                            <div class="col-md-12 mb-3">
                                <label for="folio_solicitud" class="form-label">
                                    Folio De Solicitud <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="number" 
                                    class="form-control @error('folio_solicitud') is-invalid @enderror" 
                                    id="folio_solicitud" 
                                    name="folio_solicitud" 
                                    value="{{ old('folio_solicitud') }}"
                                    placeholder="Ej: 45896"
                                    required>
                                @error('folio_solicitud')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Carrera -->
                            <div class="col-md-12 mb-3">
                                <label for="carrera" class="form-label">Carrera</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('carrera') is-invalid @enderror" 
                                    id="carrera" 
                                    name="carrera" 
                                    value="{{ old('carrera') }}"
                                    placeholder="Ej: Ing. En Informática">
                                @error('carrera')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Retícula -->
                            <div class="col-md-12 mb-3">
                                <label for="reticula" class="form-label">Retícula</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('reticula') is-invalid @enderror" 
                                    id="reticula" 
                                    name="reticula" 
                                    value="{{ old('reticula') }}"
                                    placeholder="Ej: 210">
                                @error('reticula')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ficha -->
                            <div class="col-md-12 mb-3">
                                <label for="ficha" class="form-label">
                                    Número De Ficha <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="number" 
                                    class="form-control @error('ficha') is-invalid @enderror" 
                                    id="ficha" 
                                    name="ficha" 
                                    value="{{ old('ficha') }}"
                                    placeholder="Ej: 33"
                                    required>
                                @error('ficha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Curp -->
                            <div class="col-md-12 mb-3">
                                <label for="curp" class="form-label">CURP</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('curp') is-invalid @enderror" 
                                    id="curp" 
                                    name="curp" 
                                    value="{{ old('curp') }}"
                                    placeholder="Ej: VESV650205MGRLNRA3"
                                    maxlength="18">
                                @error('curp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Apellidos Del Aspirante -->
                            <div class="col-md-12 mb-3">
                                <label for="apellidos_aspirante" class="form-label">Apellidos Del Aspirante</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('apellidos_aspirante') is-invalid @enderror" 
                                    id="apellidos_aspirante" 
                                    name="apellidos_aspirante" 
                                    value="{{ old('apellidos_aspirante') }}"
                                    placeholder="Ej: García Márquez">
                                @error('apellidos_aspirante')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nombre Del Aspirante -->
                            <div class="col-md-12 mb-3">
                                <label for="nombre_aspirante" class="form-label">Nombre Del Aspirante</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('nombre_aspirante') is-invalid @enderror" 
                                    id="nombre_aspirante" 
                                    name="nombre_aspirante" 
                                    value="{{ old('nombre_aspirante') }}"
                                    placeholder="Ej: Gabriel">
                                @error('nombre_aspirante')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Fecha De Nacimiento -->
                            <div class="col-md-12 mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha De Nacimiento</label>
                                <input 
                                    type="date" 
                                    class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                                    id="fecha_nacimiento" 
                                    name="fecha_nacimiento" 
                                    value="{{ old('fecha_nacimiento') }}">
                                @error('fecha_nacimiento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sexo -->
                            <div class="col-md-12 mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select 
                                    class="form-select @error('sexo') is-invalid @enderror" 
                                    id="sexo" 
                                    name="sexo">
                                    <option value="">Seleccione...</option>
                                    <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                                    <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                                </select>
                                @error('sexo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Estado Civil -->
                            <div class="col-md-12 mb-3">
                                <label for="estado_civil" class="form-label">Estado Civil</label>
                                <select 
                                    class="form-select @error('estado_civil') is-invalid @enderror" 
                                    id="estado_civil" 
                                    name="estado_civil">
                                    <option value="">Seleccione...</option>
                                    <option value="S" {{ old('estado_civil') == 'S' ? 'selected' : '' }}>Soltero/a</option>
                                    <option value="C" {{ old('estado_civil') == 'C' ? 'selected' : '' }}>Casado/a</option>
                                    <option value="D" {{ old('estado_civil') == 'D' ? 'selected' : '' }}>Divorciado/a</option>
                                    <option value="V" {{ old('estado_civil') == 'V' ? 'selected' : '' }}>Viudo/a</option>
                                </select>
                                @error('estado_civil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tipo De Escuela -->
                            <div class="col-md-12 mb-3">
                                <label for="tipo_escuela" class="form-label">Tipo De Escuela</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('tipo_escuela') is-invalid @enderror" 
                                    id="tipo_escuela" 
                                    name="tipo_escuela" 
                                    value="{{ old('tipo_escuela') }}"
                                    placeholder="Ej: 1">
                                @error('tipo_escuela')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Clave De La Escuela -->
                            <div class="col-md-12 mb-3">
                                <label for="clave_escuela" class="form-label">Clave De La Escuela</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('clave_escuela') is-invalid @enderror" 
                                    id="clave_escuela" 
                                    name="clave_escuela" 
                                    value="{{ old('clave_escuela') }}"
                                    placeholder="Ej: 12345">
                                @error('clave_escuela')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Escuela De Procedencia -->
                            <div class="col-md-12 mb-3">
                                <label for="escuela_procedencia" class="form-label">Escuela De Procedencia</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('escuela_procedencia') is-invalid @enderror" 
                                    id="escuela_procedencia" 
                                    name="escuela_procedencia" 
                                    value="{{ old('escuela_procedencia') }}"
                                    placeholder="Ej: Instituto Tecnológico De Huetamo">
                                @error('escuela_procedencia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Promedio Del Bachillerato -->
                            <div class="col-md-12 mb-3">
                                <label for="promedio_bachillerato" class="form-label">Promedio Del Bachillerato</label>
                                <input 
                                    type="number" 
                                    step="0.01"
                                    class="form-control @error('promedio_bachillerato') is-invalid @enderror" 
                                    id="promedio_bachillerato" 
                                    name="promedio_bachillerato" 
                                    value="{{ old('promedio_bachillerato') }}"
                                    placeholder="Ej: 95.50">
                                @error('promedio_bachillerato')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Año De Terminación Del Bachillerato -->
                            <div class="col-md-12 mb-3">
                                <label for="anio_termino_bachillerato" class="form-label">Año De Terminación Del Bachillerato</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('anio_termino_bachillerato') is-invalid @enderror" 
                                    id="anio_termino_bachillerato" 
                                    name="anio_termino_bachillerato" 
                                    value="{{ old('anio_termino_bachillerato') }}"
                                    placeholder="Ej: 2023">
                                @error('anio_termino_bachillerato')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Entidad Federativa De Procedencia-->
                            <div class="col-md-12 mb-3">
                                <label for="entidad_federativa_proc" class="form-label">Entidad Federativa De Procedencia</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('entidad_federativa_proc') is-invalid @enderror" 
                                    id="entidad_federativa_proc" 
                                    name="entidad_federativa_proc" 
                                    value="{{ old('entidad_federativa_proc') }}"
                                    placeholder="Ej: Puebla">
                                @error('entidad_federativa_proc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('fichas_admision.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar Ficha de Admisión
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
