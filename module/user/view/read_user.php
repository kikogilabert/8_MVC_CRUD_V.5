<div id="contenido">
    <h1>Informacion del Usuario</h1>
    <p>
    <table border='2'>
        <tr>
            <td>ID: </td>
            <td>
                <?php
                    echo $user['id'];
                ?>
            </td>
        </tr>
    
        <tr>
            <td>LICENSE_NUMBER: </td>
            <td>
                <?php
                    echo $user['license_number'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>BRAND: </td>
            <td>
                <?php
                    echo $user['brand'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>MODEL: </td>
            <td>
                <?php
                    echo $user['model'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>CAR_PLATE: </td>
            <td>
                <?php
                    echo $user['car_plate'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>KM: </td>
            <td>
                <?php
                    echo $user['km'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>CATEGORY: </td>
            <td>
                <?php
                    echo $user['category'];
                ?>
            </td>
            
        </tr>
        
        <tr>
            <td>TYPE: </td>
            <td>
                <?php
                    echo $user['type'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>COMMENTS: </td>
            <td>
                <?php
                    echo $user['comments'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>DISCHARGE_DATE: </td>
            <td>
                <?php
                    echo $user['discharge_date'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>COLOR: </td>
            <td>
                <?php
                    echo $user['color'];
                ?>
            </td>
        </tr>

        <tr>
            <td>EXTRAS: </td>
            <td>
                <?php
                    echo $user['extras'];
                ?>
            </td>
        </tr>

        <tr>
            <td>PRICE: </td>
            <td>
                <?php
                    echo $user['price'];
                ?>
            </td>
        </tr>

        <tr>
            <td>DOORS: </td>
            <td>
                <?php
                    echo $user['doors'];
                ?>
            </td>
        </tr>

        <tr>
            <td>CITY: </td>
            <td>
                <?php
                    echo $user['city'];
                ?>
            </td>
        </tr>

        <tr>
            <td>LAT: </td>
            <td>
                <?php
                    echo $user['lat'];
                ?>
            </td>
        </tr>

        <tr>
            <td>LNG: </td>
            <td>
                <?php
                    echo $user['lng'];
                ?>
            </td>
        </tr>
    </table>
    </p>
    <p><a href="index.php?page=controller_user&op=list">Volver</a></p>
</div>