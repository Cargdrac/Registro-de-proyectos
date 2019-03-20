<?php
  include('registrop.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/registro.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body style="background-image: url('imagenes/F7.jpg');">
    <div class="container">
      <div   class="login-box" class="col-md-12 ">
        <div class="col-md-12 col-md-offset-1" id="tab">
            <img src=" imagenes/l2.png" class="logo" >
            <h1 style="color: #FFFFFF">Registro</h1>
            <center><?php echo $mensaje; ?></center>
            <form method="post" onSubmit="return matricula()">
              <!-- USERNAME INPUT -->
              <table>
                <tr>
                  <td>
                   <label for="Nombre">Nombre</label>
                   <input type="text" placeholder="Enter Nombre" name="nombre_reg" required autocomplete="off">
                  </td>
                  <td class="espacio"></td>
                  <td>
                   <label for="Matricula">Matricula</label>
                   <input type="text" placeholder="Enter Matricula" name="matricula_reg" id="matricula_reg" required autocomplete="off">
                  </td>

                </tr>
                <tr>
                  <td>
                    <label for="password">Contraseña</label>
                    <input type="password" placeholder="Enter Contraseña" name="contraseña_reg" required>
                  </td>
                  <td class="espacio"></td>
                  <td>
                    <center>
                      <table>
                      <tr>
                        <td><center><label for="Profesor">Profesor</label> <input type="radio" name="tipo_reg" value="0" checked></center></td>
                      </tr>
                      <tr>
                        <td><center><label for="Estudiante">Estudiante</label> <input type="radio" name="tipo_reg" value="1" ></center></td>
                      </tr>
                    </table>
                    </center>
                    
              
                  </td>
                  
                </tr>
                <tr>
                  <td colspan="3"><center><input class="button" type="submit" value="Registrarse" name="registrarse" id="registrarse"></center></td>
                </tr>

              </table>
            </form>       
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    function matricula(){
      var m = document.getElementById("matricula_reg").value;
      var expreg = /^[0-9]{10}$/;
      if(m.length!=10){
        alert("El campo Matricula tiene que ser de 10 digitos");
        return false;
      }else{
        if(expreg.test(m)){
          return true;
        }else{
          alert("El campo Matricula solo acepta números");
          return false;
        }
      }
    }
  </script>
</html>