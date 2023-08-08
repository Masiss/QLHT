<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Guardian;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{

    public function index()
    {
        return view('child.index');
    }


    public function create()
    {
        return view('child.create');
    }

    public function store(Request $request)
    {
        $guardian = $request->only([
            'name',
            'email'
        ]);
        DB::beginTransaction();
        try {
            $check_exist = Guardian::query()
                ->where('name', $guardian['name'])
                ->where('email', $guardian['email'])
                ->first();
            if ($check_exist) {
                Child::query()
                    ->where('id', auth('child')->user()->id)
                    ->update([
                        'guardian_id'
                    ]);
            }
            return redirect()->route('child.index');
        } catch (\Exception $exception) {
            return back();
        }
    }

}
