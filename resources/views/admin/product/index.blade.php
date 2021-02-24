@extends('plantilla.admin')

@section('titulo', 'Administración de Productos')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

<div id="confirmareliminar" class="row">

    <span style="display: none;" id="urlbase">{{ route('admin.product.index') }}</span>

    @include('custom.modal_eliminar')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><em>Tabla | Productos</em></h3>
                <div class="card-tools">

                    <form>
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="nombre" class="form-control float-right" placeholder="Buscar" value="{{request()->get('nombre')}}">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">

                <a class="btn btn-warning m-3 float-right" href="{{ route('admin.product.create') }}" data-toggle="tooltip" title="Crear nuevo Producto">Agregar <i class="fas fa-plus-circle"></i></a>

                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Descripción</th>
                            <th>Fecha creación</th>
                            <th>Fecha modificación</th>
                            <th class="text-center" colspan="3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{$producto->id}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->slug}}</td>
                                <td>{{$producto->descripcion_larga}}</td>
                                <td>{{$producto->created_at}}</td>
                                <td>{{$producto->updated_at}}</td>

                                <td><a class="btn btn-outline-success" href="{{ route('admin.product.show', $producto->slug) }}" data-toggle="tooltip" title="Ver Producto"><i class="fas fa-eye"></i></a></td>

                                <td><a class="btn btn-outline-info" href="{{ route('admin.product.edit', $producto->slug) }}" data-toggle="tooltip" title="Editar Producto"><i class="fas fa-edit"></i></a></td>

                                <td><a class="btn btn-danger" href="{{ route('admin.product.index') }}" v-on:click.prevent="deseas_eliminar({{$producto->id}})"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center my-2">
                    {{ $productos->appends($_GET)->links() }}
                </div>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div> <!-- /.row -->

@endsection
