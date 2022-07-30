@if (!is_null($cover2))
<div class="ads">
    <a href="{{$cover2->urlpublicidad}}">
        <img src="{!!asset($cover2->imagepublicidad)!!}" alt="">
    </a>
</div>
@endif