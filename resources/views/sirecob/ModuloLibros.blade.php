@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">

			<div class="col-5">
				<div class="card">
					<div class="text-center">
						<a href="/Registro_libros">
						<img src="img/menu/books.png" alt="" style=" width: 140px;height: 140px;">
						<h5 class="text-success"><b>Registro Libros</b></h5>
					</a>
					</div>
				</div>
			</div>
		<div class="col-5">
			<div class="card">
					<div class="text-center">
						<a href="/prestamo">
						<img src="img/menu/prestamo.png" alt="" style=" width: 140px;height: 140px;">
						<h5 class="text-success"><b>Prestamo de Libros</b></h5>
					</a>
					</div>
				</div>
		</div>


	</div>
</div>	
	

@endsection
