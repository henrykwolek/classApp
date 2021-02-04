<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Models\User;

class HomeworkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('homeworks.index');
    }

    public function store(Request $request)
    {
        $now = time();
        $dateDifference = strtotime(implode($request->only('termin'))) - $now;
        $dateDiffToInsert = intval(round($dateDifference / (60 * 60 * 24)));

        // if ($dateDiffToInsert < 0) {
        //     return back()->with('danger', 'Nie można dodać zadania z takim terminem wykonania!');
        // }

        $inputs = $request->validate([
            'przedmiot' => 'required',
            'tytul' => 'required',
            'termin' => 'required',
            'tresc' => 'required'
        ]);

        auth()->user()->homeworks()->create($inputs);
        return redirect()->route('dashboard')->with('success', 'Dodano pomyślnie zadanie');
    }
}
