<?php

namespace App\Http\Controllers;

use App\Contracts\ClubContract;
use App\Http\Requests\ClubRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * @var ClubContract
     */
    protected $club;

    /**
     * ClubController constructor.
     * @param ClubContract $club
     */
    public function __construct(ClubContract $club)
    {
        $this->club = $club;
    }

    public function index()
    {
        $clubs = $this->club->findByFilter();
        return view('clubs.index',compact('clubs'));
    }

    public function create()
    {
        return view('clubs.create');
    }

    /**
     * @param ClubRequest $request
     * @return RedirectResponse
     */
    public function store(ClubRequest $request): RedirectResponse
    {
        $this->club->add($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('clubs.index');
    }

    public function show($id)
    {
        $club = $this->club->findOneById($id,['projects']);
        return view('clubs.show',compact('club'));
    }

    public function edit($id)
    {
        $club = $this->club->findOneById($id);
        return view('clubs.edit',compact('club'));
    }

    /**
     * @param $id
     * @param ClubRequest $request
     * @return RedirectResponse
     */
    public function update($id,ClubRequest $request): RedirectResponse
    {
        $this->club->update($id,$request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('clubs.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->club->delete($id);
        session()->flash('success', __('messages.delete'));
        return redirect()->route('clubs.index');
    }

    public function addInvoice($id,Request $request)
    {
        $data = $request->validate([
            'client_name' => 'required|string|max:200',
            'amount' => 'required|integer',
            'note' => 'sometimes|nullable|string|max:200',
            'date' => 'sometimes|nullable|date'
        ]);

        $this->club->addInvoice($id,$data);

        session()->flash('success', __('messages.create'));
        return redirect()->route('clubs.show',$id);
    }

    public function addProject($id,Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:200',
            'amount' => 'required|integer',
            'note' => 'sometimes|nullable|string|max:200',
            'start_date' => 'sometimes|nullable|date',
            'end_date' => 'sometimes|nullable|date|after:start_date',
        ]);

        $this->club->addProject($id,$data);

        session()->flash('success', __('messages.create'));
        return redirect()->route('clubs.show',$id);
    }

    public function addSubscription($id,Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:200',
            'amount' => 'required|integer',
            'note' => 'sometimes|nullable|string|max:200',

        ]);
        $this->club->addSub($id,$data);
        session()->flash('success', __('messages.create'));
        return redirect()->route('clubs.show',$id);
    }


}
