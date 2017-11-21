<?php

namespace App\Http\Controllers;

use App\Model\Church;
use App\Model\Member;
use App\Model\Status;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function index()
    {
        $members =  Member::sortable()->paginate(10);
        $title = 'Cadastro de Membros';

        return view('member.consMember', compact('title', 'members'));
    }

    public function create()
    {
        $title = 'Cadastro de Membros';
        $statuses = Status::all();
        $churches = Church::all();

        return view('member.cadMember', compact('title','statuses','churches'));
    }

    public function store(Request $request)
    {
        $dataForm = $request->all();
        $insert = $this->member->create($dataForm);

        if ($insert)
            return redirect()->route('member.index');
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
        $members = Member::find($id);
        $title = "Editar Cadastro de Membro: $members->nome";

        return view('member.cadMember', compact('title', 'members'));
    }

    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $members = Member::find($id);
        $update = $members->update($dataForm);

        if ($update)
            return redirect()->route('member.index', $id);
        else
            return redirect()->route('member.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function destroy($id)
    {
        $members = Member::find($id);

        $delete = $members->delete();

        if ($delete)
            return redirect()->route('member.index');
        else
            return redirect()->route('member.index')->with(['errors' => 'Falha ao editar']);
    }
}
