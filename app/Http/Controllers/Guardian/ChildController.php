<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Child;
use App\Models\Point;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::query()
            ->where('guardian_id', auth('guardian')->user()->id)
            ->get();
        return view('guardian.child.index', [
            'children' => $children
        ]);
    }

    public function create()
    {
        return view('guardian.child.create');
    }

    public function store(Request $request)
    {
        $child = $request->only([
            'id',
            'name',
            'email'
        ]);
        DB::beginTransaction();
        try {
            $check_exist = Child::query()
                ->where('id', $child['id'])
                ->where('name', $child['name'])
                ->first();
            if (!$check_exist->guardian_id) {
                Child::query()
                    ->where('id', $child['id'])
                    ->where('name', $child['name'])
                    ->where('email', $child['email'])
                    ->update(['guardian_id' => auth('guardian')->user()->id]);
                return redirect()->route('guardian.child.index');
            }
        } catch (\Exception $exception) {
            return back();
        }
    }


    public function show(int $id)
    {
        if (!Child::query()
            ->where('id', $id)
            ->where('guardian_id', auth('guardian')->user()->id)
            ->first()) {
            return redirect()->route('logout');
        }
        $child = Child::query()->where('id', $id)->first();
        $points = Point::query()->where('child_id', $id)->get();
        $schedules = Schedule::query()
            ->where('child_id', $id)
            ->orderBy('week_day')
            ->orderBy('shift')
            ->get();
        $assignments = Assignment::query()
            ->where('child_id', $id)
            ->get();
        return view('guardian.child.show', [
            'child' => $child,
            'points' => $points,
            'schedules' => $schedules,
            'assignments' => $assignments
        ]);
    }

}
