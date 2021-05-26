<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{

    public function show($id)
    {
        $a = Absence::with('absenceable')->findOrFail($id);
        return view('groups.absences.show',compact('a'));
    }

    public function edit($id)
    {
        $a = Absence::findOrFail($id);
        return view('groups.absences.edit',compact('a'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'reason' => 'sometimes|nullable|string|max:200'
        ]);
        $a = Absence::findOrFail($id);
        $a->update($data);
        session()->flash('success',__('messages.update'));
        return redirect()->route('groups.show',$a->group_id);
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        Absence::destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->back();
    }
}
