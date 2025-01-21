<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id(); // Identificador único da consulta
            $table->string('patient_name'); // Nome do paciente
            $table->string('document')->nullable(); // Documento do paciente (CPF, RG, etc.), pode ser opcional
            $table->date('appointment_date'); // Data da consulta
            $table->integer('queue_number'); // Número na fila para a data especificada
            $table->string('status')->default('Pendente'); // Status da consulta (Pendente, Concluída, Cancelada)
            $table->string('contact')->nullable(); // Contato do paciente (telefone ou e-mail)
            $table->text('notes')->nullable(); // Observações adicionais
            $table->timestamps(); // Campos created_at e updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule');
    }
};
