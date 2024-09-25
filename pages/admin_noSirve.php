<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SenaBike ADMIN</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jquery and ajax -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
      require_once '../backend/config/db_connection.php';
      include_once '../backend/class/Bike.php';
      include_once '../backend/class/Region.php';
    ?>
</head>
<body>
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <a class="title navbar-brand fs-1 fw-semibold p-5" href="#">SenaBike</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="item navbar-nav ms-auto mb-2 mb-lg-0 fs-4 px-5">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Ganancias</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Gestionar Bicicletas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Crear evento</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Agregar usuario</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Alquilar bicicleta</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Agregar Bicicleta</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    <!-- add bike -->
    <div id="addBike" class="container-fluid">
        <h4>Agregar bicicleta</h4>
        <form id="form_bike">
            <label>Marca: </label>
            <input type="text" name="bike_brand" placeholder="Ejemplo: GW">
            <br>
            <br>
            <label>Color: </label>
            <input type="text" name="bike_color" placeholder="Ejemplo: Verde">
            <br>
            <br>
            <label>Condición: </label>
            <input type="text" name="bike_condition" placeholder="Ejemplo: Excelente estado">
            <br>
            <br>
            <label>Disponibilidad: </label>
            <select name="bike_availability">
                <option value="1">Disponible</option>
                <option value="0">Ocupado</option>
            </select>
            <br>
            <br>
            <label>Precio de Alquiler: $</label>
            <input type="text" name="bike_price" placeholder="9999">
            <br>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
    <!-- rent bike -->
    <div id="addBike" class="container-fluid">
        <h4>Alquilar bicicleta</h4>
        <form id="form_rent_bike">
            <label>Regional: </label>
            <select name="rent_region">
              <?php
                $region = new Region($conn);

                $getregion = $region -> getRegions();
                foreach($getregion as $regions){

              ?>
                <option value="<?php echo $regions['id'];?>"><?php echo $regions['department'];?></option>

                <?php
                    }
              ?>
            </select>
            <br>
            <br>
            <label>Bicicleta: </label>
            <select name="rent_brand">
              <?php
                $bike = new Bike($conn);

                $getbikes = $bike -> getBikes();
                foreach($getbikes as $bikes){

              ?>
                <option value="<?php echo $bikes['id'];?>"><?php echo $bikes['brand']." ".$bikes['color'];?></option>

                <?php
                    }
              ?>
            </select>
            <br>
            <br>
            <label>Color: </label>
            <input type="text" name="bike_color" placeholder="Ejemplo: Verde">
            <br>
            <br>
            <label>Condición: </label>
            <input type="text" name="bike_condition" placeholder="Ejemplo: Excelente estado">
            <br>
            <br>
            <label>Disponibilidad: </label>
            <select name="bike_availability">
                <option value="1">Disponible</option>
                <option value="0">Ocupado</option>
            </select>
            <br>
            <br>
            <label>Precio de Alquiler: $</label>
            <input type="text" name="bike_price" placeholder="9999">
            <br>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
    
</body>
<script src="../javascript/admin.js"></script>
</html>