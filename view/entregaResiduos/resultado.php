<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<div class="main">
    <br>
    <a href="?c=login&a=FormInicio" style="margin-left: 5%; "><img src="images/home.png" alt="atras"></a>
    <div class="shop_top">

        <div class="container" style="margin-top: -30px;">
            <h2 class="text-center" style="font-weight: 700">Resultado de busqueda</h2>
            <br>
            <form action="?c=entregaResiduos&a=Buscar" class="text-right" method="post">
                <label for="">Desde</label>
                <input type="date" name="date1" required>
                <label for="">Hasta</label>
                <input type="date" name="date2" required>
                <label for="">Ficha</label>
                <input type="text" placeholder="Número de Ficha" style="height: 40px;" name="ficha">

                <input type="submit" value="Buscar" class="btn btn-primary">
            </form>

            <hr>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Fecha y Hora</th>
                        <th scope="col">Nombre del Instructor</th>
                        <th scope="col">No. Ficha</th>
                        <th scope="col">Ambiente</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tipo de Residuo</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Firma del Aprendiz</th>
                        <th scope="col">Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $r) : ?>
                        <tr>
                            <th scope="row"><?= $r->fecha ?></th>
                            <td><?= $r->instructor ?></td>
                            <td><?= $r->numeroFicha ?></td>
                            <td><?= $r->ambiente ?></td>
                            <td><?= $r->categoria ?></td>
                            <td><?= $r->tipo ?></td>
                            <td><?= $r->peso ?></td>
                            <td><?= $r->firmaAprendiz ?></td>
                            <td><?= $r->observaciones ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="?c=entregaResiduos&a=Listar" class="btn btn-success">Volver</a>
            <br>
        </div>
    </div>
</div>