@extends('plantilla.admin')

@section('titulo', 'Vista de Categoría: '.$cat->nombre)

@section('contenido')

<div id="apicategory">
    <form>
        @csrf

        <span style="display: none;" id="editar">{{ $editar }}</span>
        <span style="display: none;" id="nombretemp">{{ $cat->nombre }}</span>
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
                        <input v-model="nombre" @blur="getCategory" @focus="div_aparecer=true" id="nombre"
                            class="form-control" type="text" name="nombre" readonly>

                        <label class="pt-3" for="slug">Slug</label>
                        <input v-model="generarSlug" id="slug" class="form-control" type="text" name="slug" readonly>

                        <label class="pt-3" for="descripcion">Descripción</label>
                        <textarea id="descripcion" class="form-control" name="descripcion" rows="5" cols="30" readonly>{{$cat->descripcion}}</textarea>
                    </div>

            </div> <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('cancelar','admin.category.index') }}" class="btn btn-outline-danger">Cancelar</a>

                <a href="{{ route('admin.category.edit',$cat->slug) }}" class="btn btn-outline-info float-right">Editar Categoría</a>

            </div> <!-- /.card-footer-->
        </div> <!-- /.card -->
    </form>
</div> <!-- #.apicategory -->

@endsection
