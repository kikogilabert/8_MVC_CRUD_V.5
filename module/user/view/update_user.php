<?php
                // $data = 'hola update post user';
                // die('<script>console.log('.json_encode( $data ) .');</script>');
?>
<div id="contenido">
    <form autocomplete="on" method="post" name="aupdate_user" id="update_user" onsubmit="return validate();" action="index.php?page=controller_cars&op=update">
        <h1>Modificar usuario</h1>
        <table border='0'>
        <tr>
                <td>License_number: </td>
                <td><input type="text" id="license_number" name="license_number" placeholder="license_number" value="<?php echo $user['license_number'];?>"/></td>
                <td><font color="red">
                    <span id="error_license" class="error">
                    </span>
                </font></font></td>
            </tr>
        
            <tr>
                <td>Brand: </td>
                <td><input type="text" id="brand" name="brand" placeholder="brand" value="<?php echo $user['brand'];?>"/></td>
                <td><font color="red">
                    <span id="error_brand" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Model: </td>
                <td><input type="text" id= "model" name="model" placeholder="model" value="<?php echo $user['model'];?>"/></td>
                <td><font color="red">
                    <span id="error_model" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Car_plate: </td>
                <td><input type="text" id= "car_plate" name="car_plate" placeholder="car plate" value="<?php echo $user['car_plate'];?>"/></td>
                <td><font color="red">
                    <span id="error_carplate" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>KM: </td>
                <td><input type="text" id= "km" name="km" placeholder="km" value="<?php echo $user['km'];?>"/></td>
                <td><font color="red">
                    <span id="error_km" class="error">
                    </span>
                </font></font></td>
            </tr>
            <td>Category: </td>
                <td>
                <input type="radio" id="category" name="category" value="KM0" required <?php
                if($user['category'] == "KM0"){
                    echo "checked"; 
                }
                ?>
                >KM0
                <input type="radio" id="category" name="category" value="ET" required <?php
                if($user['category'] == "ET"){
                    echo "checked"; 
                }
                ?>
                >ET
                <input type="radio" id="category" name="category" value="RS" required <?php
                if($user['category'] == "RS"){
                    echo "checked"; 
                }
                ?>
                >RS
                <input type="radio" id="category" name="category" value="RT" required <?php
                if($user['category'] == "RT"){
                    echo "checked"; 
                }
                ?>
                >RT
                </td>
                <td><font color="red">
                    <span id="error_category" class="error"></span>
                    </font></td>
            </tr>







                    <td>Type: </td>
                <td>
                <input type="radio" id="type" name="type" value="Petrol" required <?php
                if($user['type'] == "Petrol"){
                    echo "checked"; 
                }
                ?>
                >Pertol
                <input type="radio" id="type" name="type" value="Hybrid" required <?php
                if($user['type'] == "Hybrid"){
                    echo "checked"; 
                }
                ?>
                >Hybrid
                </td>
                <td><font color="red">
                    <span id="error_type" class="error"></span>
                    </font></td>
            
            <tr>
                <td>Date: </td>
                <td><input type="text" id= "discharge_date" name="discharge_date" placeholder="date" value="<?php echo $user['discharge_date'];?>"/></td>
                <td><font color="red">
                    <span id="error_date" class="error">
                    </span>
                </font></font></td>
            </tr>  
            
            <tr>
                <td>Color: </td>
                <td><select id="color" name="color" placeholder="color">
                    <?php
                        if($user['color']==="Grey"){
                    ?>
                        <option value="Grey" selected>Grey</option>
                        <option value="Black">Black</option>
                        <option value="White">White</option>
                    <?php
                        }elseif($user['color']==="Black"){
                    ?>
                        <option value="Grey">Grey</option>
                        <option value="Black" selected>Black</option>
                        <option value="White">White</option>
                    <?php
                        }else{
                    ?>
                        <option value="Grey">Grey</option>
                        <option value="Black">Black</option>
                        <option value="White" selected>White  </option>
                    <?php
                        }
                    ?>
                    
                    </select></td>
                <td><font color="red">
                    <span id="error_color" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Extras: </td>
                <td><select id="extras" name="extras" placeholder="extras">
                    <?php
                        if($user['extras']==="Convertible"){
                    ?>
                        <option value="Convertible" selected>Convertible</option>
                        <option value="Navigator">Navigator</option>
                        <option value="tires">tires</option>
                        <option value="rear wing">rear wing</option>
                        <option value="Upholstered leather">Upholstered leather</option>
                    <?php
                        }elseif($user['extras']==="Navigator"){
                    ?>
                        <option value="Convertible" >Convertible</option>
                        <option value="Navigator"selected>Navigator</option>
                        <option value="tires">tires</option>
                        <option value="rear wing">rear wing</option>
                        <option value="Upholstered leather">Upholstered leather</option>
                    <?php
                        }elseif($user['extras']==="tires"){
                    ?>
                        <option value="Convertible" >Convertible</option>
                        <option value="Navigator">Navigator</option>
                        <option value="tires"selected>tires</option>
                        <option value="rear wing">rear wing</option>
                        <option value="Upholstered leather">Upholstered leather</option>
                        <?php
                        }elseif($user['extras']==="rear wing"){
                    ?>
                        <option value="Convertible" >Convertible</option>
                        <option value="Navigator">Navigator</option>
                        <option value="tires">tires</option>
                        <option value="rear wing"selected>rear wing</option>
                        <option value="Upholstered leather">Upholstered leather</option>
                    <?php
                        }else{
                    ?>
                        <option value="Convertible" >Convertible</option>
                        <option value="Navigator">Navigator</option>
                        <option value="tires">tires</option>
                        <option value="rear wing">rear wing</option>
                        <option value="Upholstered leather"selected>Upholstered leather</option>
                        
                    <?php
                        }
                    ?>
                    
                    </select></td>
                <td><font color="red">
                    <span id="error_color" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Comments: </td>
                <td><textarea cols="30" rows="5" id="comments" name="comments" placeholder="ur comments here"> <?php echo $user['comments']; ?></textarea></textarea></td>
                <td><font color="red">
                    <span id="error_comments" class="error">
                    </span>
                </font></font></td>
            </tr>

            
            <tr>
                <td>Price: </td>
                <td><input type="text" id= "price" name="price" placeholder="price" value="<?php echo $user['price'];?>"/></td>
                <td><font color="red">
                    <span id="error_price" class="error">
                    </span>
                </font></font></td>
            </tr>
            

            <tr>
                <td>Doors: </td>
                <td><input type="text" id= "doors" name="doors" placeholder="doors" value="<?php echo $user['doors'];?>"/></td>
                <td><font color="red">
                    <span id="error_doors" class="error">
                    </span>
                </font></font></td>
            </tr>

            
            <tr>
                <td>City: </td>
                <td><input type="text" id= "city" name="city" placeholder="city" value="<?php echo $user['city'];?>"/></td>
                <td><font color="red">
                    <span id="error_city" class="error">
                    </span>
                </font></font></td>
            </tr>

            
            <tr>
                <td>Lat: </td>
                <td><input type="text" id= "lat" name="lat" placeholder="latitude" value="<?php echo $user['lat'];?>"/></td>
                <td><font color="red">
                    <span id="error_lat" class="error">
                    </span>
                </font></font></td>
            </tr>

            
            <tr>
                <td>lng: </td>
                <td><input type="text" id= "lng" name="lng" placeholder="longitud" value="<?php echo $user['lng'];?>"/></td>
                <td><font color="red">
                    <span id="error_lng" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td><input type="submit" name="update" id="update"/></td>
                <td align="right"><a href="index.php?page=controller_cars&op=list">Volver</a></td>
            </tr>
        </table>
    </form>
</div>