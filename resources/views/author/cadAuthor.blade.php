@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h3>{{ $title }}</h3>
    </div>

    {{--@shield('unidade.cadastrar')--}}

    @if (isset($authors))
        {!! Form::model($authors, ['route' => ['author.update', $authors->id], 'class' => 'Form', 'method' => 'PUT']) !!}
{{--        {!! Form::hidden('updated_by',Auth::user()->id) !!}--}}
    @else
        {!! Form::open(['route' => 'author.store', 'class' => 'form']) !!}
{{--        {!! Form::hidden('created_by',Auth::user()->id) !!}--}}
    @endif

    <div class="form-group">
        {!! Form::label('nm_autor', 'Igreja:'); !!}
        {!! Form::text('nm_autor', null, ['class' => 'form-control', 'placeholder' => 'Autor']) !!}<br>
        {!! Form::label('status_id', 'Status:'); !!}
        @if(isset($authors))
            {!! Form::select('status_id',$authors->status->pluck('descricao','id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione um status']) !!}<br>
        @else
            {!! Form::select('status_id',$statuses->pluck('descricao','id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione um status']) !!}<br>
        @endif

        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    {{--    {{ Form::button('<i class="glyphicon glyphicon-floppy-disk"> Salvar</i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}--}}
        {!! Form::close() !!}
    {{--@endshield--}}
    </div>

@endsection
