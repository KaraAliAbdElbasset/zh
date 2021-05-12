<?php

namespace App\Http\Controllers;

use App\Contracts\FuneralContract;
use App\Http\Requests\FuneralRequest;
use Illuminate\Http\RedirectResponse;

class FuneralController extends Controller
{
    /**
     * FuneralContract instance
     * @var
     */
    protected $f;

    public function __construct(FuneralContract $funeralContract)
    {
        $this->f = $funeralContract;
    }

    public function index()
    {
        $funerals = $this->f->findByFilter();
        return view('funerals.index',compact('funerals'));
    }

    public function create()
    {
        return view('funerals.create');
    }

    /**
     * @param FuneralRequest $request
     * @return RedirectResponse
     */
    public function store(FuneralRequest $request): RedirectResponse
    {
        $this->f->add($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('funerals.index');
    }

    public function show($id)
    {
        $f = $this->f->findOneById($id);
        return view('funerals.show',compact('f'));
    }

    public function edit($id)
    {
        $f = $this->f->findOneById($id);
        return view('funerals.edit',compact('f'));
    }

    /**
     * @param $id
     * @param FuneralRequest $request
     * @return RedirectResponse
     */
    public function update($id,FuneralRequest $request): RedirectResponse
    {
        $this->f->update($id,$request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('funerals.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->f->delete($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('funerals.index');
    }
}
