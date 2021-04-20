<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TasksViewsController extends Controller
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

    public function views(int $id)
    {
        $this->get = DB::table('tasks')->find($id);

        return view('admin.tasks.edit', ['task' => $this->get]);
    }
}
