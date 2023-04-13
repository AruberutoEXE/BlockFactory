<div class="box box-info padding-1">
    <div class="box-body">
        
     

        <div class="form-group">
            {{ Form::label('_categoria') }}
            {{ Form::select('categoria_id', $categorias , $producto->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione la categoria']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {{ Form::label('precio') }}
            {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $producto->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
       
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>