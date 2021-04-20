@extends('adminlte::page')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@endsection

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('home.tasks') }} #{{ $task->id }}</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-12">

        <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Détails</h5>
                                <li class="list-group-item"><b>{{ __('task.created') }}</b> {{ $task->created_at }}</li>
                                <li class="list-group-item"><b>{{ __('task.category') }}:</b>  
                                  @if ($task->category == 'maintenance')
                                      <span class="badge badge-warning">{{ __('task.task.maintenance') }}</span>
                                  @elseif ($task->category == 'upgrade')
                                      <span class="badge badge-success">{{ __('task.task.upgrade') }}</span>
                                  @elseif ($task->category == 'info')
                                      <span class="badge badge-primary">{{ __('task.task.info') }}</span>
                                  @elseif ($task->category == 'down')
                                      <span class="badge badge-danger">{{ __('task.task.down') }}</span>
                                  @else
                                      <span class="badge badge-danger">error</span>
                                  @endif
                                </li>
                                <li class="list-group-item"><b>{{ __('task.status') }}:</b>  
                                  @if ($task->status == 'in_progress')
                                      <span class="badge badge-primary">{{ __('task.task.progress.in_progress') }}</span>
                                  @elseif ($task->status == 'terminate')
                                      <span class="badge badge-success">{{ __('task.task.progress.terminate') }}</span>
                                  @else
                                      <span class="badge badge-danger">error</span>
                                  @endif
                                </li>
                                <br />
                                {{ __('task.progress') }} ({{ $task->progress }}%)
                                <div class="progress progress-xs progress-striped">
                                    <div class="progress-bar bg-info" role="progressbar" data-toggle="tooltip" title="100%" style="width: {{ $task->progress }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header"><h5>{{ $task->name }}</h5></div>
                                <div class="card-body">
                                    <p>{!! nl2br($task->message) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
    </div>
</div>
@endsection

@section('js')
    <script></script>
@endsection
