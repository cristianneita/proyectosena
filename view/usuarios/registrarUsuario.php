<div class="main">
<br>
<a href="?c=login&a=FormInicio" style="margin-left: 5%; "><img src="images/back.png" alt="atras"></a>
    <div class="shop_top" style="margin-top: -30px;">
        <div class="container">
            <form method="post" action="?c=usuario&a=Guardar">
                <div class="register-top-grid">
                    <h2>REGISTRO DE USUARIOS</h2>
                    <p>Por favor ingrese los siguientes Datos. Los datos con * son datos obligatorios.</p>
                    <br>
                    <div>
                        <span>Nombres<label>*</label></span>
                        <input type="text" name="nombres" required placeholder="Ingrese sus nombres" maxlength="45" style="border-color: black">
                    </div>
                    <div>
                        <span>Apellidos<label>*</label></span>
                        <input type="text" name="apellidos" required placeholder="Ingrese sus apellidos" maxlength="45" style="border-color: black">
                    </div>
                    <div>
                        <span>Tipo de Identificación<label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px " name="tipo" required>
                            <option value="1">C.C</option>
                            <option value="2">T.I</option>
                            <option value="3">C.E</option>
                        </select>
                    </div>
                    <div>
                        <span>Número de Identificación<label>*</label></span>
                        <input type="text" name="identificacion" required placeholder="Ingrese su número de identificación" maxlength="15" style="border-color: black">
                    </div>
                    <div>
                        <span>ROL<label>*</label></span>
                        <select class="form-select" aria-label="Default select example" style="width: 96%; height:40px; margin-top: 0px  " name="rol">
                            <option value="1">Administrador</option>
                            <option value="2">Auxiliar</option>
                        </select>
                    </div>
                    <div>
                        <span>Correo electronico<label>*</label></span>
                        <input type="text" name="correo" required placeholder="Ingrese su correo electronico" maxlength="100" style="border-color: black">
                    </div>

                    <div>
                        <p>
                            <span>Contraseña<label>*</label></span>
                            <input type="password" name="password" required placeholder="Ingrese su correo contraseña" maxlength="30" style="width: 96%; height: 40px; border-radius: 0;border-color: black; border-width: thin">
                        </p>
                    </div>
                </div>
                <br><br>
                <div class="d-grid gap-2">
                    <b><input type="submit" value="Registrarse" class="form-control form-control-color" style="height: 40px; margin-top: 40px; background: black; color: white; border-radius: 0; border-color: black"></b>
                </div>

            </form>
        </div>
    </div>
</div>