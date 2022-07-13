@include('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Certificado de pasantias</h2>
            </div>
            <div class="col-md-4">
                <div class="mb-4 d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ URL::to('#') }}">Convertir a PDF</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>Lista de productos</caption>
                    <thead>
                      <tr>
                        <th scope="col">SKU</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descripción</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $estudiante)
                        <tr>
                            <th scope="row">{{ $producto->sku }}</th>
                            <td>{{ $estudiante->nombres }}</td>
                            <td>{{ $estudiante->apellidos }}</td>
                            <td>{{ $estudiante->cedula }}</td>
                            <td>{{ $estudiante->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection

   