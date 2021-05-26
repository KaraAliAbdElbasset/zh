<?php

namespace App\Http\Controllers;

use App\Contracts\GroupContract;
use App\Contracts\TeacherContract;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
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

    public function create(TeacherContract $teacher)
    {
        $teachers = $teacher->findByFilter(-1);
        return view('groups.create',compact('teachers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:200',
            'teacher_id'    => 'required|integer|exists:teachers,id',
            'type'    => 'required|integer|in:'.implode(',',config('student.types')),
            'study_place'          => 'sometimes|nullable|string|max:200',
        ]);
        $this->group->add($data);
        session()->flash('success',__('messages.create'));
        return redirect()->route('groups.index');
    }

    public function show($id)
    {
        $group = $this->group->findOneById($id,['students','teacher','absences']);
        //Todo: add some logic here
        return view('groups.show',compact('group'));
    }

    public function addStudents($id)
    {
        $group = $this->group->findOneById($id,['teacher:id,first_name,last_name','students']);
        $students = Student::whereNotIn('id',$group->students->pluck('id'))->where('type',$group->type)->get();
        return view('groups.students.add',compact('group','students'));
    }

    public function studentsAttach($id,Request $request)
    {
        $request->validate([
            'students' => 'required|array',
            'students.*' => 'required|integer',
        ]);
        $group = $this->group->findOneById($id);
        $group->students()->attach($request->get('students'));
        session()->flash('success',__('messages.create'));
        return redirect()->route('groups.show',$id);
    }

    public function detachStudent($id,$student_id)
    {
        $group = $this->group->findOneById($id);
        $group->students()->detach([$student_id]);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('groups.show',$id);
    }

    public function edit($id,TeacherContract $teacher)
    {
        $group = $this->group->findOneById($id,['teacher:id,first_name,last_name']);
        $teachers = $teacher->findByFilter();
        return view('groups.edit',compact('group','teachers'));
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

    /**
     * @param $id
     * @param $student_id
     * @param Request $request
     * @return RedirectResponse
     */
    public function addAbsenceForStudent($id,$student_id,Request $request): RedirectResponse
    {
        $this->group->findOneById($id);
        $s = Student::whereHas('groups',function ($q) use ($id){
            $q->where('id',$id);
        })->where('id',$student_id)->firstOrFail();

        $s->absences()->create([
            'group_id' => $id,
        ]);
        return redirect()->back();
    }

    /**
     * @param $id
     * @param $teacher_id
     * @param Request $request
     * @return RedirectResponse
     */
    public function addAbsenceForTeacher($id,$teacher_id,Request $request): RedirectResponse
    {
        $g = $this->group->findOneById($id);

        $t = Teacher::whereHas('groups',function ($q) use ($id){
            $q->where('id',$id);
        })->where('id',$teacher_id)->firstOrFail();

        $t->absences()->create([
            'group_id' => $id
        ]);

        return redirect()->back();
    }

}
