<div class="searh-form">
    <h4 class="sb-title">Buscar</h4>
    {!! Form::open(['route'=> 'web.search','method'=> 'GET','class'=>'form-style-1']) !!}
        <div class="row">
            <div class="col-md-12 form-it">
                <label>Todo lo que necesites en un solo lugar</label>
                {!! Form::text('search', null, ['placeholder'=>'Ingrese palabras claves']) !!}
            </div>
            <div class="col-md-12 ">
                <input class="submit" type="submit" value="Buscar">
            </div>
        </div>
    {!! Form::close() !!}
</div>