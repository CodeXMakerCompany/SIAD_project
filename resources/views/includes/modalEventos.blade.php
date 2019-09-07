

  <!-- Modal(Modificar agregar y eliminar) -->
<div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Crear evento</h4>
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- html comment -->
       <form action="{{ route('evento.create') }}" method="POST">
        @csrf


        <input type="hidden" id="txtId">

        
        <input type="hidden" id="txtFecha" name="txtFecha">

        <div class="form-group row">
            <label for="titular" class="col-md-2 col-form-label text-md-right">{{ __('Titulo:') }}</label>

              <div class="col-md-4">
                                
                <input id="titular" type="text" class="form-control{{ $errors->has('titular') ? ' is-invalid' : '' }}" name="titular" value="{{ old('titular') }}" required autofocus>

                                @if ($errors->has('titular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titular') }}</strong>
                                    </span>
                                @endif
              </div>

              <div class="form-group"> 
                  <label for="color" class="col-md-3">Color</label>
              </div>

              <div class="col-md-2">
                   <input type="color" value="#7A2FB8"  id="color" class="form-control" name="color" style="height: 36px;">
              </div>    
          </div>

         <div class="form-group">
          <label for="descripcion">Descripción : </label>
          <textarea name="descripcion" id="descripcion" rows="3" class="form-control"></textarea>
        </div>

        <div class="form-row">
          

          <div class="form-group col-md-4">
            <label for="hora">Hora del evento:  </label>

            <div class="input-group clockpicker" data-autoclose="true">
              <input name="hora" type="text" id="hora" value="10:30" class="form-control">
            </div>
            
          </div>

          <div class="form-group col-md-4">
            <label for="fecha_inicio">Fecha inicio:  </label>

            <div class="input-group" data-autoclose="true">
              <input name="fecha_inicio" type="text" id="fecha_inicio" class="form-control">
            </div>

            
          </div>
          <div class="form-group col-md-4">
            <label for="fecha_final">Fecha final:  </label>

            <div class="input-group" data-autoclose="true">
              <input name="fecha_final" type="text" id="fecha_final" class="form-control">
            </div>

            
          </div>
        </div>

                    <button type="submit" class="btn btn-primary">Crear evento</button> 

                
        </form>
        
        

      

      

      </div>
    </div>
  </div>
</div>


