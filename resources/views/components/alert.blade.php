@if (session('success'))
<script>
  document.addEventListener('DOMContentLoaded', () => {
    Swal.fire('Sucesso', "{{ session('success') }}", 'success');
  });
</script>
@endif

@if ($errors->any())

@php 
$mensagem = '';

foreach ($errors->all() as $error) {
    $mensagem .= $error . '<br>';
}
@endphp

<script>
  document.addEventListener('DOMContentLoaded', () => {
    Swal.fire({
      title: 'Erro',
      html: {!! json_encode($mensagem) !!}, // Garantimos a renderização do HTML com segurança
      icon: 'error'
    });
  });
</script>
@endif
