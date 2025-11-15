@extends('layouts.app1')

@section('title', 'Fichas de Admisión')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h2>FICHAS DE ADMISIÓN</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('fichas_admision.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva Ficha De Admisión
            </a>
        </div>
    </div>

    <!-- Mensajes de éxito/error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($fichas_admision->count() > 0)
        <!-- TABLA Y BOTONES LADO A LADO -->
        <div class="row">
            <!-- TABLA (ocupa 10 columnas) -->
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Carrera</th>
                                        <th>Ficha</th>
                                        <th>CURP</th> 
                                        <th>Nombre Del Aspirante</th>
                                        <th>Fecha De Nacimiento</th>
                                        <th>Sexo</th>
                                        <th>Promedio Del Bachillerato</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fichas_admision as $ficha)
                                        <tr id="row-{{ $ficha->id }}" class="selectable-row">
                                            <td>{{ $ficha->carrera }}</td>
                                            <td>{{ $ficha->ficha }}</td>
                                            <td>{{ $ficha->curp }}</td>
                                            <td>{{ $ficha->nombre_aspirante }}</td>
                                            <td>{{ $ficha->fecha_nacimiento ? \Carbon\Carbon::parse($ficha->fecha_nacimiento)->format('d/m/Y') : '' }}</td>
                                            <td>{{ $ficha->sexo }}</td>
                                            <td>{{ $ficha->promedio_bachillerato }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PANEL DE BOTONES AL LADO (ocupa 2 columnas) -->
            <div class="col-lg-2">
                <div class="card sticky-top" style="top: 20px;">
                    <div class="card-header bg-dark text-white">
                        <h6 class="mb-0">
                            <i class="bi bi-tools"></i> Acciones
                        </h6>
                    </div>
                    <div class="card-body">
                        <!-- Información de ficha seleccionada -->
                        <div class="alert alert-info mb-3" id="selection-info" style="display: none;">
                            <strong>Ficha Seleccionada:</strong><br>
                            <span id="selected-ficha" class="fs-5 text-primary"></span>
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-grid gap-1">
                            <a href="#" id="btn-ver" class="btn btn-info" disabled>
                                <i class="bi bi-eye"></i> Ver
                            </a>
                            <a href="#" id="btn-editar" class="btn btn-warning" disabled>
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <button type="button" class="btn btn-danger" id="btn-eliminar" disabled>
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                            <button type="button" class="btn btn-secondary" id="btn-deseleccionar" style="display: none;">
                                <i class="bi bi-x-circle"></i> Deseleccionar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> No hay fichas de admisión registradas.
            <a href="{{ route('fichas_admision.create') }}">Crear la primera</a>
        </div>
    @endif
</div>

<!-- CSS adicional -->
<style>

    /* Fuente*/
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f0f9ff;  /* ← Fondo azul claro */
    }
    
    /* COLORES */
    :root {
        --color-turquesa: #00b4d8;
        --color-turquesa-oscuro: #0096c7;
        --color-turquesa-claro: #48cae4;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #00b4d8 0%, #0096c7 100%) !important;
        border: none !important;
        color: white !important;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #0096c7 0%, #0077b6 100%) !important;
    }
    
    .table-dark {
        background: linear-gradient(135deg, #00b4d8 0%, #0096c7 100%) !important;
    }
    
    .bg-dark {
        background: linear-gradient(135deg, #00b4d8 0%, #0096c7 100%) !important;
    }
    
    .text-primary, .alert-info {
        color: #0096c7 !important;
    }
    
    .badge.bg-primary {
        background: #00b4d8 !important;
    }

    /* Eestilos (minimos) */

    .selectable-row {
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .selectable-row:hover {
        background-color: #f8f9fa !important;
        transform: scale(1.01);
    }
    
    .selectable-row.table-active {
        background-color: #cfe2ff !important;
        border-left: 4px solid #0d6efd;
    }

    .sticky-top {
        position: sticky;
        z-index: 1020;
    }

    .btn:disabled {
        cursor: not-allowed;
        opacity: 0.5;
    }
    
    /* ===================================
   Centrar la tabla
=================================== */
/* Centrar TODO */
.modern-table tbody td,
.modern-table thead th {
    text-align: center;
}
</style>

<!-- JavaScript para maneja de selección -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('.selectable-row');
    const selectionInfo = document.getElementById('selection-info');
    const selectedFicha = document.getElementById('selected-ficha');
    const btnVer = document.getElementById('btn-ver');
    const btnEditar = document.getElementById('btn-editar');
    const btnEliminar = document.getElementById('btn-eliminar');
    const btnDeseleccionar = document.getElementById('btn-deseleccionar');

    let currentSelectedRow = null;

    // Evento click en las filas
    rows.forEach(row => {
        row.addEventListener('click', function() {
            // Si es la misma fila, deseleccionar
            if (currentSelectedRow === this) {
                this.classList.remove('table-active');
                currentSelectedRow = null;
                
                // Deshabilitar botones
                btnVer.classList.add('disabled');
                btnVer.setAttribute('disabled', 'disabled');
                btnEditar.classList.add('disabled');
                btnEditar.setAttribute('disabled', 'disabled');
                btnEliminar.setAttribute('disabled', 'disabled');
                
                // Ocultar info y botón deseleccionar
                selectionInfo.style.display = 'none';
                btnDeseleccionar.style.display = 'none';
                return;
            }

            // Remover selección anterior
            if (currentSelectedRow) {
                currentSelectedRow.classList.remove('table-active');
            }
            
            // Agregar selección actual
            this.classList.add('table-active');
            currentSelectedRow = this;
            
            // Obtener ID de la fila
            const id = this.id.replace('row-', '');
            
            // Obtener el número de ficha (columna 2)
            const fichaNumero = this.querySelector('td:nth-child(2)').textContent;
            
            // Actualizar información
            selectedFicha.textContent = `Ficha #${fichaNumero}`;
            selectionInfo.style.display = 'block';
            
            // Habilitar botones
            btnVer.classList.remove('disabled');
            btnVer.removeAttribute('disabled');
            btnEditar.classList.remove('disabled');
            btnEditar.removeAttribute('disabled');
            btnEliminar.removeAttribute('disabled');
            
            // Mostrar botón deseleccionar
            btnDeseleccionar.style.display = 'block';
            
            // Actualizar enlaces de botones
            btnVer.href = `/fichas_admision/${id}`;
            btnEditar.href = `/fichas_admision/${id}/edit`;
            
            // Configurar botón eliminar
            btnEliminar.onclick = function() {
                if (confirm('¿Está seguro de eliminar esta ficha de admisión?')) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/fichas_admision/${id}`;
                    form.innerHTML = `
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            };
        });
    });

    // Botón deseleccionar
    btnDeseleccionar.addEventListener('click', function() {
        if (currentSelectedRow) {
            currentSelectedRow.classList.remove('table-active');
            currentSelectedRow = null;
        }
        
        // Deshabilitar botones
        btnVer.classList.add('disabled');
        btnVer.setAttribute('disabled', 'disabled');
        btnEditar.classList.add('disabled');
        btnEditar.setAttribute('disabled', 'disabled');
        btnEliminar.setAttribute('disabled', 'disabled');
        
        // Ocultar info y botón deseleccionar
        selectionInfo.style.display = 'none';
        this.style.display = 'none';
    });
});
</script>
@endsection
