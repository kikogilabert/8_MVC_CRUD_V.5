<div id="contenido">
    <form autocomplete="on" method="post" name="delete_user" id="delete_user">
        <table border='0'>
            <tr>
                <td align="center"  colspan="2"><h3>¿Desea seguro borrar el coche seleccionado? <?php echo $_GET['car_plate']; ?>?</h3></td>
                
            </tr>
            <tr>
                <td><input type="hidden" id="car_plate" name="car_plate" placeholder="car_plate" value="<?php echo $car_plate['car_plate'];?>"/></td>
            </tr>

            <tr>
                <td><br><input name="Submit" type="button" class="Button_green" onclick="validate_others('delete')" value="Send"/></td>
                <td align="right"><br><a class="Button_red" href="index.php?page=controller_cars&op=list">Back</a></td>
            </tr>
        </table>
    </form>
</div>