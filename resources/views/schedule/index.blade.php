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
                        <i class="bi bi-calendar-check me-2"></i>{{$count}} Agendamentos para hoje
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
                                <th>Ordem</th>
                                <th>Nome</th>
                                <th>Serviço</th>
                                <th>Contato</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $schedules as $schedule)
                            <tr>
                                <td>{{$schedule['queue_number']}}</td>
                                <td>{{$schedule['patient_name']}}</td>
                                <td>{{$schedule['service']}}</td>
                                <td>{{$schedule['contact']}}</td>
                                <td>{{$schedule['status']}}</td>
                                <td>
                                    <a href="#" class="btn btn-success">
                                        Concluir
                                    </a>
                                    <a href="#" class="btn btn-primary">
                                        Editar
                                    </a>
                                    <a href="#" class="btn btn-danger">
                                        Excluir
                                    </a>
                                </td>
                                
                            </tr>
                                {{-- @dump($schedule['patient_name']) --}}
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