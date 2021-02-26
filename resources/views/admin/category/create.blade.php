@extends('plantilla.admin')

@section('titulo', 'Crear Categoría')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categorías</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

<div id="apicategory">
    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestión</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
            </div> <!-- /.card-header -->
            <div class="card-body">
                    <div class="form-group">
                        <label class="pt-3" for="nombre">Nombre</label>
                        <input v-model="nombre" @blur="getCategory" @focus="div_aparecer=false" id="nombre"
                            class="form-control" type="text" name="nombre">

                        <label class="pt-3" for="slug">Slug</label>
                        <input readonly v-model="generarSlugC" id="slug" class="form-control" type="text" name="slug">
                        <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                            @{{ div_mensaje_slug }}
                        </div>

                        <br v-if="div_aparecer">
                        <label class="pt-3" for="descripcion">Descripción</label>
                        <textarea id="descripcion" class="form-control" name="descripcion" rows="5" cols="30"></textarea>
                    </div>

            </div> <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('cancelar','admin.category.index') }}" class="btn btn-outline-danger">Cancelar</a>
                <input :disabled="deshabilitar_boton==1" type="submit" value="Guardar" class="btn btn-primary float-right">
            </div> <!-- /.card-footer-->
        </div> <!-- /.card -->
    </form>
</div> <!-- #.apicategory -->

@endsection
