<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Http\Requests\UserRequest;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * UserContract instance
     * @var UserContract
     */
    protected $u;

    public function __construct(UserContract $userContract)
    {
        $this->u = $userContract;
    }

    public function index()
    {
        $users = $this->u->findByFilter();
        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    /**
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $this->u->add($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $u = $this->u->findOneById($id);
        return view('users.show',compact('u'));
    }

    public function edit($id)
    {
        $u = $this->u->findOneById($id);
        return view('users.edit',compact('u'));
    }

    /**
     * @param $id
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function update($id,UserRequest $request): RedirectResponse
    {
        $this->u->update($id,$request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('users.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->u->delete($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('users.index');
    }
}
