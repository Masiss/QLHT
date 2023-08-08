<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::query()
            ->where('child_id', auth('child')->user()->id)
            ->orderBy('is_complete')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('child.assignment.index', [
            'assignments' => $assignments
        ]);
    }

    public function update(int $id)
    {
        DB::beginTransaction();
        try {
            if (Assignment::query()
                ->where('id', $id)
                ->where('child_id', auth('child')->user()->id)
                ->first()) {

                Assignment::query()
                    ->where('id', $id)
                    ->update([
                        'is_complete' => true
                    ]);
                DB::commit();
                return back();
            } else {
                DB::rollBack();
                return redirect()->route('logout');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return back();
        }
    }
}
