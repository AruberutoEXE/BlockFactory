<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">

            {{ Form::label('Tipo categoria') }}
            {{ Form::select('categoria', array('Color' => 'Color', 'Grande' => 'Grande')) }};

        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>