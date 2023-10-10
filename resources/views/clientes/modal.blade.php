<div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
  
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Nuevo cliente</h4>
            </div>
  
            <!--Modal body-->
            <div class="modal-body">
                <form action="{{url('/ordenes/clientes')}}" method="POST" enctype="multipart/form-data">
                    @csrf  

                      <fieldset class="form-group">
                        <label class="form-label" for="name"> Persona jurídica </label> 
                        <input id="demo-sw-unchecked" name="juririco" type="checkbox">
                      </fieldset>        
                   
                      <div id="juridico" style="display:none">
                        <fieldset class="form-group">
                          <label class="form-label" for="lblrazonsocial"> Razon Social </label>
                          <input type="text" name="razonsocial" class="form-control" value="{{old('razonsocial')}}" require> 
                        </fieldset>          
                        <fieldset class="form-group">
                          <label class="form-label" for="lblidentificacion">Número RUC</label>             
                          <input type="text" name="identificacion" class="form-control" value="{{old('identificacion')}}" require> 
                        </fieldset> 
                        <fieldset class="form-group">
                          <label class="form-label" for="lblcorreo">Correo electrónico </label>
                          <input type="correo" class="form-control" name="correo" placeholder="correo electrónico" value="{{old('correo')}}">
                        </fieldset>          
                        <fieldset class="form-group">
                          <label for="lbltelefono"> Telefono / Movil </label>
                          <input type="text" name="telefono" class="form-control"  value="{{old('telefono')}}"> 
                        </fieldset>   
                        <fieldset class="form-group">
                          <label for="lblintereses">Direccion </label>
                          <textarea rows="5"  name="direccion"  class="form-control"  value="{{old('direccion')}}" ></textarea>                    
                        </fieldset>     
          
                        <h5 class="m-t-lg with-border">Informacion del contacto</h5>
              
                        <fieldset class="form-group">
                          <label class="form-label" for="lblnombrecontacto"> Nombre </label>
                          <input type="text" name="nombrecontacto" class="form-control" value="{{old('nombrecontacto')}}" require> 
                        </fieldset>
                
                        <div class="row">
                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label" for="lblcorreocontacto">Correo electrónico </label>
                              <input type="correo" class="form-control" name="correocontacto" placeholder="correo electrónico" value="{{old('correocontacto')}}">
                            </fieldset>
                          </div> 
                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label for="lbltelefonocontacto"> Telefono / Movil </label>
                              <input type="text" name="telefonocontacto" class="form-control"  value="{{old('telefonocontacto')}}"> 
                            </fieldset>           
                          </div>
                        </div>
                      </div>
                      
                      <div id="natural">
                        <fieldset class="form-group">
                          <label class="form-label" for="lblnombre"> Nombres </label>
                          <input type="text" name="nombres" class="form-control" value="{{old('nombre')}}" require> 
                        </fieldset>          
                        <fieldset class="form-group">
                          <label class="form-label" for="lblapellido"> Apellidos </label>
                          <input type="text" name="apellidos" class="form-control" value="{{old('apellidos')}}" require> 
                        </fieldset>          
                        
                        <fieldset class="form-group">
                          <label class="form-label" for="lblidentificacion">Identificacion</label>             
                          <input type="text" name="identificacion" class="form-control" value="{{old('identificacion')}}" require> 
                        </fieldset> 
                        <fieldset class="form-group">
                          <label class="form-label" for="lblcorreo">Correo electrónico </label>
                          <input type="correo" class="form-control" name="correo" placeholder="correo electrónico" value="{{old('correo')}}">
                        </fieldset>          
                        <fieldset class="form-group">
                          <label for="lbltelefono"> Telefono / Movil </label>
                          <input type="text" name="telefono" class="form-control"  value="{{old('telefono')}}"> 
                        </fieldset>   
                        <fieldset class="form-group">
                          <label for="lblintereses">Direccion </label>
                          <textarea rows="5"  name="direccion"  class="form-control"  value="{{old('direccion')}}" ></textarea>                    
                        </fieldset>     
          
                      </div>

                      <button type="submit" class="btn btn-sm btn-success" > Guardar cliente</button>
                      <br>
                      <br>
                </form>
            </div>
  
           
        </div>
    </div>
</div>