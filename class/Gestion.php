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
        $conn = $this->getConn();
        $output = "";
        foreach ($array as $brandId) {
            $ids = [];

            $query = "SELECT `customerId`, `brandId` FROM `brandCustomer` WHERE `brandId` = '$brandId'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $ids[] = $row['customerId'];
            }
         
            for ($i=0; $i < count($ids); $i++) {
                $id = $ids[$i];
                $query = "SELECT `customerId`, `customerName` FROM `customers` WHERE `customerId` = '$id'";
                $result = mysqli_query($conn, $query);
                $names = $result->fetch_array(MYSQLI_ASSOC);
                $name = $names['customerName'];

                $query = "SELECT `brandId`, `brandName` FROM `brands` WHERE `brandId` = '$brandId'";
                $result = mysqli_query($conn, $query);
                $brands = $result->fetch_array(MYSQLI_ASSOC);
                $brand = $brands['brandName'];

                $output .= "<tr> <td>$ids[$i]</td> <td>$name</td> <td>$brand</td> </tr>";
            }
            
        }
        return $output;
    }
}

?>