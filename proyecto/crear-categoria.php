<?php
require './include/redireccion.php';
require './include/cabecera.php';
require './include/lateral.php';

?>
<div id="principal">
    <h1>Crear Categoria</h1>
    <p>Puedeas añadir una nueva categoría desde esta pagina para tu blog</p>
    <br>
    <?php if(isset($_SESSION['completo_categoria'])): ?>
    <div class="alerta alerta-exito">
        <?= $_SESSION['completo_categoria']; ?>
    </div>
    <?php    endif;?>
    <form action="guardar-categoria.php" method="POST">
        <label for="nombre">Nombre Categoría</label>
        <input type="text" name="nombre" />
        <input type="submit" value="Guardar" />
    </form>
    <?php    borrarErrores(); ?>
</div>

<?php

require './include/footer.php';

?>