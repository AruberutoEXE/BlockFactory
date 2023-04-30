<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">

            {{ Form::label('Tipo') }}
            {{ Form::text('tipo', $categoria->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
            
        </div>

    </div>
    <div class="box-footer mt20 p-2">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>