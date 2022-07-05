@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<a href="/home" class="btn btn-primary"><b><</b></a>
	</div>
	<br>
	<div class="row">
		
			<div class="col-5">
				<div class="card">
					<div class="text-center">
						<a href="/Modulo_Estudiante">
						<img class="mt-3 mb-3 mr-3 ml-3" src="img/menu/books.png" alt="" style=" width: 140px;height: 140px;">
						<h5 class="text-success"><b>Registro Estudiante</b></h5>
					</a>
					</div>
				</div>
			</div>
		<div class="col-5">
			<div class="card">
					<div class="text-center">
						<a href="/Registro_Docente">
						<img class="mt-3 mb-3 mr-3 ml-3" src="img/menu/projects.png" alt="" style=" width: 140px;height: 140px;">
						<h5 class="text-success"><b>Registro Docente</b></h5>
						</a>
					</div>
				</div>
		</div>



	</div>
	<div class="row mt-3">
<div class="col-3"></div>
			<div class="col-5">
				<div class="card">
					<div class="text-center">
						<a href="/Modulo_libros">
						<img class="mt-3 mb-3 mr-3 ml-3" src="img/menu/register.png" alt="" style=" width: 140px;height: 140px;">
						<h5 class="text-success"><b>Registro tutores</b></h5>
						</a>
					</div>
				</div>
			</div>


	</div>
</div>

@endsection
