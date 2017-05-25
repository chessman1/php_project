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

    {!! Form::open(array('route' => 'category.store','method'=>'POST')) !!}

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                {!! Form::text('category', null, array('placeholder' => 'Category','class' => 'form-control', 'autofocus' => 'autofocus')) !!}
                <strong>Parent Category:</strong> 
                
                    <select name="category_id" class="form-control">

                        <option value="0">Без категория</option>
                    @foreach($categories as $ctg)
                        <option value="{{ $ctg->id }}">{{ $ctg->category }}</option>
                    @endforeach
                    </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection