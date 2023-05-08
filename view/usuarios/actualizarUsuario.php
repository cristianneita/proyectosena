<div class="main">
<br>
<a href="?c=login&a=FormInicio" style="margin-left: 5%; "><img src="images/back.png" alt="atras"></a>
    <div class="shop_top" style="margin-top: -30px;">
        <div class="container">
            <form method="post" action="?c=usuario&a=Actualizar">
                <div class="register-top-grid">
                    <h2>Actualización de Datos</h2>
                    <p>Por favor ingrese los siguientes Datos. Los datos con * son datos obligatorios.</p>
                    <br>
                    <input type="hidden" name="id" required style="border-color: black" value="<?= $p->getIdUsuarios(); ?>">
                    <div>
                        <span>Nombres<label>*</label></span>
                        <input type="text" name="nombres" required placeholder="Ingrese sus nombres" maxlength="45" style="border-color: black" value="<?= $p->getNombres() ?>">
                    </div>
                    <div>
                        <span>Apellidos<label>*</label></span>
                        <input type="text" name="apellidos" required placeholder="Ingrese sus apellidos" maxlength="45" style="border-color: black" value="<?= $p->getApellidos()?>">
                    </div>
                    <div>
                        <span>Tipo de Identificación<label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px " name="tipo" required>
                            <option <?php if($p->getTipoIdentificacion()=="C.C"){
                                echo "selected='selected'"; } ?> value="1">C.C</option>
                            <option <?php if($p->getTipoIdentificacion()=="T.I"){
                                echo "selected='selected'"; } ?> value="2">T.I</option>
                            <option <?php if($p->getTipoIdentificacion()=="C.E"){
                                echo "selected='selected'"; } ?> value="3">C.E</option>
                        </select>
                    </div>
                    <div>
                        <span>Número de Identificación<label>*</label></span>
                        <input type="text" name="identificacion" required placeholder="Ingrese su número de identificación" maxlength="15" style="border-color: black" value="<?= $p->getNumeroIdentificacion()?>">
                    </div>
                    <div>
                        <span>Rol<label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px  " name="rol">
                            <option <?php if($p->getRol()=="Administrador"){
                                echo "selected='selected'"; } ?> value="1">Administrador</option>
                            <option <?php if($p->getRol()=="Auxiliar"){
                                echo "selected='selected'"; } ?> value="2">Auxiliar</option>
                        </select>
                    </div>
                    <div>
                        <span>Estado<label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px  " name="estado">
                            <option <?php if($p->getEstado()=="Activo"){
                                echo "selected='selected'"; } ?> value="1">Activo</option>
                            <option <?php if($p->getEstado()=="Inactivo"){
                                echo "selected='selected'"; } ?> value="2">Inactivo</option>
                        </select>
                    </div>
                    <div>
                        <span>Usuario o Correo<label>*</label></span>
                        <input type="text" name="correo" required placeholder="Ingrese su correo electronico" maxlength="100" style="border-color: black" value="<?= $p->getCorreo() ?>">
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