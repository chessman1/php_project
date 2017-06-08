@extends('layouts.app')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
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

    <table class="table table-bordered">
        <tr>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Category</th>
            <th>Image</th>
        </tr>


     @foreach ($books as $book)
     <tr>
        <td>{{ $book->name }}</td>
        <td>{{ $book->author->author }}</td>   
        <td>
        @foreach($book->categories as $ctg)
            {{ $ctg->category }}@if(!$loop->last), @endif
        @endforeach  
        </td>
       

        <td><img src="/uploads/images/{{$book->pic}}" alt="picture" height="50" 
        width="70" /></td> 
        
        <td>
            <a class="btn btn-primary" href="{{ route('bookCRUD.edit', $book->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => 
            ['bookCRUD.destroy', $book->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

     {!! $books->render() !!}

@endsection