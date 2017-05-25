@extends('layouts.app')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Items CRUD</h2>
            </div>
            <div class="pull-right">
             <a class="btn btn-primary" href="/logout">Logout</a>
                <a class="btn btn-success" href="{{ route('authorCRUD.create') }}"> Create New Author</a>
                <a class="btn btn-success" href="{{ route('bookCRUD.create') }}"> Create New Book</a>
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

   <ul>
    @foreach($categories as $category)
         <li>
        {{ $category->category }}
        @include('categoryTree', ['categories' => $category->subcategory])
        </li>           
    @endforeach
   </ul>

@endsection