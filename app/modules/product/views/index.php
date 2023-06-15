<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <title>Productos</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light row">
      <a class="navbar-brand" href="#">APIPrueba</a>
      <a class="navbar-brand ml-auto" href="#">
        <button onclick="logout()" class="btn btn-info">Cerrar sesión</button>
      </a>
    </nav>
    <div class="container">
      <div class="row mt-2">
        <div class="col-md-12 text-center">
            <h3>Productos</h3>
        </div>
      </div>
      <div class="row" id="containerProducts">
      </div>
    </div>
    <script src="./app/js/products.js">
        getProducts();
    </script>
  </body>
</html>
