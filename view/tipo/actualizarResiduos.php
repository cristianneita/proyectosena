<div class="main">
    <br>
    <a href="?c=login&a=FormInicio" style="margin-left: 5%; "><img src="images/back.png" alt="atras"></a>
    <a href="?c=tipo&a=Listar" style="margin-left: 85%; "><img src="images/next.png" alt="siguiente"></a>
    <div class="shop_top">
        <div class="container">
            <form method="post" action="?c=tipo&a=Actualizar">
                <div class="register-top-grid">
                    <h2>ACTUALIZAR DE RESIDUOS</h2>
                    <p>Por favor ingrese los siguientes Datos. Los datos con * son datos obligatorios.</p>
<br>
                    <input type="hidden" name="id" required style="border-color: black" value="<?= $p->getId_tipoResiduo() ?>">

                    <div>
                        <span>Categoria:<label>*</label></span>
                        <input type="text" name="categoria" required placeholder="Categoria, ejm: Aprovechables" maxlength="45" style="border-color: black" value="<?= $p->getCategoria() ?>">
                    </div>
                    <div>
                        <span>Tipo: <label>*</label></span>
                        <input type="text" name="tipo" required placeholder="Tipo, ejm: Cartón" maxlength="45" style="border-color: black" value="<?= $p->getTipo() ?>">
                    </div>
                    <br><br>
                    <div class="d-grid gap-2 text-center" style="margin-left: 20%;">
                        <b><input type="submit" value="Actulizar" class="form-control form-control-color" style="height: 40px; margin-top: 40px; background: black; color: white; border-radius: 0; border-color: black"></b>
                    </div>
            </form>
        </div>
    </div>
</div>