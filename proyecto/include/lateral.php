   <aside id="sidebar">
            <div id="usuario_logeado" class="bloque">
                <h3> Identificate </h3>
                    <form action="#" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Constraseña</label>
                        <input type="password" name="password">
                        <input type="submit" value="Enviar">
                    </form>
            </div>
       
            <div id="register" class="bloque">
                <h3> Registrate </h3>
                <?php  if(isset($_SESSION['completado'])): ?>
                <div class="alerta alerta-exito">
                    <?= ($_SESSION['completado']); ?>
                </div>
                <?php  elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error">
                    <?= var_dump(($_SESSION['errores']['general'])); ?>
                </div>
                <?php endif; ?>
                <form action="./action/registro.php" method="POST">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" placeholder="Ingrese el nombre">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'):'';  ?>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" placeholder="Ingrese los apellidos">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido'):'';  ?>
                        <label for="email">Correo</label>
                        <input type="text" name="email" placeholder="ejemplo@dominio.com">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'):'';  ?>
                        <label for="password">Constraseña</label>
                        <input type="password" name="password">
                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password'):'';  ?>
                        <input type="submit" value="Registrar">
                    </form>
               <?php    borrarErrores(); ?>
            </div>
            
            </aside>