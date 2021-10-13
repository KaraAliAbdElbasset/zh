<?php

namespace App\Http\Controllers;

use App\Contracts\GroupContract;
use App\Contracts\StudentContract;
use App\Http\Requests\StudentRequest;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * @var StudentContract
     */
    protected $student;
    protected $group;


    /**
     * StudentController constructor.
     * @param StudentContract $student
     * @param GroupContract $group
     */
    public function __construct(StudentContract $student, GroupContract $group)
    {
        $this->student = $student;
        $this->group = $group;
    }


    public function index(Request $request)
    {
        $students = $this->student->findByFilter();
        $groups = $this->group->findByFilter(50);

        if ($request->has('group') && $request->input('group') !=='all' )
        {
            $g = Group::with('teacher')->find($request->input('group'));
            return view('students.index',compact('students','groups','g'));
        }

        return view('students.index',compact('students','groups'));
    }

    public function create()
    {
        $groups = $this->group->findByFilter(0);
        return view('students.create', compact('groups'));
    }

    /**
     * @param StudentRequest $request
     * @return RedirectResponse
     */
    public function store(StudentRequest $request): RedirectResponse
    {
        $this->student->add($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('students.index');
    }

    public function show($id)
    {
        $s = $this->student->findOneById($id);
        return view('students.show',compact('s'));
    }


    public function edit($id)
    {
        $groups = $this->group->findByFilter(0);
        $s = $this->student->findOneById($id);
        return view('students.edit',compact('s', 'groups'));
    }

    /**
     * @param $id
     * @param StudentRequest $request
     * @return RedirectResponse
     */
    public function update($id,StudentRequest $request): RedirectResponse
    {
        $this->student->update($id,$request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('students.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->student->delete($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('students.index');
    }
}
