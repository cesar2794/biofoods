@extends('plantilla.admin')

@section('titulo', 'Editar Categoría')

@section('contenido')

<div id="apicategory">
    <form action="{{route('admin.category.update',$cat->id)}}" method="POST">
        @csrf
        @method('PUT')

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
                            class="form-control" type="text" name="nombre">

                        <label class="pt-3" for="slug">Slug</label>
                        <input readonly v-model="generarSlug" id="slug" class="form-control" type="text" name="slug">
                        <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                            @{{ div_mensaje_slug }}
                        </div>

                        <br v-if="div_aparecer">
                        <label class="pt-3" for="descripcion">Descripción</label>
                        <textarea id="descripcion" class="form-control" name="descripcion" rows="5" cols="30">{{$cat->descripcion}}</textarea>
                    </div>

            </div> <!-- /.card-body -->
            <div class="card-footer">
                        <input :disabled="deshabilitar_boton==1" type="submit" value="Guardar"
                            class="btn btn-primary float-right">
            </div> <!-- /.card-footer-->
        </div> <!-- /.card -->
    </form>
</div> <!-- #.apicategory -->

@endsection
