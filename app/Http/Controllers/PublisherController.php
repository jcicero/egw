<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Publisher;

class PublisherController extends Controller
{
    private $publisher;

    public function __construct(Publisher $publisher)
    {
        $this->publisher = $publisher;
    }

    public function index()
    {
        $publishers =  Publisher::sortable()->paginate(10);
        $title = 'Cadastro de Editoras';

        return view('publisher.consPublisher', compact('title', 'publishers'));
    }

    public function create()
    {
        $title = 'Cadastro de Editoras';

        return view('publisher.cadPublisher', compact('title'));
    }

    public function store(Request $request)
    {
        $dataForm = $request->all();
        $insert = $this->publisher->create($dataForm);

        if ($insert)
            return redirect()->route('publisher.index');
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
        $publishers = Publisher::find($id);
        $title = "Editar Cadastro de Editora: $publishers->editora";

        return view('publisher.cadPublisher', compact('title', 'publishers'));
    }

    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $publishers = Publisher::find($id);
        $update = $publishers->update($dataForm);

        if ($update)
            return redirect()->route('publisher.index', $id);
        else
            return redirect()->route('publisher.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function destroy($id)
    {
        $publishers = Publisher::find($id);

        $delete = $publishers->delete();

        if ($delete)
            return redirect()->route('publisher.index');
        else
            return redirect()->route('publisher.index')->with(['errors' => 'Falha ao editar']);
    }
}
