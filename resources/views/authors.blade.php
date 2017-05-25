@extends('layouts.app')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
         <a class="btn btn-primary" href="/logout">Logout</a>
            <div class="pull-right">
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

    <table class="table table-bordered">
        <tr>
            <th>Author Name</th>
        </tr>
        
    @foreach ($authors as $author)
    <tr>
        <td>{{ $author->author }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('authorCRUD.edit',$author->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['authorCRUD.destroy', $author->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $authors->render() !!}

@endsection