<?php

namespace App\Http\Controllers;

use App\Contracts\GroupContract;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    /**
     * @var GroupContract
     */
    protected $group;

    /**
     * GroupController constructor.
     * @param GroupContract $group
     */
    public function __construct(GroupContract $group)
    {
        $this->group = $group;
    }

    public function index()
    {
        $groups = $this->group->findByFilter(10,['teacher:id,first_name,last_name']);
        return view('groups.index',compact('groups'));
    }

    public function create()
    {
        return view('groups.create');

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:200',
            'teacher_id'    => 'required|integer|exists:teachers,id',
            'study_place'          => 'sometimes|nullable|string|max:200',
        ]);
        $this->group->add($data);
        session()->flash('success',__('messages.create'));
        return redirect()->route('groups.index');
    }

    public function show($id)
    {
        $group = $this->group->findOneById($id);
        //Todo: add some logic here
        return view('groups.show',compact('group'));
    }

    public function edit($id)
    {
        $group = $this->group->findOneById($id);
        return view('groups.edit',compact('group'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:200',
            'teacher_id'    => 'required|integer|exists:teachers,id',
            'study_place'          => 'sometimes|nullable|string|max:200',
        ]);
        $this->group->update($id,$data);
        session()->flash('success',__('messages.update'));
        return redirect()->route('groups.index');
    }

    public function destroy($id){
        $this->group->delete($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('groups.index');
    }
}
