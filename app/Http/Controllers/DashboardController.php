<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $homeworks = Homework::orderBy('id', 'DESC')->paginate(15);
        return view('dashboard', [
            'homeworks' => $homeworks
        ]);
    }
}
