
<div class="main">
<br>
<a href="?c=tipo&a=FormCrear" style="margin-left: 5%; "><img src="images/back.png" alt="atras"></a>
<a href="?c=login&a=FormInicio" style="margin-left: 85%; "><img src="images/home.png" alt="atras"></a>
    <div class="shop_top">

        <div class="container" style="margin-top: -30px;">
        <h2 class="text-center" style="font-weight: 700">Listado de Tipo de Residuos</h2>
        <hr>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tipo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($this->modelo->Listar() as $r): ?>
                    <tr>
                        <th scope="row"><?= $r->id_tipoResiduo ?></th>
                        <td><?= $r->categoria ?></td>
                        <td><?= $r->tipo ?></td>
                        <td>
                        <a href="?c=tipo&a=FormUpdate&id=<?= $r->id_tipoResiduo ?>" ><img src="images/editar.png" alt="editar"></a> 
                        <a href="?c=tipo&a=Borrar&id=<?= $r->id_tipoResiduo ?>" ><img src="images/delete.png" alt="eliminar"></a>
                        </td>
                    </tr>
                <?php  endforeach; ?>
                </tbody>
            </table>
            <br>
            <a href="?c=tipo&a=FormCrear" style="text-decoration: none; color: #2a9d8f"> Agregar  <img src="images/insertar.png" alt="Agregar"></a>
        </div>
    </div>
</div>