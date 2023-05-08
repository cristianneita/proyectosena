<?php
require_once "controller/entregaResiduos.controlador.php";
require_once "model/entregaResiduos.php";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls;");

?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
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
        <?php
         foreach ($this->modelo->ListarEntrega() as $r) : ?>
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