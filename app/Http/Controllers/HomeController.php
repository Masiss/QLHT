<?php

namespace App\Http\Controllers;


use App\Models\Child;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function signing(Request $request)
    {
        try {
            $cres = $request->only([
                'email',
                'password',
            ]);
            $save = $request->saveLogin ? true : false;
            $role = $request->role;
            if ($role == 0) {
                if (auth('guardian')->attempt($cres, $save)) {
                    $guardian = Guardian::query()
                        ->where('email', $cres['email'])
                        ->first();
                    auth('guardian')->login($guardian, $save);
                    return redirect()->route('guardian.index');
                }
            } elseif ($role == 1) {
                if (auth('child')->attempt($cres, $save)) {
                    $child = Child::query()
                        ->where('email', $cres['email'])
                        ->first();
                    auth('child')->login($child, $save);
                    return redirect()->route('child.index');
                }
            }
            return back();
        } catch (\Exception $exception) {
            return back();
        }

    }

    public function signup()
    {
        return view('signup');
    }

    public function registering(Request $request)
    {
        $user = $request->only([
            'name',
            'email',
            'password',
        ]);
        DB::beginTransaction();
        try {
            if ($request->role == 0) {
                Guardian::query()
                    ->create($user);

            } else if ($request->role == 1) {
                Child::query()
                    ->create($user);
            }
            DB::commit();
            return redirect()->route('index');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
            return back();
        }
    }

    public function logout(Request $request)
    {
        auth('guardian')->logout();
        auth('child')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        Session::flush();
        return redirect()->route('index');
    }
}
