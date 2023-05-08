<div class="main">
    <br>
    <a href="?c=login&a=FormInicio" style="margin-left: 5%; "><img src="images/home.png" alt="atras"></a>
    <div class="shop_top">

        <div class="container" style="margin-top: -30px;">
            <h2 class="text-center" style="font-weight: 700">Registro no encontrado</h2>
            <form method="post" action="?c=registroResiduos&a=Buscar">
                <div class="text-right">
                    <p>
                        <label>Buscar Codigo</label>
                        <input type="text" name="campo" required placeholder="Codigo; ejm: 123456" maxlength="30" style="text-align: left; border-radius: 5px;border-color: black; border-width: thin">
                        <input name="busqueda" class="sb-icon-search text-center" style="margin-inline-end: 55px; margin-top: 222px; border-radius: 50px;" type="submit" value=""> </span>
                    </p>
                </div>
            </form>
            <hr>
            <h1>Registro no encontrado</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha y Hora</th>
                        <th scope="col">Nombre del Aprendiz</th>
                        <th scope="col">Recolector</th>
                        <th scope="col">Ficha</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Codigo</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($resultado as $s) : ?>
                        <tr>
                            <th scope="row"><?= $s->id_residuos ?></th>
                            <td><?= $s->fecha ?></td>
                            <td><?= $s->nombreAprendiz ?></td>
                            <td><?= $s->usuarios ?></td>
                            <td><?= $s->numeroFicha ?></td>   
                            <td><?= $s->observaciones ?></td>
                            <td><?= $s->estado ?></td>
                            <td><?= $s->firmaAprendiz ?></td>
                            <td>
                                <!--<a href="?c=tipo&a=FormCrear&id=<?= $r->id_tipoResiduo ?>" ><img src="images/editar.png" alt="editar"></a> 
                        <a href="?c=tipo&a=Borrar&id=<?= $r->id_tipoResiduo ?>" ><img src="images/delete.png" alt="eliminar"></a>-->

                                <a href="?c=entregaResiduos&a=entregaResiduos" class="btn btn-success">Recibir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <br>
        </div>
    </div>
</div>