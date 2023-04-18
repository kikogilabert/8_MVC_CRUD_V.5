<div id="contenido">
    <div class="container">
    	<div class="row">
    			<h3>LISTADO DE COCHES</h3>
    	</div>
    	<div class="row">
    		<p><a href="index.php?page=controller_cars&op=create"><img src="view/img/crear_coches.png"></a>⠀⠀<a href="index.php?page=controller_cars&op=delete_all"><img src="view/img/add_button.png"></a>⠀⠀
            <a href="index.php?page=controller_cars&op=dummies"><img src="view/img/dummies-si.png"></a></p>
    		
    		<table>
                <tr>
                    <td width=125><b>ID</b></th>
                    <td width=125><b>LICENSE_NUMBER</b></th>
                    <td width=125><b>BRAND</b></th>
                    <th width=350><b>Accion</b></th>
                </tr>
                <?php
                    if ($rdo->num_rows === 0){
                        echo '<tr>';
                        echo '<td align="center"  colspan="3">NO HAY COCHES DISPONIBLES</td>';
                        echo '</tr>';
                    }else{
                        foreach ($rdo as $row) {
                       		echo '<tr>';
                    	   	echo '<td width=125>'. $row['id'] . '</td>';
                    	   	echo '<td width=125>'. $row['license_number'] . '</td>';
                    	   	echo '<td width=125>'. $row['brand'] . '</td>';
                    	   	echo '<td width=350>';

                            print ("<div class='coche' car_plate='".$row['car_plate']."'>Read</div>");  //READ
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';


                    	   	// echo '<a class="Button_blue" href="index.php?page=controller_cars&op=read&car_plate='.$row['car_plate'].'">Read</a>';
                    	   	echo '&nbsp;';
                    	   	echo '<a class="Button_green" href="index.php?page=controller_cars&op=update&car_plate='.$row['car_plate'].'">Update</a>';
                    	   	echo '&nbsp;';
                    	   	echo '<a class="Button_red" href="index.php?page=controller_cars&op=delete&car_plate='.$row['car_plate'].'">Delete</a>';
                    	   	echo '</td>';
                    	   	echo '</tr>';
                        }
                    }
                ?>
            </table>
    	</div>
    </div>
</div>

<!-- modal window -->
<section id="car_modal">
</section>
