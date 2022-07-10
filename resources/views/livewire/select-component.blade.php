<div>
        <div class="row mb-3">
            <label for="nombre_estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>
            <div class="col-md-6">
                    <select required class="form-select" wire:model="estado" name="nombre_estado" id="estado" aria-label="Default select example">
                    <option value="">Seleccione un estado</option>
                    @foreach ($estados as $estado)
                        <option value="{{$estado['id']}}">{{$estado['nombre']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nombre_municipio" class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>
            <div class="col-md-6">
                    <select required class="form-select" wire:model="municipio" name="nombre_municipio" id="municipio" aria-label="Default select example">
                    @if ($municipios->count() == 0)
                        <option value="">Antes debe seleccionar un estado</option>
                    @endif
                    @foreach ($municipios as $municipio)
                        <option value="{{$municipio['id']}}">{{$municipio['nombre']}}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
        <div class="row mb-3">
        <label for="nombre_parroquia" class="col-md-4 col-form-label text-md-end">{{ __('Parroquia') }}</label>
            <div class="col-md-6">
                    <select required class="form-select" wire:model="parroquia" name="nombre_parroquia" id="parroquia" aria-label="Default select example">
                    @if ($municipios->count() == 0)
                        <option value="">Antes debe seleccionar un estado</option>
                    @endif
                    @if ($parroquias->count() == 0)
                        <option value="">Antes debe seleccionar un municipio</option>
                    @endif
                    @foreach ($parroquias as $parroquia)
                        <option value="{{$parroquia['id']}}" class="parroquia">{{$parroquia['nombre']}}</option>
                    @endforeach
                </select>
            </div>
        </div> 
    
</div>
