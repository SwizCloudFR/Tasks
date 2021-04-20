@extends('adminlte::page')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@endsection

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('home.tasks') }}</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-12">

        <form action="{{ route('admin.tasks.edit') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $task->id }}">

        <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Détails</h5>
                                <li class="list-group-item"><b>{{ __('task.created') }}</b> <input class="form-control" type="text" name="date" value="{{ date('Y-m-d') }}"></li>
                                <li class="list-group-item"><b>{{ __('task.category') }}:</b>
                                  <select name="category" class="form-control">
                                    <option value="maintenance">Maintenance</option>
                                    <option value="info">Informations</option>
                                    <option value="upgrade">Amélioration</option>
                                    <option value="down">Incident</option>
                                  </select>
                                </li>
                                <li class="list-group-item"><b>{{ __('task.status') }}:</b>
                                  <select name="status" class="form-control">
                                    <option value="in_progress">En cours</option>
                                    <option value="terminate">Terminé</option>
                                  </select>
                                </li>
                                <li class="list-group-item">
                                  <b>Node</b>
                                  <input type="text" name="node" class="form-control" value="{{ $task->node }}">
                                </li>
                                <li class="list-group-item">
                                  <b>Progression</b>
                                  <input type="text" name="progress" class="form-control" value="{{ $task->progress }}">
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header"><h5>
                                  <label>Nom</label>
                                  <input type="text" name="name" class="form-control" value="{{ $task->name }}">
                                </h5></div>
                                <div class="card-body">
                                  <label>Message</label>
                                  <textarea style="height: 250px; width: 100%" name="message" class="form-control">{{ $task->message }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script></script>
@endsection
