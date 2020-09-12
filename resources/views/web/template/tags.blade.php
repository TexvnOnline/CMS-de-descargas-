<div class="sb-tags sb-it">
        <h4 class="sb-title">Etiquetas:</h4>
        <ul class="tag-items">
             @foreach ($tags as $tag)
                <li><a href="{{ route('web.tag',$tag->slug)}}">{{$tag->name}}</a></li>
            @endforeach
        </ul>
</div>


        