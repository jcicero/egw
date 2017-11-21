@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h3>{{ $title }}</h3>
    </div>

    {{--@shield('unidade.cadastrar')--}}

    @if (isset($members))
        {!! Form::model($members, ['route' => ['member.update', $members->id], 'class' => 'Form', 'method' => 'PUT']) !!}
{{--        {!! Form::hidden('updated_by',Auth::user()->id) !!}--}}
    @else
        {!! Form::open(['route' => 'member.store', 'class' => 'form']) !!}
{{--        {!! Form::hidden('created_by',Auth::user()->id) !!}--}}
    @endif

    <div class="form-group">
        {!! Form::label('nome', 'Nome:'); !!}
        {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
        {!! Form::label('email', 'E-mail:'); !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
        {!! Form::label('telefone', 'Telefone:'); !!}
        {!! Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => 'Telefone']) !!}
        {!! Form::label('church_id', 'Igreja:'); !!}
        @if(isset($members))
            {!! Form::select('church_id',$members->church->pluck('igreja','id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione uma igreja']) !!}<br>
        @else
            {!! Form::select('church_id',$churches->pluck('igreja','id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione uma igreja']) !!}<br>
        @endif

        {!! Form::label('status_id', 'Status:'); !!}
        @if(isset($members))
            {!! Form::select('status_id',$members->status->pluck('descricao','id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione um status']) !!}<br>
        @else
            {!! Form::select('status_id',$statuses->pluck('descricao','id'), null, ['class' => 'form-control', 'placeholder' => 'Selecione um status']) !!}<br>
        @endif
        {!! Form::label('obs', 'Observações:'); !!}
        {!! Form::text('obs', null, ['class' => 'form-control', 'placeholder' => 'Observações']) !!}<br>
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    {{--    {{ Form::button('<i class="glyphicon glyphicon-floppy-disk"> Salvar</i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}--}}
        {!! Form::close() !!}
    {{--@endshield--}}
    </div>

@endsection
