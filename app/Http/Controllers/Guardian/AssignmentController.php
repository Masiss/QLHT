<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::query()
            ->whereIn('child_id', Child::query()
                ->where('guardian_id', auth('guardian')->user()->id)
                ->pluck('id'))
            ->get();
        return view('guardian.assignment.index', [
            'assignments' => $assignments
        ]);
    }

    public function create()
    {
        $children = Child::query()
            ->where('guardian_id', auth('guardian')->user()->id)
            ->get();
        return view('guardian.assignment.create', [
            'children' => $children
        ]);
    }

    public function store(Request $request)
    {
        $assignment = $request->only([
            'child_id',
            'description'
        ]);
        DB::beginTransaction();
        try {
            Assignment::query()
                ->create([
                    'child_id' => $assignment['child_id'],
                    'description' => $assignment['description'],
                    'is_complete' => false
                ]);
            DB::commit();
            return redirect()->route('guardian.assignment.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back();
        }
    }

    public function edit(int $id)
    {
        $assignment = Assignment::query()
            ->where('id', $id)
            ->first();
        $children = Child::query()
            ->where('guardian_id', auth('guardian')->user()->id)
            ->get();
        return view('guardian.assignment.edit');
    }

    public function update(Request $request, int $id)
    {
        $assignment = $request->only([
            'child_id',
            'description'
        ]);
        DB::beginTransaction();
        try {
            Assignment::query()
                ->where('id', $id)
                ->update([
                    'child_id' => $assignment['child_id'],
                    'description' => $assignment['description'],
                    'is_complete' => false
                ]);
            DB::commit();
            return redirect()->route('guardian.assignment.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back();
        }
    }

}
