<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">

            {{ Form::label('Nombre') }}
            {{ Form::select('categoria', array('Escultura' => 'Escultura', 'Edificio' => 'Edificio', 'Persona' => 'Persona','Animal' => 'Animal')) }};

        </div>

    </div>
    <div class="box-footer mt20 p-2">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>