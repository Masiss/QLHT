<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointController extends Controller
{
    public function index()
    {
        $points = Point::query()
            ->where('child_id', auth('child')->user()->id)
            ->with('subject')
            ->get();
        return view('child.point.index', [
            'points' => $points
        ]);
    }

    public function create()
    {
        $subjects = Subject::query()
            ->whereNotIn('id', Point::query()
                ->where('child_id', auth('child')->user()->id)
                ->pluck('subject_id'))
            ->get();
        return view('child.point.create', [
            'subjects' => $subjects
        ]);
    }

    public function store(Request $request)
    {
        $point = $request->only([
            'subject_id',
            'daily',
            'weekly',
            'midSem',
            'endSem'
        ]);
        $point['child_id'] = auth('child')->user()->id;
        DB::beginTransaction();
        try {
            Point::query()
                ->create($point);
            DB::commit();
            return redirect()->route('child.point.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back();
        }
    }

    public function edit(int $subject_id)
    {
        $point = Point::query()
            ->where('subject_id', $subject_id)
            ->where('child_id', auth('child')->user()->id)
            ->first();
        return view('child.point.edit', [
            'point' => $point
        ]);
    }

    public function update(Request $request, int $id)
    {
        $point = $request->only([
            'daily',
            'weekly',
            'midSem',
            'endSem',
        ]);
        DB::beginTransaction();
        try {
            Point::query()
                ->where('child_id', auth('child')->user()->id)
                ->where('subject_id', $id)
                ->update($point);
            DB::commit();
            return redirect()->route('child.point.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back();
        }
    }

}
