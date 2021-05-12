<?php

namespace App\Http\Controllers;

use App\Contracts\GeneralStatisticContract;
use App\Http\Requests\GeneralStatisticRequest;
use Illuminate\Http\RedirectResponse;

class GeneralStatisticController extends Controller
{
    /**
     * @var GeneralStatisticContract
     */
    protected $gs;

    /**
     * GeneralStatisticController constructor.
     * @param GeneralStatisticContract $gs
     */
    public function __construct(GeneralStatisticContract $gs)
    {
        $this->gs = $gs;
    }

    public function index()
    {
        $general_statistics = $this->gs->findByFilter();
        return view('general_statistics.index',compact('general_statistics'));
    }

    public function create()
    {
        return view('general_statistics.create');
    }

    /**
     * @param GeneralStatisticRequest $request
     * @return RedirectResponse
     */
    public function store(GeneralStatisticRequest $request): RedirectResponse
    {
        $this->gs->add($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('general-statistics.index');
    }

    public function show($id)
    {
        $gs = $this->gs->findOneById($id);
        return view('general_statistics.show',compact('gs'));
    }


    public function edit($id)
    {
        $gs = $this->gs->findOneById($id);
        return view('general_statistics.edit',compact('gs'));
    }

    /**
     * @param $id
     * @param GeneralStatisticRequest $request
     * @return RedirectResponse
     */
    public function update($id,GeneralStatisticRequest $request): RedirectResponse
    {
        $this->gs->update($id,$request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('general-statistics.index');
    }

    public function destroy($id)
    {
        $this->gs->delete($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('general-statistics.index');
    }
}
