<?php

class Importar extends Connection {

    function customers(){
        $gestor = fopen('customers.csv', "r");
        $conn= $this->getConn();
        while (($element = fgetcsv($gestor, 0, "#")) !== false) {
            $id = $element[0];
            $name = $element[1];
            $query = "UPDATE `customers` SET `customerName`='$name' WHERE `customerId` = '$id'";
            $result = mysqli_query($conn, $query);
        }
        fclose($gestor);
    }

    function getBrandId($brand){
        $conn= $this->getConn();
        $query = "SELECT `brandId` FROM `brands` WHERE `brandName` = '$brand'";
        $result = mysqli_query($conn, $query);
        $id = $result->fetch_array(MYSQLI_ASSOC);
        return $id;
    }

    function brandCustomer() {
        
    }

}

?>