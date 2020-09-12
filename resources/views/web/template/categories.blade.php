@if (isset($categoria))
<div class="sb-cate sb-it">
	<h4 class="sb-title">Subcategorías</h4>
	<ul>
		@foreach ($categoria->subcategories as $subcategory)
		<li><a href="{{route('web.subcategories',['category'=>$categoria->slug,'subcategory'=>$subcategory->slug])}}">{{$subcategory->name}}</a></li>
		@endforeach
	</ul>
</div>
@else
<div class="sb-cate sb-it">
	<h4 class="sb-title">Categorías</h4>
	<ul>
		@foreach ($categories as $category)
		<li><a href="{{route('web.categories',$category->slug)}}">{{$category->name}}</a></li>
		@endforeach
	</ul>
</div>	
@endif
