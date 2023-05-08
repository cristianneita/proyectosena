
<div class="main">
    <br>
    <a href="index.php" style="margin-left: 5%; "><img src="images/back.png" alt="atras"></a>
    <div class="shop_top" style="margin-top: -30px;">
        <div class="container">
            <form method="post" action="?c=registroResiduos&a=Guardar">
                <div class="register-top-grid">
                    <h2>REGISTRO DE DATOS</h2>
                    <p>Por favor ingrese los siguientes Datos. Los datos con * son datos obligatorios.</p>
                    <br>
                    <?php
                    date_default_timezone_set('America/Mexico_City');
                    $fecha_actual = date("Y-m-d H:i:s");

                    ?>
                    <div>
                        <span>Fecha<label>*</label></span>
                        <input type="datetime" name="date" required style="width: 96%; height: 40px;" value="<?= $fecha_actual ?> " disabled>
                    </div>

                    <div>
                        <span>Nombre del Aprendiz<label>*</label></span>
                        <input type="text" name="nombre" required placeholder="Ingrese su nombre" maxlength="100" style="border-color: black">
                    </div>

                    <div>
                        <span>Usuario a registrar los residuos<label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px " name="usuario" required>
                            <?php
                            $odb = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");
                            $query = "SELECT * FROM usuarios;";
                            $data = $odb->prepare($query);    // Prepare query for execution
                            $data->execute(); // Execute (run) the query
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) :
                                //echo "<option value='".$row["id_usuarios"]."'> </option>";
                                //print_r($row);
                            ?>
                                <option value="<?= $row["id_usuarios"] ?>"><?= $row["nombres"] . " " . $row["apellidos"] . "-" . $row['rol'] ?> </option>
                            <?php endwhile; ?>
                        </select>

                    </div>

                    <div>
                        <span>Número de Ficha <label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px  " name="ficha">
                            <?php
                            $odb = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");
                            $query = "SELECT * FROM fichas;";
                            $data = $odb->prepare($query);    // Prepare query for execution
                            $data->execute(); // Execute (run) the query
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) :
                                //echo "<option value='".$row["id_usuarios"]."'> </option>";
                                //print_r($row);
                            ?>
                                <option value="<?= $row["id_ficha"] ?>"><?= $row["numeroFicha"] . " " . $row["nombrePrograma"] ?> </option>
                            <?php endwhile; ?>
                        </select>
                        </select>
                    </div>
                    <div>
                        <span>Observaciones<label>*</label></span>
                        <input type="text" name="observaciones" required placeholder="Observaciones" maxlength="200" style="border-color: black">
                    </div>

                    <div>
                        <p>
                            <?php
                            function gen()
                            {
                                $num = rand(100000, 999999);
                                echo $num;
                            }
                            ?>
                            <span>Codigo<label>*</label></span>
                            <input type="text" name="codigo" required placeholder="Ingrese el codigo" maxlength="30" style="width: 96%; height: 40px; border-radius: 0;border-color: black; border-width: thin" value="<?= gen(); ?>" readonly>
                        </p>
                    </div>
                </div>
                <br><br>
                <div class="d-grid gap-2">
                    <b><input type="submit" value="Registrar Datos" class="form-control form-control-color" style="height: 40px; margin-top: 40px; background: black; color: white; border-radius: 0; border-color: black"></b>
                </div>

            </form>
        </div>
    </div>
</div>