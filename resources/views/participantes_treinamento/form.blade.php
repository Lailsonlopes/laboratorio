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
            <h1 class="m-0">{{ isset($participantes_treinamento) ? 'Editar' : 'Novo' }} Participantes do Treinamento</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/participantes_treinamento">Registro de Treinamento</a></li>
            <li class="breadcrumb-item active">{{ isset($participantes_treinamento) ? 'Editar' : 'Novo' }}</li>
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


  <form action="/participantes_treinamento/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($participantes_treinamento){{$participantes_treinamento->id}}@endisset">
    
    <div class="row">
      <div class="col-2">
        <div class="form-group">
                <label for="numero" class="form-label">N°:</label>
                <input type="number" name="numero" class="form-control numero" required value="@if(isset($participantes_treinamento) && $participantes_treinamento){{$participantes_treinamento->numero}}@else{{old("numero")}}@endif">
            </div>
        </div>
        
          <div class="col-5">
            <div class="form-group">
                <label for="setor" class="form-label">Setor:</label>
                <select name="setor" id="setor" class="form-control">
                    @foreach ($setores as $key => $tipo)
                        <option class="setor" value="{{$tipo->setor}}"@if(isset($participantes_treinamentoparticipantes_treinamento) && $participantes_treinamento->setor == $tipo->setor) selected @elseif(old('setor') == $tipo->setor) selected @endif>{{$tipo->setor}}</option>
                    @endforeach
                </select>
            </div>
        </div>
          
        <div class="col-5">
        <div class="form-group">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" value="@if(isset($participantes_treinamento) && $participantes_treinamento){{$participantes_treinamento->nome}}@else{{old("nome")}}@endif">
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-12">
            <div class="form-group">
                <label for="assinatura" class="form-label">Assinatura:</label>
                <input type="text" name="assinatura" class="form-control" value="@if(isset($participantes_treinamento) && $participantes_treinamento){{$participantes_treinamento->assinatura}}@else{{old("assinatura")}}@endif">
            </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col" align="end">
            <button type="submit" class="btn btn-success w-25 hover-shadow">
                Salvar 
                <i class="fas fa-save"></i>
            </button>
        </div>
    </div>
  </form>
</div>
         
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


  

@include('layout.footer')