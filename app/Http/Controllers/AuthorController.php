<?php

namespace App\Http\Controllers;

use App\Model\Author;
use App\Model\Status;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function index()
    {
        $authors =  Author::sortable()->paginate(10);
        $title = 'Cadastro de Autores';

        return view('author.consAuthor', compact('title', 'authors'));
    }

    public function create()
    {
        $title = 'Cadastro de Autores';
        $statuses = Status::all();

        return view('author.cadAuthor', compact('title','statuses'));
    }

    public function store(Request $request)
    {
        $dataForm = $request->all();
        $insert = $this->author->create($dataForm);

        if ($insert)
            return redirect()->route('author.index');
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
        $authors = Author::find($id);
        $title = "Editar Cadastro de Autor: $authors->nm_autor";

        return view('author.cadAuthor', compact('title', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $authors = Author::find($id);
        $update = $authors->update($dataForm);

        if ($update)
            return redirect()->route('author.index', $id);
        else
            return redirect()->route('author.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function destroy($id)
    {
        $authors = Author::find($id);

        $delete = $authors->delete();

        if ($delete)
            return redirect()->route('author.index');
        else
            return redirect()->route('author.index')->with(['errors' => 'Falha ao editar']);
    }
}
