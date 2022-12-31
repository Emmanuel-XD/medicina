
<body id="page-top">
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h3>
                    <button type="button" class="btn bg-success" data-dismiss="modal">
					<i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                <!-- action="./includes/functions.php" method="POST" -->
             <form id="formUser">
                <div class="alerts">
                </div>
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombreUser" name="nombre" class="form-control" required>
                            </div>

                            <br>
                          
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="passwordUser" class="form-control" required>
                            </div>

                            <input type="hidden" name="accion" value="acceso_paciente">
                      <br>

                                <div class="mb-3">
                                    <center>
                               <input type="button" value="Acceder" id="loginUser" class="buttonLgn btn bg-success text-white" 
                               name="Login usuario">
                               <br>
                               <br>
                               <a href="./home/create.php" > ¿Aun no tienes cuenta? Registrate</a> 
                               <br>
                              
                               </center>
                               
                            </div>
                            </div>
                            </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
    