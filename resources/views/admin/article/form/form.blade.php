
{!! Form::hidden('user_id', auth()->user()->id) !!}
<div class="from-group">
    {!! Form::label('title','Titulo') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="from-group">
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="from-group">
    {!! Form::label('slug','Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control']) !!}
</div>

<div class="from-group">
    {!! Form::label('descriptionH','Información:') !!}
    {!! Form::textarea('descriptionH', null, ['class'=>'form-control']) !!}
</div>

<div class="from-group">
    {!! Form::label('Content','Contenido:') !!}
    {!! Form::textarea('Content', null, ['class'=>'form-control']) !!}
</div>
<div class="from-group">
    {!! Form::label('Requirements','Requisitos:') !!}
    {!! Form::textarea('Requirements', null, ['class'=>'form-control']) !!}
</div>
<div class="from-group">
    {!! Form::label('Instructions','Instrucciones:') !!}
    {!! Form::textarea('Instructions', null, ['class'=>'form-control']) !!}
</div>
<div class="from-group">
    {!! Form::label('cover','¿Este artículo se verá en el carrusel principal?') !!}
    {!! Form::checkbox('cover', null) !!}<br>
</div>
<div class="from-group">
    {!! Form::label('image','Imagen de producto:') !!} <br>
    {!! Form::file('image') !!}
    <small class="form-text text-muted">
        Solo archivos de imágenes de dimensiones 270x414 px.
    </small>
</div>
<div class="form-group">
    {!! Form::label('tags', 'Etiquetas') !!}
    <div>
        @foreach ($tags as $tag)
            <label> 
                {!! Form::checkbox('tags[]', $tag->id) !!} {{$tag->name}}   
            </label>
        @endforeach
    </div>
</div>
<br>
@section('scripts')
    <script src="{{asset('vendor/srtingToSlug/jquery.stringToSlug.min.js')}}"></script>
    {!! Html::script('vendor/ckeditor/ckeditor.js') !!}
    <script>
        $(document).ready(function(){
            $("#name, #slug"). stringToSlug({
                callback: function(text){
                    $("#slug").val(text);
                }
            });
        });
        
        CKEDITOR.replace('descriptionH');
        CKEDITOR.replace('Content');
        CKEDITOR.replace('Requirements');
        CKEDITOR.replace('Instructions');
    </script>
@endsection    
