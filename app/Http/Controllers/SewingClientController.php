<?php

namespace App\Http\Controllers;

use App\Contracts\SewingClientContract;
use App\Http\Requests\SewingClientRequest;
use Illuminate\Http\RedirectResponse;

class SewingClientController extends Controller
{
    /**
     * @var SewingClientContract
     */
    protected $sc;

    /**
     * GeneralStatisticController constructor.
     * @param SewingClientContract $sc
     */
    public function __construct(SewingClientContract $sc)
    {
        $this->sc = $sc;
    }

    public function index()
    {
        $sewing_clients = $this->sc->findByFilter();
        return view('sewing_clients.index',compact('sewing_clients'));
    }

    public function create()
    {
        return view('sewing_clients.create');
    }

    /**
     * @param SewingClientRequest $request
     * @return RedirectResponse
     */
    public function store(SewingClientRequest $request): RedirectResponse
    {
        $this->sc->add($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('sewing-clients.index');
    }

    public function show($id)
    {
        $sc = $this->sc->findOneById($id);
        return view('sewing_clients.show',compact('sc'));
    }


    public function edit($id)
    {
        $sc = $this->sc->findOneById($id);
        return view('sewing_clients.edit',compact('sc'));
    }

    /**
     * @param $id
     * @param SewingClientRequest $request
     * @return RedirectResponse
     */
    public function update($id,SewingClientRequest $request): RedirectResponse
    {
        $this->sc->update($id,$request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('sewing-clients.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->sc->delete($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('sewing-clients.index');
    }
}
