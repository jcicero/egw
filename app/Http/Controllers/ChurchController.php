<?php

namespace App\Http\Controllers;

use App\Model\Church;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    private $church;

    public function __construct(Church $church)
    {
        $this->church = $church;
    }
    public function index()
    {
        $churches =  Church::sortable()->paginate(10);
        $title = 'Cadastro de Igrejas';

        return view('church.consChurch', compact('title', 'churches'));
    }

    public function create()
    {
        $title = 'Cadastro de Igrejas';

        return view('church.cadChurch', compact('title'));
    }

    public function store(Request $request)
    {
        $dataForm = $request->all();
        $insert = $this->church->create($dataForm);

        if ($insert)
            return redirect()->route('church.index');
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
        $churches = Church::find($id);
        $title = "Editar Cadastro de Igreja: $churches->igreja";

        return view('church.cadChurch', compact('title', 'churches'));
    }

    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $churches = Church::find($id);
        $update = $churches->update($dataForm);

        if ($update)
            return redirect()->route('church.index', $id);
        else
            return redirect()->route('church.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function destroy($id)
    {
        $churches = Church::find($id);

        $delete = $churches->delete();

        if ($delete)
            return redirect()->route('church.index');
        else
            return redirect()->route('church.index')->with(['errors' => 'Falha ao editar']);
    }
}
