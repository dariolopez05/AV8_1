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
        $brands = [];
        foreach ($array as $brandId) {
            $query = "SELECT `customerId`, `brandId` FROM `brandCustomer` WHERE `brandId` = '$brandId'";
            $result = mysqli_query($conn, $query);
            $brands = $result->fetch_array(MYSQLI_ASSOC);
            $customerId = $brands['customerId'];

            $query = "SELECT `brandId`, `brandName` FROM `brands` WHERE `brandId` = '$brandId'";
            $result = mysqli_query($conn, $query);
            $brand = $result->fetch_array(MYSQLI_ASSOC);
            $brandName = $brand['brandName'];

            $query = "SELECT `customerId`, `customerName` FROM `customers` WHERE `customerId` = '$customerId'";
            $result = mysqli_query($conn, $query);
            $clientes = $result->fetch_array(MYSQLI_ASSOC);
            $customerName = $clientes['customerName'];
            
            $output .= "<tr> <td>$customerId</td> <td>$customerName</td> <td>$brandName</td> </tr>";
        }
        return $output;
    }
}

?>