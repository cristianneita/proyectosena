<div class="main">
    <br>
    <a href="?c=login&a=FormInicio" style="margin-left: 5%; "><img src="images/back.png" alt="atras"></a>
    <div class="shop_top" style="margin-top: -30px;">
        <div class="container">
            <h2 class="text-left" style="font-weight: 800;">MI PERFIL</h2>
            <hr>
            <div class="row">
                
                    <div class="col-md-6">
                        <h3 style="font-weight: 700;">Nombres: </h3>
                        <p><?= $_SESSION['user']['nombres'] ?></p>
                        <br>
                        <h3 style="font-weight: 700;">Apellidos: </h3>
                        <p><?= $_SESSION['user']['apellidos'] ?></p>
                        <br>
                        <h3 style="font-weight: 700;">Tipo de Identificación: </h3>
                        <p><?= $_SESSION['user']['tipoIdentificacion'] ?></p>
                        <br>
                        <h3 style="font-weight: 700;">Número de Identificación: </h3>
                        <p><?= $_SESSION['user']['numeroIdentificacion'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <h3 style="font-weight: 700;">Rol: </h3>
                        <p><?= $_SESSION['user']['rol'] ?></p>
                        <br>
                        <h3 style="font-weight: 700;">Estado: </h3>
                        <p><?= $_SESSION['user']['estado'] ?></p>
                        <br>
                        <h3 style="font-weight: 700;">Usuario o Correo: </h3>
                        <p><?= $_SESSION['user']['correo'] ?></p>
                        <br>
                        <a href="?c=usuario&a=FormUpdate&id=<?= $_SESSION['user']['id_usuarios'] ?>" class="btn btn-success">Editar</a>
                    </div>
                    
            </div>
        
        </div>
    </div>
</div>