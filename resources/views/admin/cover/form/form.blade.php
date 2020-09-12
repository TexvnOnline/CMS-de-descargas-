
<div class="from-group">
    {!! Form::label('urlpublicidad','Enlace de publicidad') !!}
    {!! Form::text('urlpublicidad', null, ['class'=>'form-control']) !!}
</div>
<div class="from-group">
    {!! Form::label('image','Imagen de publicidad:') !!}
    {!! Form::file('image') !!}
    <small class="form-text text-muted">
        Solo archivos de imágenes de dimensiones 175x50 px.
    </small>
</div>