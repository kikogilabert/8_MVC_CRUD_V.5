<div id="contenido">
    <form autocomplete="on" method="post" name="delete_all" id="delete_all">
        <table border='0'>
            <tr>
            <th width=1500><h3>Quieres eliminar todos los coches al mismo tiempo?</h3></th>
            </tr>
        </table>
        <table border='0'>
        <tr>
                <td><input type="hidden" id="car_plate" name="car_plate" placeholder="car_plate" value="<?php echo $car_plate['car_plate'];?>"/></td>
            </tr>

            <tr>
                <td><br><input name="Submit" type="button" class="Button_green" onclick="validate_others('delete_all')" value="Send"/></td>
                <td align="right"><br><a class="Button_red" href="index.php?page=controller_cars&op=list">Back</a></td>
            </tr>
        </table>
        <br>
        <br>
    </form>
</div>