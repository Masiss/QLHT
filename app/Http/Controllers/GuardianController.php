<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Child;
use App\Models\Point;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuardianController extends Controller
{

    public function index()
    {
        return view('guardian.index');
    }


    public function addChild(Request $request)
    {
        $child = $request->only([
            'id',
            'name',
            'email'
        ]);
        DB::beginTransaction();
        try {
            Child::query()
                ->where('id', $child['id'])
                ->where('name', $child['name'])
                ->where('email', $child['email'])
                ->update(['parent_id' => 1]);
            DB::commit();
            return view('guardian.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back();
        }
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parent $parent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parent $parent)
    {
        //
    }
}
