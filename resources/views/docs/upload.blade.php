@extends('layouts.app')


@section('content')

<div class="container">
    <h2 class="text-center">Seleccione El Documento</h2>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Añadir Documento al Expediente
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-white">
                
                <form action=" {{ route('users_by_field') }} " method="GET">
                    <div class="d-flex">
                        <div class="select-unefa">
                            <select id="docs" class="form-select " onchange="select()" aria-label="Default select example" name="field">
                                <option value="null"  selected>Seleccione</option>
                                <option value="1" >Ing De Sistemas</option>
                                <option value="2">Ing Eléctrica</option>
                                <option value="2">Ing Civil</option>

                            </select>  
                        </div>

                        <div class="file-box">
                            <input type="file" class="btn btn-primary hidden mt-2" required="required" id="file">
                        </div>

                    </div>

                   <input type="submit" class="btn btn-success mt-3" value="Subir Documento">

               </form>
          

            </div>
          </div>
        </div>
    
    </div>
</div>
<script>
    const selection = document.getElementById("docs");
    const file = document.getElementById("file");
    function select() {
    if(selection.options[selection.selectedIndex].value != "null"){
        file.classList.remove('hidden');
    }else{
        file.classList.add('hidden');
    }
     }
   
</script>

<style>
    .hidden{
        display:none;
    }
    .select-unefa{
        width: 50%;
        margin-right: 20px;
    }
    .file-box{
        position:relative;
        top: -10px;
    }
</style>
@endsection