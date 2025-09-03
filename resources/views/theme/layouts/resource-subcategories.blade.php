@foreach($subcategories as $subcategory)
    <ul @if(isset($categorySlug) && $categorySlug == $subcategory->name) style="display:block;" @endif>
        <li class="@if(isset($categorySlug) && $categorySlug == $subcategory->name) current @endif"><a href="{{ route('resource-category.list', $subcategory->slug) }}"><div>{{$subcategory->name}}</div></a>
        @if(count($subcategory->subcategory))
            @include('theme.layouts.resource-subcategories',['subcategories' => $subcategory->subcategory])
        @endif
        </li>
    </ul>
@endforeach