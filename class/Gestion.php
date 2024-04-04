<?php

class Gestion extends Connection {
    
    function getBrands() {
        $conn= $this->getConn();
        $query = 'SELECT `brandId`, `brandName` FROM `brands` ORDER BY `brandName` ASC';
        $result = mysqli_query($conn, $query);
        $brands = $result->fetch_array(MYSQLI_ASSOC);
        var_dump($brands);
        foreach ($brands as $info) {
            
            /*$output .= "<input type='checkbox' value='$brandId' name='$brandName'> $brandName<br>";
        */}
    }

}

?>