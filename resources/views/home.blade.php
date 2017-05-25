@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a class="btn btn-primary" href="/logout">Logout</a>

        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('authorCRUD.create') }}"> Create New Author</a>
                <a class="btn btn-success" href="{{ route('bookCRUD.create') }}"> Create New Book</a>
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
            </div>
        </div>
    </div>


</div>
@endsection
