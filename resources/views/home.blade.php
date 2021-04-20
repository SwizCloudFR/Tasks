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

        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-angle-double-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Améliorations</span>
                <span class="info-box-number">{{ $upgradecount }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-scroll"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Informations</span>
                <span class="info-box-number">{{ $infocount }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tools"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Maintenances</span>
                <span class="info-box-number">{{ $maintenancecount }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-car-crash"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Incidents</span>
                <span class="info-box-number">{{ $downcount }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ __('home.tasks') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>{{ __('home.title') }}</th>
                            <th>{{ __('home.type') }}</th>
                            <th>{{ __('home.node') }}</th>
                            <th>{{ __('home.status') }}</th>
                            <th>{{ __('home.date') }}</th>
                            <th>{{ __('home.progress') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td><a href="{{ route('tasks', $task->id) }}">{{ $task->name }}</a></td>
                            <td>
                                @if ($task->category == 'maintenance')
                                    <span class="badge badge-warning">{{ __('home.task.maintenance') }}</span>
                                @elseif ($task->category == 'upgrade')
                                    <span class="badge badge-success">{{ __('home.task.upgrade') }}</span>
                                @elseif ($task->category == 'info')
                                    <span class="badge badge-primary">{{ __('home.task.info') }}</span>
                                @elseif ($task->category == 'down')
                                    <span class="badge badge-danger">{{ __('home.task.down') }}</span>
                                @else
                                    <span class="badge badge-danger">error</span>
                                @endif
                            </td>
                            <td>{{ $task->node }}</td>
                            <td>  
                                @if ($task->status == 'in_progress')
                                    <span class="badge badge-primary">{{ __('home.task.progress.in_progress') }}</span>
                                @elseif ($task->status == 'terminate')
                                    <span class="badge badge-success">{{ __('home.task.progress.terminate') }}</span>
                                @else
                                    <span class="badge badge-danger">error</span>
                                @endif
                            </td>
                            <td>{{ $task->created_at }}</td>
                            <td>
                                {{ __('home.progress') }} ({{ $task->progress }}%)
                                <div class="progress progress-xs progress-striped">
                                    <div class="progress-bar bg-info" role="progressbar" data-toggle="tooltip" title="100%" style="width: {{ $task->progress }}%"></div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script></script>
@endsection
