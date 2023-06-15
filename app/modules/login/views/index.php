<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Productos</title>
</head>

<body id="FormLogin">
    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <form id="formLogin" method="post">
            <div class="card bg-light">
                <h5 class="card-title text-center mt-3 bg-light">ApiPrueba</h5>
                <div class="card-body bg-light">
                    <div class="form-outline mb-2">
                        <label class="form-label" for="username">Usuario</label>
                        <input  required type="text" id="username" value="admin" name="username" class="form-control" placeholder="Ingrese su usuario" 
                        />
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="password">Contraseña</label>
                        <input required id="password" name="pasword" value="admin" type="password" class="form-control" 
                          placeholder="Ingrese su contraseña" 
                        />
                    </div>
                    <button type="submit"  id="btnLogin" class="btn btn-primary btn-block mb-2">Iniciar sesión</button>
                </div>
            </div>
        </form>
    </div>

    <script src="./app/js/login.js"></script>
</body>
</html>