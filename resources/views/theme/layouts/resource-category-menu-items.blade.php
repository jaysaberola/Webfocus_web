
<ul class="sub-menu-container">
    @foreach($subcategories as $subcategory)
    <li class="menu-item">
        <a class="menu-link" href="{{ route('resource-category.list', $subcategory->slug)}}"><div>{{$subcategory->name}}</div></a>
        @if(count($subcategory->subcategory))
            @include('theme.layouts.resource-category-menu-items',['subcategories' => $subcategory->subcategory])
        @endif
    </li>
    @endforeach
</ul>