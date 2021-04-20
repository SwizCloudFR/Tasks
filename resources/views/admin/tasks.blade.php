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

      @include('flash-message')

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ __('home.tasks') }}</h3>
              <div class="card-tools">
                <form action="{{ route('admin.tasks.create') }}" method="get">
                  <button type="submit" class="btn btn-success btn-sm">Créer</button>
                </form>
              </div>
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
                            <td><a href="{{ route('admin.tasks.view.edit', $task->id) }}">{{ $task->name }}</a></td>
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
