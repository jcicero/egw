@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h3>{{ $title }}</h3>
    </div>

    {{--@shield('unidade.cadastrar')--}}

    @if (isset($churches))
        {!! Form::model($churches, ['route' => ['church.update', $churches->id], 'class' => 'Form', 'method' => 'PUT']) !!}
{{--        {!! Form::hidden('updated_by',Auth::user()->id) !!}--}}
    @else
        {!! Form::open(['route' => 'church.store', 'class' => 'form']) !!}
{{--        {!! Form::hidden('created_by',Auth::user()->id) !!}--}}
    @endif

    <div class="form-group">
        {!! Form::label('igreja', 'Igreja:'); !!}
        {!! Form::text('igreja', null, ['class' => 'form-control', 'placeholder' => 'Igreja']) !!}<br>
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    {{--    {{ Form::button('<i class="glyphicon glyphicon-floppy-disk"> Salvar</i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}--}}
        {!! Form::close() !!}
    {{--@endshield--}}
    </div>

@endsection
