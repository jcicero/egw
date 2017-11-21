@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h3>{{ $title }}</h3>
    </div>

    {{--@shield('unidade.cadastrar')--}}

    @if (isset($statuses))
        {!! Form::model($statuses, ['route' => ['status.update', $statuses->id], 'class' => 'Form', 'method' => 'PUT']) !!}
{{--        {!! Form::hidden('updated_by',Auth::user()->id) !!}--}}
    @else
        {!! Form::open(['route' => 'status.store', 'class' => 'form']) !!}
{{--        {!! Form::hidden('created_by',Auth::user()->id) !!}--}}
    @endif

    <div class="form-group">
        {!! Form::label('descricao', 'Status:'); !!}
        {!! Form::text('descricao', null, ['class' => 'form-control', 'placeholder' => 'Status']) !!}<br>
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}

    {{--    {{ Form::button('<i class="glyphicon glyphicon-floppy-disk"> Salvar</i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}--}}
        {!! Form::close() !!}
    {{--@endshield--}}
    </div>

@endsection
