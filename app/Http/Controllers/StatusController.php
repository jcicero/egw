<?php

namespace App\Http\Controllers;

use App\Model\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    private $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }
    public function index()
    {
        $statuses =  Status::sortable()->paginate(10);
        $title = 'Cadastro de Status';

        return view('status.consStatus', compact('title', 'statuses'));
    }

    public function create()
    {
        $title = 'Cadastro de Status';

        return view('status.cadStatus', compact('title'));
    }

    public function store(Request $request)
    {
        $dataForm = $request->all();
        $insert = $this->status->create($dataForm);

        if ($insert)
            return redirect()->route('status.index');
        else {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $statuses = Status::find($id);
        $title = "Editar Cadastro de Status: $statuses->descricao";

        return view('status.cadStatus', compact('title', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $statuses = Status::find($id);
        $update = $statuses->update($dataForm);

        if ($update)
            return redirect()->route('status.index', $id);
        else
            return redirect()->route('status.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function destroy($id)
    {
        $statuses = Status::find($id);

        $delete = $statuses->delete();

        if ($delete)
            return redirect()->route('status.index');
        else
            return redirect()->route('status.index')->with(['errors' => 'Falha ao editar']);
    }
}
