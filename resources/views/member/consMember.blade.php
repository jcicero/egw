@extends('layouts.app')

@section('content')

    <div align="center">
        <h3> {{ $title }} </h3>
    </div>


    @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{--@shield('member.cadastrar')--}}
    <a href="{{ route('member.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
    {{--@endshield--}}
    <br><br>
    <table class="table table-striped">
        <tr>
            <th width="50px">@sortablelink('id','#')</th>
            <th>@sortablelink('nome','Nome')</th>
            <th>@sortablelink('email','E-mail')</th>
            <th>@sortablelink('telefone','Telefone')</th>
            <th>@sortablelink('obs','Obs')</th>
            <th>@sortablelink('church_id','Igreja')</th>
            <th>@sortablelink('status_id','Status')</th>
            <th width="100px">Ações</th>
        </tr>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->nome }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->telefone }}</td>
                <td>{{ $member->obs }}</td>
                <td>{{ $member->church->igreja }}</td>
                <td>{{ $member->status->descricao }}</td>
                <td>
                    {{--@shield('member.editar')--}}
                    <a class = "btn btn-sm btn-default" href="{{ route('member.edit',$member->id)}}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{--@endshield--}}
                    <button type="button" title="EXCLUIR" class="btn btn-sm btn-default" data-toggle="modal" data-target="#excluir{{ $member->id }}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>

                    <!-- Modal EXCLUIR-->
                    <div class="modal fade" id="excluir{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="excluir">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Deseja excluir?</h4>
                                </div>
                                <div class="modal-body">
                                    <div align="center">
                                        <b>{{ $member->nome }}</b>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::open(['route'=> ['member.destroy',$member->id], 'method'=>'DELETE']) !!}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class = "btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Excluir </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </td>
            </tr>

        @endforeach
    </table>
    {!! $members->appends(\Request::except('page'))->render() !!}

@endsection