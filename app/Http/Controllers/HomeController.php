<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->tasks = DB::table('tasks')->orderBy('id', 'DESC')->get();

        $this->upgradecount = DB::table('tasks')->where('category', 'upgrade')->count();
        $this->maintenancecount = DB::table('tasks')->where('category', 'maintenance')->count();
        $this->downcount = DB::table('tasks')->where('category', 'down')->count();
        $this->infocount = DB::table('tasks')->where('category', 'info')->count();

        return view('home', 
            [
                'tasks' => $this->tasks,
                'upgradecount' => $this->upgradecount,
                'maintenancecount' => $this->maintenancecount,
                'infocount' => $this->infocount,
                'downcount' => $this->downcount
            ]
        );
    }

    public function views(int $id)
    {
        $this->get = DB::table('tasks')->find($id);

        return view('task', ['task' => $this->get]);
    }
}
