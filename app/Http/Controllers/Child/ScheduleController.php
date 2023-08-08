<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    //
    public function index()
    {
        $schedules = Schedule::query()
            ->where('child_id', auth('child')->user()->id)
            ->get();
        return view('child.schedule.index', [
            'schedules' => $schedules
        ]);
    }

    public function create()
    {
        $subjects = Subject::query()
            ->get();
        return view('child.schedule.create', [
            'subjects' => $subjects
        ]);
    }

    public function store(Request $request)
    {
        $schedule = $request->only([
            'subject_id',
            'week_day',
            'shift',
        ]);
        $schedule['child_id'] = auth('child')->user()->id;

        DB::beginTransaction();
        try {
            Schedule::query()
                ->create($schedule);
            DB::commit();
            return redirect()->route('child.schedule.index');
        } catch (\Exception $exception) {
            dd($exception);
            return back();
        }
    }

    public function edit(int $id)
    {
        $schedule = Schedule::query()
            ->where('id', $id)
            ->with('subject')
            ->first();
        $subjects = Subject::query()
            ->get();
        return view('child.schedule.edit', [
            'schedule' => $schedule,
            'subjects' => $subjects,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $schedule = $request->only([
            'subject_id',
            'week_day',
            'shift',
        ]);
        $schedule['child_id'] = auth('child')->user()->id;
        DB::beginTransaction();
        try {
            Schedule::query()
                ->where('id', $id)
                ->update($schedule);
            DB::commit();
            return redirect()->route('child.schedule.index');
        } catch (\Exception $exception) {
            return back();
        }
    }

}
