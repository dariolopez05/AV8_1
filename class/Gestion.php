<?php

class Gestion extends Connection {
    
    function getBrands() {
        $output = "";
        $conn= $this->getConn();
        $query = 'SELECT `brandId`, `brandName` FROM `brands` ORDER BY `brandName` ASC';
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($brand = $result->fetch_array(MYSQLI_ASSOC)) {
                $brandId = $brand['brandId'];
                $brandName = $brand['brandName'];
                $output .= "<div class='checkbox'><input type='checkbox' value='$brandId' name='brands[]'> $brandName<br></div>";
            }
        }
        return $output;
    }

    function getFavourites($array){

    }
}

?>