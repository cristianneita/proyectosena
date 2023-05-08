<div class="main">
    <br>
    <a href="?c=login&a=FormInicio" style="margin-left: 5%; "><img src="images/home.png" alt="atras"></a>
    <div class="shop_top">

        <div class="container" style="margin-top: -30px;">
            <h2 class="text-center" style="font-weight: 700">Listado de Registro de Residuos</h2>
            <?php
            

            ?>
            <form method="post" action="?c=registroResiduos&a=Buscar">
                <div class="text-right">
                    <p>
                        <label>Codigo</label>
                        <input type="text" name="campo" required placeholder="Codigo; ejm: 123456" maxlength="30" style="text-align: left; border-radius: 5px;border-color: black; border-width: thin">
                        <input name="busqueda" class="btn btn-success"  type="submit" value="Buscar"> </span>
                        
                    </p>
                </div>
            </form>
            <hr>
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
                    <?php foreach ($this->modelo->ListarRegistroResiduos() as $r) : ?>
                        <tr>
                            <th scope="row"><?= $r->id_residuos ?></th>
                            <td><?= $r->fecha ?></td>
                            <td><?= $r->nombreAprendiz ?></td>
                            <td><?= $r->nombres  ?></td>
                            <td><?= $r->numeroFicha ?></td>   
                            <td><?= $r->observaciones ?></td>
                            <td><?= $r->estado ?></td>
                            <td><?= $r->firmaAprendiz ?></td>
                            <td>
                            <?php 
                            $estado = $r->estado;
                            if ($estado == "Pendiente") { ?>
                             <a href="?c=registroResiduos&a=Obtener&id=<?=$r->id_residuos?>" class="btn btn-success">Recibir</a>
                            <?php } else { ?>
                            <button class=" btn btn-primary">Entregado</button>
                            <?php } ?>
                               
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>