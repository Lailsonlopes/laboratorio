@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ isset($registro_treinamento) ? 'Editar' : 'Novo' }} Registro de Treinamento</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/registro_treinamento">Registro de Treinamento</a></li>
            <li class="breadcrumb-item active">{{ isset($registro_treinamento) ? 'Editar' : 'Novo' }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row card">
            <div class="col card-body">
                
@if($errors->any())
     <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">×</span>
        </button>
            
        @foreach($errors->all() as $error)
         {{ $error }}<br/>
        @endforeach
        </div>
         @endif               


  <form action="/registro_treinamento/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($registro_treinamento){{$registro_treinamento->id}}@endisset">
    
    <div class="row">
    <div class="col-4">
    <div class="form-group">
      <label for="titulo" class="form-label">Título:</label>
      <input type="text" name="titulo" class="form-control titulo" value="@if(isset($registro_treinamento) && $registro_treinamento){{$registro_treinamento->titulo}}@else{{old("titulo")}}@endif">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="carga_horaria" class="form-label">Carga Horária:</label>
                <input type="number" name="carga_horaria" class="form-control carga_horaria" value="@if(isset($registro_treinamento) && $registro_treinamento){{$registro_treinamento->carga_horaria}}@else{{old("carga_horaria")}}@endif">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="data" class="form-label">Data:</label>
                <input type="date" name="data" class="form-control data" value="@if(isset($registro_treinamento) && $registro_treinamento){{$registro_treinamento->data}}@else{{old("data")}}@endif">
            </div>
            </div>
            </div>
        <div class="row">
          <div class="col-12">
          <div class="form-group">
          <label for="conteudo">Conteúdo:</label>
          <textarea class="form-control" name="conteudo" id="conteudo" rows="3" required> @if(isset($registro_treinamento)){{$registro_treinamento->conteudo}}@else{{ old('conteudo')}}@endif</textarea>
              </div>
               </div>
              </div>
    <div class="row">
      <div class="col" align="end">
          <br>
          <button type="submit" class="btn btn-success w-25 hover-shadow">
                Salvar 
          <i class="fas fa-save"></i>
      </button>
        </div>
        </div>
      </form>
    </div>
    </div>
            
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    
    @include('layout.footer')