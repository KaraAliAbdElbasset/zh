<?php

namespace App\Http\Controllers;

use App\Contracts\StudentContract;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    /**
     * @var StudentContract
     */
    protected $student;

    /**
     * StudentController constructor.
     * @param StudentContract $student
     */
    public function __construct(StudentContract $student)
    {
        $this->student = $student;
    }


    public function index()
    {
        $students = $this->student->findByFilter();
        return view('students.index',compact('students'));
    }

    public function create()
    {
        return view('students.create');
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
        $s = $this->student->findOneById($id);
        return view('students.edit',compact('s'));
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
