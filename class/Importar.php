<?php

class Importar extends Connection {

    function customers(){
        $gestor = fopen('customers.csv', "r");
        $conn= $this->getConn();
        $query = "UPDATE `customers` SET `customerName`=? WHERE `customerId` = ?";
        while (($element = fgetcsv($gestor, 0, "#")) !== false) {
            $id = $element[0];
            $name = $element[1];
            $ready = $conn->prepare($query);
            $ready->bind_param("ss", $name, $id);
            $ready->execute();
            $result = $ready->get_result();
            $ready->close();
        }
        fclose($gestor);
    }

    function getBrandId($brand){
        $conn= $this->getConn();
        $query = "SELECT `brandId` FROM `brands` WHERE `brandName` = ?";
        $ready = $conn->prepare($query);
        $ready->bind_param("s", $brand);
        $ready->execute();
        $result = $ready->get_result();
        $id = $result->fetch_array(MYSQLI_ASSOC); 
        $ready->close();
        return $id;
    }

    function brandCustomer() {
        $gestor = fopen('customers.csv', "r");
        $conn= $this->getConn();
        $query = "INSERT INTO `brandCustomer`(`customerId`, `brandId`) VALUES (?, ?)";
        while (($element = fgetcsv($gestor, 0, "#")) !== false) {
            $idCustomer = $element[0];
            $favourite = explode(", ", $element[2]);
                foreach ($favourite as $brand) {
                    $marca = $this->getBrandId($brand);
                    if (!is_null($marca)) {
                        $ready = $conn->prepare($query);
                        $ready->bind_param("ss", $idCustomer, $marca['brandId']);
                        $ready->execute();
                        $ready->close();
                    }
            }/*Faltan hacer las consultas preparadas*/
        }
        fclose($gestor);
    }

}

?>