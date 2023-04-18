<div id="contenido">
    <form autocomplete="on" method="post" name="alta_user" id="alta_user" onsubmit="return validate();" action="index.php?page=controller_cars&op=create">
        <h1>Coche nuevo</h1>
        <table border='0'>
        
            <tr>
                <td>License_number: </td>
                <td><input type="text" id="license_number" name="license_number" placeholder="license_number" value=""/></td>
                <td><font color="red">
                    <span id="error_license" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Brand: </td>
                <td><input type="text" id="brand" name="brand" placeholder="brand" value=""/></td>
                <td><font color="red">
                    <span id="error_brand" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Model: </td>
                <td><input type="text" id= "model" name="model" placeholder="model" value=""/></td>
                <td><font color="red">
                    <span id="error_model" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Car_plate: </td>
                <td><input type="text" id= "car_plate" name="car_plate" placeholder="car plate" value=""/></td>
                <td><font color="red">
                    <span id="error_carplate" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>KM: </td>
                <td><input type="text" id= "km" name="km" placeholder="km" value=""/></td>
                <td><font color="red">
                    <span id="error_km" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Category: </td>
                <td><input type="radio" id="category" name="category"  value="KM0"/>KM0
                    <input type="radio" id="category" name="category"  value="ET"/>ET
                    <input type="radio" id="category" name="category"  value="SM"/>SM
                    <input type="radio" id="category" name="category"  value="RT"/>RT</td>
                <td><font color="red">
                    <span id="error_category" class="error">
                    </span>
                </font></font></td>
            </tr>

            
            <tr>
                <td>Type: </td>
                <td><input type="radio" id="type" name="type"  value="Petrol"/>Petrol
                    <input type="radio" id="type" name="type"  value="Hybrid"/>Hybrid</td>
                <td><font color="red">
                    <span id="error_type" class="error">
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td>Comments: </td>
                <td><textarea cols="30" rows="5" id="comments" name="comments" placeholder="ur comments here" value=""></textarea></td>
                <td><font color="red">
                    <span id="error_comments" class="error">
                    </span>
                </font></td>
            </tr>
            
            <tr>
                <td>Date: </td>
                <td><input type="text" id= "discharge_date" name="discharge_date" placeholder="date" value=""/></td>
                <td><font color="red">
                    <span id="error_date" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Color: </td>
                <td><select id="color" name="color" placeholder="color select">
                    <option value="Grey">Grey</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    </select></td>
                <td><font color="red">
                    <span id="error_color" class="error">
                    </span>
                </font></font></td>
            </tr>
            
            <tr>
                <td>Extras: </td>
                <td><select multiple size="5" id="extras" name="extras" placeholder="extras">
                    <option value="Convertible">Convertible</option>
                    <option value="Navigator">Navigator</option>
                    <option value="Tires">Tires</option>
                    <option value="Rear wing">Rear wing</option>
                    <option value="Upholstered leather">Upholstered leather</option>
                    </select></td>
                <td><font color="red">
                    <span id="error_extras" class="error">
                    </span>
                </font></font></td>
            </tr>
            


            
            <tr>
                <td>Price: </td>
                <td><input type="text" id= "price" name="price" placeholder="price" value=""/></td>
                <td><font color="red">
                    <span id="error_price" class="error">
                    </span>
                </font></font></td>
            </tr>
            

            <tr>
                <td>Doors: </td>
                <td><input type="text" id= "doors" name="doors" placeholder="doors" value=""/></td>
                <td><font color="red">
                    <span id="error_doors" class="error">
                    </span>
                </font></font></td>
            </tr>

            
            <tr>
                <td>City: </td>
                <td><input type="text" id= "city" name="city" placeholder="city" value=""/></td>
                <td><font color="red">
                    <span id="error_city" class="error">
                    </span>
                </font></font></td>
            </tr>

            
            <tr>
                <td>Lat: </td>
                <td><input type="text" id= "lat" name="lat" placeholder="latitude" value=""/></td>
                <td><font color="red">
                    <span id="error_lat" class="error">
                    </span>
                </font></font></td>
            </tr>

            
            <tr>
                <td>lng: </td>
                <td><input type="text" id= "lng" name="lng" placeholder="longitud" value=""/></td>
                <td><font color="red">
                    <span id="error_lng" class="error">>
                    </span>
                </font></font></td>
            </tr>

            <tr>
                <td><input type="submit" name="create" id="create"/></td>
                <td align="right"><a href="index.php?page=controller_cars&op=list">Volver</a></td>
            </tr>
        </table>
    </form>
</div>