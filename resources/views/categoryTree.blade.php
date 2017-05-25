<ul>
@foreach($categories as $ctg)
        <li>
        {{ $ctg->category }}
        @include('categoryTree', ['categories' => $ctg->subcategory])
        </li>                   
@endforeach
</ul>