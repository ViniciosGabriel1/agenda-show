<x-alert />
@extends('layouts.default')


@section('content')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">
                        <i class="bi bi-calendar-check me-2"></i>Temos {{$totalAgendamentos}} Agendamentos para hoje 
                    </h3>
                    <a href="{{route('schedule.create')}}" class="btn btn-light btn-sm ms-auto">
                        <i class="bi bi-plus-circle me-1"></i> Novo Agendamento
                    </a >
                </div>
                
                
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Serviço</th>
                                <th>Contato</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($schedules) --}}
                            @foreach ( $schedules as $schedule)
                            <tr>
                                <td>{{$schedule['patient_name']}}</td>
                                <td>{{$schedule['service']}}</td>
                                <td>{{$schedule['contact']}}</td>
                                <td>{{$schedule['status']}}</td>
                                <td>
                                    <a href="{{ route('schedule.concluir', ['id' => $schedule['id']]) }}" class="btn btn-success">
                                        Concluir
                                    </a>
                                    <a href="{{ route('schedule.editar', ['id' => $schedule['id']]) }}" class="btn btn-primary">
                                        Editar
                                    </a>
                                    <form action="{{ route('schedule.excluir', ['id' => $schedule['id']]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

</div><!-- /.container-fluid -->



@endsection