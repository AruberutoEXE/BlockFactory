<!--@if ( session('updateClave') )
<div class="alert alert-success" role="alert">
<strong>Felicitaciones </strong>
    {{ session('updateClave') }}
</div>
@endif-->



<!--
@if (session('updateClave'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Felicitaciones </strong>
        {{ session('updateClave') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif-->
@if (session('updateClave'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Felicitaciones </strong>
        {{ session('updateClave') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="cerrar(this)">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function cerrar(element) {
    console.log(element);
    $(element).parent().hide();
  }
</script>






@if ( session('name') )
<div class="alert alert-success" role="alert">
  <strong>Felicitaciones </strong>
    {{ session('name') }}
</div>
@endif


@if ( session('claveIncorrecta') )
  <div class="alert alert-danger" role="alert">
    <strong>Lo siento!</strong>  {{ session('claveIncorrecta') }}
  </div>
@endif


@if ( session('clavemenor') )
<div class="alert alert-warning" role="alert">
  <strong>Lo siento !</strong>
    {{ session('clavemenor') }}
</div>
@endif