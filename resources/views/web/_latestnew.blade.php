@if (!is_null($cover))
<div class="latestnew">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-8">
                <div class="ads">
                    <a href="{{$cover->urlpublicidad}}">
                        <img src="{!!asset($cover->imagepublicidad)!!}" alt="" width="728" height="106">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
