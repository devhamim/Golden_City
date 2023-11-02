<?php

namespace App\Http\Controllers;

use App\Models\VateSet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VateSetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin_vate_set()
    {
        $vatesets = VateSet::all();
        return view('admin.vatSet.index', [
            'vatesets'=>$vatesets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function admin_vate_set_add(Request $request)
    {

        $vateSet = VateSet::first();

        if ($vateSet === null) {
            $request->validate([
                'vate_set' => 'required',
                'fee' => 'required',
            ]);

            VateSet::create([
                'vate_set' => $request->vate_set,
                'fee' => $request->fee,
                'created_at' => now(),
            ]);

            return back()->with('success', 'Vate Set Added');
        }
        else {
            $vateSet->update([
                'vate_set' => $request->vate_set,
                'fee' => $request->fee,
            ]);

            return back()->with('success', 'Vate Set Updated');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
