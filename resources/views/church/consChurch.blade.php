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

    {{--@shield('church.cadastrar')--}}
    <a href="{{ route('church.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
    {{--@endshield--}}
    <br><br>
    <table class="table table-striped">
        <tr>
            <th>@sortablelink('igreja','Igreja')</th>
            <th width="100px">Ações</th>
        </tr>
        @foreach ($churches as $church)
            <tr>
                <td>{{ $church->igreja }}</td>
                <td>
                    {{--@shield('church.editar')--}}
                    <a class = "btn btn-sm btn-default" href="{{ route('church.edit',$church->id)}}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{--@endshield--}}
                    <button type="button" title="EXCLUIR" class="btn btn-sm btn-default" data-toggle="modal" data-target="#excluir{{ $church->id }}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>

                    <!-- Modal EXCLUIR-->
                    <div class="modal fade" id="excluir{{$church->id}}" tabindex="-1" role="dialog" aria-labelledby="excluir">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Deseja excluir?</h4>
                                </div>
                                <div class="modal-body">
                                    <div align="center">
                                        <b>{{ $church->igreja }}</b>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::open(['route'=> ['church.destroy',$church->id], 'method'=>'DELETE']) !!}
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
    {!! $churches->appends(\Request::except('page'))->render() !!}

@endsection