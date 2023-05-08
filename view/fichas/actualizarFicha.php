<div class="main"><br>
<a href="?c=login&a=FormInicio" style="margin-left: 5%; "><img src="images/home.png" alt="atras"></a>
    <div class="shop_top" style="margin-top: -40px">
        <div class="container" >
            <form method="post" action="?c=ficha&a=Actualizar">
                <div class="register-top-grid">
                    <h2>ACTUALIZAR FICHAS</h2>

                    <p>Por favor ingrese los siguientes Datos. Los datos con * son datos obligatorios.</p>
                    <br>
                    <input type="hidden" name="id" required style="border-color: black" value="<?= $p->getIdFichas() ?>">
                    <div>

                        <span>Numero de Ficha<label>*</label></span>
                        <input type="text" name="numeroficha" required placeholder="Ingrese el # de Ficha" maxlength="30" style="width: 96%; border-color: black" value="<?= $p->getNumeroFicha() ?>">

                    </div>
                    <div>
                        <span>Ambiente<label>*</label></span>
                        <input type="text" name="ambiente" required placeholder="Ingrese el Ambiente de Formación" maxlength="15" style="border-color: black" value="<?= $p->getAmbiente() ?>">
                    </div>
                    <div>
                        <span>Instructor<label>*</label></span>
                        <input type="text" name="instructor" required placeholder="Ingrese el nombre del Instructor a cargo" maxlength="100" style="border-color: black" value="<?= $p->getInstructor() ?>">
                    </div>
                    <div>
                        <span>Jornada<label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px  " name="Jornada"  ?>">
                            <option <?php if($p->getJornada()=="Mañana"){
                                echo "selected='selected'"; } ?> value="1">Mañana</option>
                            <option <?php if($p->getJornada()=="Tarde"){
                                echo "selected='selected'"; } ?> value="2">Tarde</option>
                            <option <?php if($p->getJornada()=="Noche"){
                                echo "selected='selected'"; } ?>value="3">Noche</option>
                        </select>
                    </div>
                    <div>
                        <span>Nombre del Programa<label>*</label></span>
                        <input type="text" name="nombreprograma" required placeholder="Ingrese el nombre del Programa" maxlength="45" style="border-color: black" value="<?= $p->getNombreprograma() ?>">
                    </div>

                </div>
                <br><br>
                <div class="d-grid gap-2">
                    <b><input type="submit" value="Actualizar" class="form-control form-control-color" style="height: 40px; margin-top: 40px; background: black; color: white; border-radius: 0; border-color: black"></b>
                </div>

            </form>
        </div>
    </div>
</div>