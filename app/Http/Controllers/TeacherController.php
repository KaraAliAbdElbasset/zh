<?php

namespace App\Http\Controllers;

use App\Contracts\TeacherContract;
use App\Http\Requests\TeacherRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * @var TeacherContract
     */
    protected $teacher;

    /**
     * StudentController constructor.
     * @param TeacherContract $teacher
     */
    public function __construct(TeacherContract $teacher)
    {
        $this->teacher = $teacher;
    }


    public function index()
    {
        $teachers = $this->teacher->findByFilter();
        return view('teachers.index',compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    /**
     * @param TeacherRequest $request
     * @return RedirectResponse
     */
    public function store(TeacherRequest $request): RedirectResponse
    {
        $this->teacher->add($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('teachers.index');
    }

    public function show($id)
    {
        $t = $this->teacher->findOneById($id);
        return view('teachers.show',compact('t'));
    }


    public function edit($id)
    {
        $t = $this->teacher->findOneById($id);
        return view('teachers.edit',compact('t'));
    }

    /**
     * @param $id
     * @param TeacherRequest $request
     * @return RedirectResponse
     */
    public function update($id,TeacherRequest $request): RedirectResponse
    {
        $this->teacher->update($id,$request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('teachers.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->teacher->delete($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('teachers.index');
    }


    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function storePayment($id, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'month' => 'required|date',
            'amount' => 'required|integer',
        ]);

        if ($this->teacher->addPayment($id, $data))
        {
            session()->flash('success',__('messages.create'));
            return back();
        }else{
            session()->flash('success',__('messages.payment-exists'));
            return back();
        }
    }

    /**
     * @param $id
     * @param $payment_id
     * @return RedirectResponse
     */
    public function destroyPayment($id, $payment_id): RedirectResponse
    {
        $this->teacher->deletePayment($id, $payment_id);
        session()->flash('success',__('messages.create'));
        return back();
    }

}
