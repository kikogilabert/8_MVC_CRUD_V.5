<div id="contenido">
    <form autocomplete="on" method="post" name="dummies" id="dummies">
        <table border='0'>
            <tr>
                <th width=1200><h3>Quieres crear una lista automática de coches?</h3></td>
                
            </tr>
        </table>
        <table border='0'>
        <tr>
                <td><input type="hidden" id="car_plate" name="car_plate" placeholder="car_plate" value="<?php echo $car_plate['car_plate'];?>"/></td>
            </tr>

            <tr>
                <td><br><input name="Submit" type="button" class="Button_green" onclick="validate_others('dummies')" value="Send"/></td>
                <td align="right"><br><a class="Button_red" href="index.php?page=controller_cars&op=list">Back</a></td>
            </tr>
        </table>
    </form>
</div>