<?php
include_once './include/redireccion.php';
include_once './include/cabecera.php';
include_once './include/lateral.php';
?>
<div id="principal">
    <h1>Crear Entrada</h1>
    <p>Pantalla para crear una entrada</p>
    <form action='guardar-entrada.php' method="POST">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id='titulo'>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion"></textarea>
        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php
            $categorias = conseguirCategoria($db);
            if (!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
            <?php
            endwhile;
            endif;
            ?>
        </select>
    
        
            
    </form>
</div>
<?php
require './include/footer.php';
?>
