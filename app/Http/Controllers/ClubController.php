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

    public function createInvoice($id)
    {
        $club = $this->club->findOneById($id);
        return view('clubs.invoices.create',compact('club'));
    }

    public function editInvoice($id,$invoice_id)
    {
        $club = $this->club->findOneById($id);
        $invoice = \App\Models\Invoice::where('club_id',$id)->where('id',$invoice_id)->firstOrFail();
        return view('clubs.invoices.edit',compact('club','invoice'));
    }

    public function storeInvoice($id,Request $request)
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


    public function updateInvoice($id,$invoice_id,Request $request): RedirectResponse
    {
        $data = $request->validate([
            'client_name' => 'required|string|max:200',
            'amount' => 'required|integer',
            'note' => 'sometimes|nullable|string|max:200',
            'date' => 'sometimes|nullable|date'
        ]);

        $this->club->updateInvoice($invoice_id,$data);

        session()->flash('success', __('messages.update'));
        return redirect()->route('clubs.show',$id);
    }

    public function destroyInvoice($id,$invoice_id): RedirectResponse
    {
        $this->club->deleteInvoice($invoice_id);
        session()->flash('success', __('messages.delete'));
        return redirect()->route('clubs.show',$id);
    }

    public function createProject($id)
    {
        $club = $this->club->findOneById($id);
        return view('clubs.projects.create',compact('club'));
    }
    public function editProject($id,$project_id)
    {
        $club = $this->club->findOneById($id);
        $project = \App\Models\Project::where('club_id',$id)->where('id',$project_id)->firstOrFail();
        return view('clubs.projects.edit',compact('club','project'));
    }
    public function storeProject($id,Request $request): RedirectResponse
    {
        $data = $request->validate([
            'owner' => 'required|string|max:200',
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

    public function updateProject($id,$project_id,Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:200',
            'owner' => 'required|string|max:200',
            'amount' => 'required|integer',
            'note' => 'sometimes|nullable|string|max:200',
            'start_date' => 'sometimes|nullable|date',
            'end_date' => 'sometimes|nullable|date|after:start_date',
        ]);

        $this->club->updateProject($project_id,$data);

        session()->flash('success', __('messages.update'));
        return redirect()->route('clubs.show',$id);
    }

    public function destroyProject($id,$project_id): RedirectResponse
    {
        $this->club->deleteProject($project_id);
        session()->flash('success', __('messages.delete'));
        return redirect()->route('clubs.show',$id);
    }

    public function createSubscription($id)
    {
        $club = $this->club->findOneById($id);
        return view('clubs.subs.create',compact('club'));
    }

    public function editSubscription($id,$sub_id)
    {
        $club = $this->club->findOneById($id);
        $sub = \App\Models\Subscription::where('club_id',$id)->where('id',$sub_id)->firstOrFail();

        return view('clubs.subs.edit',compact('club','sub'));
    }


    public function storeSubscription($id,Request $request): RedirectResponse
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


    public function updateSubscription($id,$sub_id,Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:200',
            'amount' => 'required|integer',
            'note' => 'sometimes|nullable|string|max:200',

        ]);
        $this->club->updateSub($sub_id,$data);
        session()->flash('success', __('messages.update'));
        return redirect()->route('clubs.show',$id);
    }

    public function destroySubscription($id,$sub_id): RedirectResponse
    {
        $this->club->deleteSub($sub_id);
        session()->flash('success', __('messages.delete'));
        return redirect()->route('clubs.show',$id);
    }

    public function officerUpdate(Request $request,$id)
    {
        $data = $request->validate([
            'managing_office' => 'required|array',
            'managing_office.*.name' => 'required|string|max:100',
            'managing_office.*.level' => 'required|string|max:100',
        ]);

        $this->club->update($id,$data);
        return response()->json([
            'success' => true,
            'message' => __('messages.update'),
        ]);
    }

    public function goalsUpdate(Request $request,$id)
    {
        $data = $request->validate([
            'goals' => 'required|array',
            'goals.*' => 'required|string|max:200',
        ]);

        $this->club->update($id,$data);
        return response()->json([
            'success' => true,
            'message' => __('messages.update'),
        ]);
    }

}
