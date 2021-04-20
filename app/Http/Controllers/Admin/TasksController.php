<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->tasks = DB::table('tasks')->get();

        $this->upgradecount = DB::table('tasks')->where('category', 'upgrade')->count();
        $this->maintenancecount = DB::table('tasks')->where('category', 'maintenance')->count();
        $this->downcount = DB::table('tasks')->where('category', 'down')->count();
        $this->infocount = DB::table('tasks')->where('category', 'info')->count();

        return view('admin.tasks', 
            [
                'tasks' => $this->tasks,
                'upgradecount' => $this->upgradecount,
                'maintenancecount' => $this->maintenancecount,
                'infocount' => $this->infocount,
                'downcount' => $this->downcount
            ]
        );
    }

    public function edit(Request $request)
    {
        DB::table('tasks')
            ->where('id', $request->id)
            ->update(['name' => $request->name, 'message' => $request->message, 'node' => $request->node, 'created_at' => $request->date, 'category' => $request->category, 'status' => $request->status, 'progress' => $request->progress]);
        return redirect('/admin/tasks')->with('success', 'Task was successful !');
    }

    public function createindex()
    {
        return view('admin.tasks.create');
    }

    public function create(Request $request)
    {
        
        DB::table('tasks')->insert([
            'name' => $request->name,
            'message' => $request->message,
            'category' => $request->category,
            'node' => $request->node,
            'progress' => $request->progress,
            'created_by' => 'undefined',
            'created_at' => $request->date,
            'status' => $request->status
        ]);
        return redirect('/admin/tasks')->with('success', 'Task was successful !');
    }
}
