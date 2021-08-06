<?php

namespace App\Http\Controllers;

use App\Contracts\GroupContract;
use App\Contracts\PaymentContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    /**
     * @var PaymentContract
     */
    protected $payment;


    /**
     * PaymentController constructor.
     * @param PaymentContract $payment
     * @param GroupContract $group
     */
    public function __construct(PaymentContract $payment)
    {
        $this->payment = $payment;
    }



    public function edit($id)
    {
        Session::put('previousUrl', url()->previous());
        $p = $this->payment->findOneById($id);
        return view('payments.edit',compact('p'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id,Request $request): RedirectResponse
    {
        $data = $request->validate([
            'amount' => 'required|integer'
        ]);
        $this->payment->update($id,$data);
        session()->flash('success',__('messages.update'));
        return redirect(Session::get('previousUrl'));
    }

}
