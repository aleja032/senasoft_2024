<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../styles/admin.css">
</head>
<body>
    <div class="container-fluid d-flex">
        <div class="sidebar shadow d-flex w-25 flex-column align-items-center justify-content-between">
            <div class="p-5 mb-5 w-100 d-flex flex-column align-items-center">
                <div class="cont-admin d-flex align-items-center gap-2">
                    <div class="cont-img d-flex justify-content-center">
                        <img src="https://www.sena.edu.co/Style%20Library/alayout/images/logoSena.png" style="width: 5rem;" class="img-fluid">
                    </div>
                    <div class="cont-reg">
                        <a href="#" class="fs-2">SenaBike</a>
                        <p>Regional Caquetá</p>
                    </div>
                    
                </div>
                
            </div>
            <div class="w-100 py-3">
                <a href="#earnings"><div class="p-3 options d-flex justify-content-center">
                    Ver Ganancias
                </div></a>
                <a href="#manage_bikes"><div class="p-3 options d-flex justify-content-center">
                    Gestionar Bicicletas
                </div></a>
                <a href="#publish_event"><div class="p-3 options d-flex justify-content-center">
                    Publicar un Evento
                </div></a>
            </div>
            <div class="py-4 d-flex justify-content-center w-100 my-5">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong><?php echo $_SESSION['name']; ?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#" id="sing-out">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-75 d-flex">
            <main class="w-100 d-flex flex-column">
                <!-- Ver Ganancias -->
                <div class="cont-main d-flex" id="earnings">
                    <div class="container p-5">
                        <h2>Ver Ganancias</h2>
                        <p>Detalles de las ganancias generadas hasta ahora...</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2024-09-20</td>
                                    <td>$200,000</td>
                                    <td>Alquiler bicicletas</td>
                                </tr>
                                <!-- Add more rows here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Gestionar Bicicletas -->
                <div class="cont-main d-flex" id="manage_bikes">
                    <div class="container p-5">
                        <h2>Gestionar Bicicletas</h2>
                        <div class="row row-gap-3">
                            <!-- Cards of bicycles with options to edit or delete -->
                            <div class="col-md-4 d-flex justify-content-around">
                                <div class="card">
                                    <img src="https://gwbicycles.com/cdn/shop/files/1-negra-2_1800x1800.jpg?v=1726761027" class="card-img-top" alt="Bicicleta">
                                    <div class="card-body">
                                        <h5 class="card-title">Bicicleta 700 Berlín GW</h5>
                                        <p class="card-text">Disponibilidad: Si</p>
                                        <a href="#" class="btn btn-green">Editar</a>
                                        <a href="#" class="btn btn-outline-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more cards for each bike -->
                        </div>
                    </div>
                </div>

                <!-- Publicar un Evento -->
                <div class="cont-main d-flex flex-column" id="publish_event">
                    <div class="container p-5">
                        <h2>Publicar un Evento</h2>
                        <form>
                            <div class="mb-3">
                                <label for="event_title" class="form-label">Título del Evento</label>
                                <input type="text" class="form-control" id="event_title">
                            </div>
                            <div class="mb-3">
                                <label for="event_date" class="form-label">Fecha del Evento</label>
                                <input type="date" class="form-control" id="event_date">
                            </div>
                            <div class="mb-3">
                                <label for="event_description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="event_description" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-green">Publicar</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
<script src="../javascript/admin.js"></script>
</html>