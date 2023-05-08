<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<div class="main">
    <br>
    <a href="?c=login&a=FormInicio" style="margin-left: 5%; "><img src="images/home.png" alt="atras"></a>
    <div class="shop_top">

        <div class="container" style="margin-top: -30px;">
            <h2 class="text-center" style="font-weight: 700">Listado General de Fichas</h2>
            <hr>
            <form action="?c=ficha&a=Buscar" method="post">
                <label for="exampleDataList" class="form-label">Buscar Ficha</label>
                <input class="form-control" name="buscarFicha" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." style="width: 40%;">
                <input value="Buscar" type="submit" class="btn btn-warning" style="margin-left: 41%; margin-top: -60px">
                <datalist id="datalistOptions">
                    <?php
                    $odb = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");
                    $query = "SELECT * FROM fichas;";
                    $data = $odb->prepare($query);    // Prepare query for execution
                    $data->execute(); // Execute (run) the query
                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) :
                        //echo "<option value='".$row["id_usuarios"]."'> </option>";
                        //print_r($row);
                    ?>
                        <option value="<?= $row["numeroFicha"] ?>"> </option>
                    <?php endwhile; ?>
                </datalist>
            </form>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Número de Ficha</th>
                        <th scope="col">Ambiente</th>
                        <th scope="col">Instructor</th>
                        <th scope="col">Jornada</th>
                        <th scope="col">Nombre del Programa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $r) : ?>
                        <tr>
                            <th scope="row"><?= $r->id_ficha ?></th>
                            <td><?= $r->numeroFicha ?></td>
                            <td><?= $r->ambiente ?></td>
                            <td><?= $r->instructor ?></td>
                            <td><?= $r->jornada ?></td>
                            <td><?= $r->nombrePrograma ?></td>
                            <td>

                                <a href="?c=ficha&a=FormUpdate&id=<?= $r->id_ficha ?>"><img src="images/editar.png" alt="editar"></a>
                                <a href="?c=ficha&a=Borrar&id=<?= $r->id_ficha ?>"><img src="images/delete.png" alt="eliminar"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                
            </table>
            <br><a href="?c=ficha&a=ListarFicha" class="btn btn-success">Volver</a>
        </div>
    </div>
</div>