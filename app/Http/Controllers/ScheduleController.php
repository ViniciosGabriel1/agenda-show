<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index()
    {
        $dataHoje = Carbon::today()->toDateString(); 
        // dd($dataHoje);
        $schedules = Schedule::whereDate('appointment_date', $dataHoje)
        ->orderBy('appointment_date')
        ->get();
        // dd($schedules);
        return view('schedule.index', compact('schedules'));
    }
    public function create()
    {
        return view('schedule.create');
    }

    public function store(ScheduleRequest $request)
    {
        // Valida os dados recebidos
        $validatedData = $request->validated();
        $appointmentDate = $validatedData['appointment_date'];

        // Obtém o último registro do dia atual, ordenado pelo campo `queue_number`
        $lastSchedule = Schedule::whereDate('appointment_date',$appointmentDate)
            ->latest('queue_number')
            ->first();

        // Verifica se há um último registro para o dia e define o próximo número da fila
        if ($lastSchedule) {
            $validatedData['queue_number'] = $lastSchedule->queue_number + 1;
        } else {
            // Começa a fila do dia com o número 1
            $validatedData['queue_number'] = 1;
        }

        // Salva os dados no banco de dados
        Schedule::create($validatedData);


        // Redireciona para a rota de criação com uma mensagem de sucesso
        return redirect()->route('schedule.create')
            ->with('success', 'Agendamento de ' . $validatedData['patient_name'] . ' criado com sucesso!');
    }




    //
}
