@extends('layouts.default')


@section('content')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
            <x-alert/>

                {{-- <!-- Exibir todos os erros -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <div class="card-header">
                    <div class="card-title">Quick Example</div>
                </div>
                <!--end::Header-->

                <!--begin::Form-->
                <form action="{{ route('schedule.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Token de segurança para formulários em Laravel -->

                    <!--begin::Body-->
                    <div class="card-body">
                        <!-- Nome do Paciente -->
                        <div class="mb-3">
                            <label for="patientName" class="form-label">Nome do Paciente</label>
                            <input type="text" class="form-control" id="patientName" name="patient_name"
                                placeholder="Digite o nome completo" value="{{ old('patient_name') }}" required />
                            @error('patient_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Documento (CPF ou RG) -->
                        <div class="mb-3">
                            <label for="patientDocument" class="form-label">Documento (CPF ou RG)</label>
                            <input type="text" class="form-control" id="patientDocument" name="document"
                                placeholder="Digite o documento (opcional)" value="{{ old('document') }}" />
                            @error('document')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contato -->
                        <div class="mb-3">
                            <label for="patientContact" class="form-label">Contato</label>
                            <input type="tel" class="form-control" id="patientContact" name="contact"
                                placeholder="Digite o telefone ou e-mail" value="{{ old('contact') }}" />
                            @error('contact')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Serviços -->
                        <div class="mb-3">
                            <label for="services" class="form-label">Serviço</label>
                            <input type="text" class="form-control" id="services" name="service"
                                placeholder="Serviço a ser prestado" value="{{ old('service') }}" />
                            @error('service')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Data da Consulta -->
                        <div class="mb-3">
                            <label for="appointmentDate" class="form-label">Data da Consulta</label>
                            <input type="date" class="form-control" id="appointmentDate" name="appointment_date"
                                value="{{ old('appointment_date') }}" required />
                            @error('appointment_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Observações -->
                        <div class="mb-3">
                            <label for="patientNotes" class="form-label">Observações</label>
                            <textarea class="form-control" id="patientNotes" name="notes" rows="3"
                                placeholder="Insira observações adicionais (opcional)">{{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Upload de Documento (opcional) -->
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="patientFile" name="patient_file" />
                            <label class="input-group-text" for="patientFile">Anexar Documento</label>
                            @error('patient_file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Check de Confirmação -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="termsCheck" name="terms_check"
                                {{ old('terms_check') ? 'checked' : '' }} required />
                            <label class="form-check-label" for="termsCheck">
                                Confirmo que as informações estão corretas
                            </label>
                            @error('terms_check')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--end::Body-->

                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Agendar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Quick Example-->
        </div>


        {{-- <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/inputmask.min.js"></script> --}}
        <script>

          // Inputmask("(99) 99999-9999").mask(document.getElementById("patientContact"));
          // Inputmask("999.999.999-99").mask(document.getElementById("patientDocument"));

        </script>
        <!--end::Quick Example-->
        <!--begin::Input Group-->
        {{-- <div class="card card-success card-outline mb-4">
      <!--begin::Header-->
      <div class="card-header"><div class="card-title">Input Group</div></div>
      <!--end::Header-->
      <!--begin::Body-->
      <div class="card-body">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input
            type="text"
            class="form-control"
            placeholder="Username"
            aria-label="Username"
            aria-describedby="basic-addon1"
          />
        </div>
        <div class="input-group mb-3">
          <input
            type="text"
            class="form-control"
            placeholder="Recipient's username"
            aria-label="Recipient's username"
            aria-describedby="basic-addon2"
          />
          <span class="input-group-text" id="basic-addon2">@example.com</span>
        </div>
        <div class="mb-3">
          <label for="basic-url" class="form-label">Your vanity URL</label>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon3"
              >https://example.com/users/</span
            >
            <input
              type="text"
              class="form-control"
              id="basic-url"
              aria-describedby="basic-addon3 basic-addon4"
            />
          </div>
          <div class="form-text" id="basic-addon4">
            Example help text goes outside the input group.
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">$</span>
          <input
            type="text"
            class="form-control"
            aria-label="Amount (to the nearest dollar)"
          />
          <span class="input-group-text">.00</span>
        </div>
        <div class="input-group mb-3">
          <input
            type="text"
            class="form-control"
            placeholder="Username"
            aria-label="Username"
          />
          <span class="input-group-text">@</span>
          <input
            type="text"
            class="form-control"
            placeholder="Server"
            aria-label="Server"
          />
        </div>
        <div class="input-group">
          <span class="input-group-text">With textarea</span>
          <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>
      </div>
      <!--end::Body-->
      <!--begin::Footer-->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
      <!--end::Footer-->
    </div>
    <!--end::Input Group-->
    <!--begin::Horizontal Form-->
    <div class="card card-warning card-outline mb-4">
      <!--begin::Header-->
      <div class="card-header"><div class="card-title">Horizontal Form</div></div>
      <!--end::Header-->
      <!--begin::Form-->
      <form>
        <!--begin::Body-->
        <div class="card-body">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" />
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" />
            </div>
          </div>
          <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gridRadios"
                  id="gridRadios1"
                  value="option1"
                  checked
                />
                <label class="form-check-label" for="gridRadios1"> First radio </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gridRadios"
                  id="gridRadios2"
                  value="option2"
                />
                <label class="form-check-label" for="gridRadios2"> Second radio </label>
              </div>
              <div class="form-check disabled">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gridRadios"
                  id="gridRadios3"
                  value="option3"
                  disabled
                />
                <label class="form-check-label" for="gridRadios3">
                  Third disabled radio
                </label>
              </div>
            </div>
          </fieldset>
          <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck1" />
                <label class="form-check-label" for="gridCheck1">
                  Example checkbox
                </label>
              </div>
            </div>
          </div>
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer">
          <button type="submit" class="btn btn-warning">Sign in</button>
          <button type="submit" class="btn float-end">Cancel</button>
        </div>
        <!--end::Footer-->
      </form>
      <!--end::Form-->
    </div> --}}
        <!--end::Horizontal Form-->
    </div>



@endsection
