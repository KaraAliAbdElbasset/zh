<?php

namespace App\Http\Controllers;

use App\Contracts\SewingWorkerContract;
use App\Http\Requests\SewingWorkerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SewingWorkerController extends Controller
{
    /**
     * @var SewingWorkerContract
     */
    protected $sw;

    /**
     * GeneralStatisticController constructor.
     * @param SewingWorkerContract $sw
     */
    public function __construct(SewingWorkerContract $sw)
    {
        $this->sw = $sw;
    }

    public function index()
    {
        $sewing_workers = $this->sw->findByFilter();
        return view('sewing_workers.index',compact('sewing_workers'));
    }

    public function create()
    {
        return view('sewing_workers.create');
    }

    /**
     * @param SewingWorkerRequest $request
     * @return RedirectResponse
     */
    public function store(SewingWorkerRequest $request): RedirectResponse
    {
        $this->sw->add($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('sewing-workers.index');
    }

    public function show($id)
    {
        $sw = $this->sw->findOneById($id);
        return view('sewing_workers.show',compact('sw'));
    }


    public function edit($id)
    {
        $sw = $this->sw->findOneById($id);
        return view('sewing_workers.edit',compact('sw'));
    }

    /**
     * @param $id
     * @param SewingWorkerRequest $request
     * @return RedirectResponse
     */
    public function update($id,SewingWorkerRequest $request): RedirectResponse
    {
        $this->sw->update($id,$request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('sewing-workers.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->sw->delete($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('sewing-workers.index');
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

        if ($this->sw->addPayment($id, $data))
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
        $this->sw->deletePayment($id, $payment_id);
        session()->flash('success',__('messages.create'));
        return back();
    }
}
