@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bookCRUD.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0) 
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'bookCRUD.store','method'=>'POST', 'files' => 'true')) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Book','class' => 'form-control', 'autofocus' => 'autofocus')) !!}
                <strong>AuthorID:</strong>
                {!! Form::select('author_id', App\Author::pluck('author', 'id')->toArray(), null,
                ['class' => 'form-control']) !!}
                <strong>Category:</strong>
                {!! Form::select('categories[]', App\Category::pluck('category', 'id')->toArray(), null,
                ['class' => 'form-control', 'multiple' => 'multiple']) !!}
                <strong>Upload image:</strong>
                {!! Form::file('pic',null,['class'=>'form-control', 'enctype' =>
                'multipart/form-data']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection