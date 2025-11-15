@extends('layouts.app1')

@section('title', 'Detalles de Ficha de Admisión')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Encabezado -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>DETALLES DE FICHA DE ADMISIÓN</h2>
                <a href="{{ route('fichas_admision.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al Listado
                </a>
            </div>

            <!-- Tarjeta Principal -->
            <div class="card shadow">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="bi bi-file-text"></i> Ficha #{{ $fichas_admision->ficha }}
                    </h4>
                    <div>
                        <a href="{{ route('fichas_admision.edit', $fichas_admision->id) }}" 
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <table class="table table-bordered">
                        <tbody>
                            <!-- Periodo -->
                            <tr>
                                <th class="bg-light">Periodo</th>
                                <td>{{ $fichas_admision->periodo ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Folio De Solicitud -->
                            <tr>
                                <th class="bg-light">Folio De Solicitud</th>
                                <td>{{ $fichas_admision->folio_solicitud ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Carrera -->
                            <tr>
                                <th class="bg-light">Carrera</th>
                                <td>{{ $fichas_admision->carrera ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Retícula -->
                            <tr>
                                <th class="bg-light">Retícula</th>
                                <td>{{ $fichas_admision->reticula ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Ficha -->
                            <tr>
                                <th class="bg-light">Número De Ficha</th>
                                <td><strong class="text-primary fs-5">{{ $fichas_admision->ficha ?? 'N/A' }}</strong></td>
                            </tr>
                            
                            <!-- Curp -->
                            <tr>
                                <th class="bg-light">Curp</th>
                                <td>{{ $fichas_admision->curp ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Apellidos Del Aspirante -->
                            <tr>
                                <th class="bg-light">Apellidos Del Aspirante</th>
                                <td>{{ $fichas_admision->apellidos_aspirante ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Nombre Del Aspirante -->
                            <tr>
                                <th class="bg-light">Nombre Del Aspirante</th>
                                <td>{{ $fichas_admision->nombre_aspirante ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Fecha De Nacimiento -->
                            <tr>
                                <th class="bg-light">Fecha De Nacimiento</th>
                                <td>
                                    @if($fichas_admision->fecha_nacimiento)
                                        {{ $fichas_admision->fecha_nacimiento->format('d/m/Y') }}
                                        <small class="text-muted">({{ $fichas_admision->fecha_nacimiento->age }} Años)</small>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            
                            <!-- Sexo -->
                            <tr>
                                <th class="bg-light">Sexo</th>
                                <td>
                                    @if($fichas_admision->sexo == 'M')
                                        <span class="badge bg-primary">Masculino</span>
                                    @elseif($fichas_admision->sexo == 'F')
                                        <span class="badge" style="background-color: #ffb3d9; color: black;">Femenino</span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            
                            <!-- Estado Civil -->
                            <tr>
                                <th class="bg-light">Estado Civil</th>
                                <td>
                                    @if($fichas_admision->estado_civil == 'S')
                                        Soltero/a
                                    @elseif($fichas_admision->estado_civil == 'C')
                                        Casado/a
                                    @elseif($fichas_admision->estado_civil == 'D')
                                        Divorciado/a
                                    @elseif($fichas_admision->estado_civil == 'V')
                                        Viudo/a
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            
                            <!-- Tipo De Escuela -->
                            <tr>
                                <th class="bg-light">Tipo De Escuela</th>
                                <td>{{ $fichas_admision->tipo_escuela ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Clave De La Escuela -->
                            <tr>
                                <th class="bg-light">Clave De La Escuela</th>
                                <td>{{ $fichas_admision->clave_escuela ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Escuela De Procedencia -->
                            <tr>
                                <th class="bg-light">Escuela De Procedencia</th>
                                <td>{{ $fichas_admision->escuela_procedencia ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Promedio Del Bachillerato -->
                            <tr>
                                <th class="bg-light">Promedio Del Bachillerato</th>
                                <td>
                                    @if($fichas_admision->promedio_bachillerato)
                                        <span class="fs-4 text-success">
                                            <i class="bi bi-award-fill"></i> {{ $fichas_admision->promedio_bachillerato }}
                                        </span>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            
                            <!-- Año De Términación Del Bachillarato -->
                            <tr>
                                <th class="bg-light">Año De Terminación Del Bachillerato</th>
                                <td>{{ $fichas_admision->anio_termino_bachillerato ?? 'N/A' }}</td>
                            </tr>
                            
                            <!-- Entidad Federativa De Procedencia-->
                            <tr>
                                <th class="bg-light">Entidad Federativa De Procedencia</th>
                                <td>{{ $fichas_admision->entidad_federativa_proc ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Información del Sistema -->
                    <div class="alert alert-info mt-4">
                        <strong><i class="bi bi-info-circle"></i> Información del Sistema:</strong><br>
                        <strong>Fecha de Registro:</strong> {{ $fichas_admision->created_at->format('d/m/Y H:i:s') }} 
                        <small class="text-muted">({{ $fichas_admision->created_at->diffForHumans() }})</small><br>
                        <strong>Última Actualización:</strong> {{ $fichas_admision->updated_at->format('d/m/Y H:i:s') }} 
                        <small class="text-muted">({{ $fichas_admision->updated_at->diffForHumans() }})</small>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="d-flex gap-2 justify-content-end mt-4 pt-3 border-top">
                        <a href="{{ route('fichas_admision.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                        <a href="{{ route('fichas_admision.edit', $fichas_admision->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <form action="{{ route('fichas_admision.destroy', $fichas_admision->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('¿Está seguro de eliminar esta ficha de admisión?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
