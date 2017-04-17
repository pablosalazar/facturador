
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <b>Por favor, corrige los siguientes errores: </b>
        <ul class="errors-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif