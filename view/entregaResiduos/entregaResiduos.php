<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="js/duplicador.js" type="text/javascript"></script>
<div class="main">
    <br>
    <a href="?c=registroResiduos&a=Listar" style="margin-left: 5%; "><img src="images/back.png" alt="atras"></a>
    <div class="shop_top" style="margin-top: -30px;">
        <div class="container">
        <?php /*for ($i=0; $i < 3 ; $i++): */?>
       
            <form method="post" action="?c=entregaResiduos&a=Guardar">
                <div class="register-top-grid">
                    <h2>ENTREGA DE RESIDUOS</h2>
                    <p>Seleccione el tipo de Residuos que desea ingresar:</p>
                    <br>
                    <input type="hidden" name="id" required style="border-color: black" value="<?= $p->getId_residuos(); ?>">
                    <div>
                        <span>Datos del registro de residuos<label>*</label></span>
                        <input type="text" name="registro" required style="width: 96%; height: 40px; border-radius: 0;border-color: black; border-width: thin" value="<?= $p->getNombreAprendiz() ?>" readonly>
                    </div>
                    <div>
                        <span>Ficha<label>*</label></span>
                        <input type="text" name="ficha" required style="width: 96%; height: 40px; border-radius: 0;border-color: black; border-width: thin" value="<?= $p->getFicha() ?>" readonly>
                    </div>
                    <div>
                        <span>Tipo de Residuos <label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px  " name="tipo[]">
                            <?php
                            $odb = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");
                            $query = "SELECT * FROM tiporesiduos;";
                            $data = $odb->prepare($query);    // Prepare query for execution
                            $data->execute(); // Execute (run) the query
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) :
                                //echo "<option value='".$row["id_usuarios"]."'> </option>";
                                //print_r($row);
                            ?>
                                <option value="<?= $row["id_tipoResiduo"] ?>"><?= $row["categoria"] . " - " . $row["tipo"] ?> </option>
                            <?php endwhile; ?>
                        </select>
                        </select>
                    </div>

                    <div>
                        <p>
                            <span>Peso<label>*</label></span>
                            <input type="number" name="peso[]" required placeholder="Ingrese el codigo" style="width: 96%; height: 40px; border-radius: 0;border-color: black; border-width: thin" step="0.001">
                        </p>
                    </div>
                    <div>
                        <span>Tipo de Residuos <label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px  " name="tipo[]">
                        <option value="0"> Seleccione el tipo de residuos</option>
                            <?php
                            $odb = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");
                            $query = "SELECT * FROM tiporesiduos;";
                            $data = $odb->prepare($query);    // Prepare query for execution
                            $data->execute(); // Execute (run) the query
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) :
                                //echo "<option value='".$row["id_usuarios"]."'> </option>";
                                //print_r($row);
                            ?>
                            
                                <option value="<?= $row["id_tipoResiduo"] ?>"><?= $row["categoria"] . " - " . $row["tipo"] ?> </option>
                            <?php endwhile; ?>
                        </select>
                        </select>
                    </div>

                    <div>
                        <p>
                            <span>Peso<label>*</label></span>
                            <input type="number" name="peso[]" placeholder="Ingrese el codigo" style="width: 96%; height: 40px; border-radius: 0;border-color: black; border-width: thin" step="0.001">
                        </p>
                    </div>
                    <div>
                        <p>
                            <span>Usuario que recibe los residuo<label></label></span>
                            <input type="text" name="recolector" required style="width: 96%; height: 40px; border-radius: 0;border-color: black; border-width: thin" value="<?= $_SESSION['user']['nombres'] . " " . $_SESSION['user']['apellidos']?>" readonly>
                        </p>
                    </div>
                </div>
                
                
                <?php /*endfor*/ ?>
                <br><br>
                <div class="d-grid gap-2">
                    <b><input type="submit" value="Entregar" class="form-control form-control-color" style="height: 40px; margin-top: 40px; background: black; color: white; border-radius: 0; border-color: black"></b>
                </div>
            </form>
            
        </div>
    </div>
</div>

