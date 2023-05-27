<?php

    class Config {
        private $HOST = "localhost";
        private $USERNAME = "root";
        private $PASSWORD = "";
        private $DB_NAME = "multiparking";
        private $PARKING_MASTER_TABLE = "parking_master";
        private $WING_TABLE = "wing";
        private $FLORR_TABLE = "florr";
        private $VAH_TYPES_TABLE = "vahicaltypes";
        private $SLOT_TABLE = "slot_num";
        private $BIKE_PRICE_TABLE = "bike_price";
        public  $conn;

        public function connect() {
            $this->conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);  

            return $this->conn; // bool
        }

        public function insert_parking($name, $vah_num, $vah_type_id, $wing_id, $florr_id, $slot_id, $price_id) {
            $this->connect();

            $query = "INSERT INTO $this->PARKING_MASTER_TABLE(name, vah_num, vah_type_id, wing_id,florr_id,slot_id,price_id) VALUES('$name', '$vah_num', $vah_type_id, $wing_id, $florr_id, $slot_id, $price_id);";

            $res = mysqli_query($this->conn, $query);  

            return $res;  // bool
        }

        public function fetch_all_parking(){
            $this->connect();

            $query = "SELECT * FROM $this->PARKING_MASTER_TABLE;";

            $res = mysqli_query($this->conn, $query);

            return $res;   // object of mysqli_result class
        }

        public function delete_parking($id) {
            $this->connect();

            $query = "DELETE FROM $this->PARKING_MASTER_TABLE WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;  // total no. of deleted records
        }

        public function fetch_single_parking($id) {
            $this->connect();

            $query = "SELECT * FROM $this->PARKING_MASTER_TABLE WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function update_parking($name, $vah_num, $vah_type_id, $wing_id, $florr_id, $slot_id, $price_id, $id) {
            $this->connect();

            $query = "UPDATE $this->PARKING_MASTER_TABLE SET name='$name', vah_num='$vah_num', vah_type_id=$vah_type_id , wing_id=$wing_id, florr_id=$florr_id ,slot_id=$slot_id, price_id=$price_id  WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;  // total no. of updated records
        }

    


        public function insert_wing($wingname) {
            $this->connect();

            $query = "INSERT INTO $this->WING_TABLE(wingname) VALUES('$wingname');";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function insert_florr($florrname) {
            $this->connect();

            $query = "INSERT INTO $this->FLORR_TABLE(florrname) VALUES($florrname);";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function insert_vahical_type($vahicaltypes) {
            $this->connect();

            $query = "INSERT INTO $this->VAH_TYPES_TABLE(vahical) VALUES('$vahicaltypes');";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function insert_bike_price($hour, $price) {
            $this->connect();

            $query = "INSERT INTO $this->BIKE_PRICE_TABLE(hour, price) VALUES($hour, $price);";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function insert_slot($slotnum) {
            $this->connect();

            $query = "INSERT INTO $this->SLOT_TABLE(slot) VALUES($slotnum');";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }




    






        public function update_wing($wingname, $id) {
            $this->connect();

            $query = "UPDATE $this->WING_TABLE SET wingname='$wingname' , WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function update_florr($florrname, $id) {
            $this->connect();

            $query = "UPDATE $this->FLORR_TABLE SET florrname=$florrname , WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function update_vahical_type($vahicaltypes, $id) {
            $this->connect();

            $query = "UPDATE $this->VAH_TYPES_TABLE SET vahical='$vahical' , WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function update_bike_price($hour, $price, $id) {
            $this->connect();

            $query = "UPDATE $this->BIKE_PRICE_TABLE SET hour=$hour ,$this->VAH_TYPES_TABLE SET price=$price, WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function update_slot($slotnum,$id) {
            $this->connect();

            $query = "UPDATE $this->SLOT_TABLE SET slot='$slot' , WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }






        public function delete_wing($id) {
            $this->connect();

            $query = "DELETE FROM $this->WING_TABLE WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        }


        public function delete_florr($id) {
            $this->connect();

            $query = "DELETE FROM $this->FLORR_TABLE WHERE id=$id;";
        

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function delete_vahical_type($id) {
            $this->connect();

            $query = "DELETE FROM $this->VAH_TYPES_TABLE WHERE id=$id;";
        

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function delete_bike_price($id) {
            $this->connect();

            $query = "DELETE FROM $this->BIKE_PRICE_TABLE WHERE id=$id;";
    

            $res = mysqli_query($this->conn, $query);

            return $res;
        }

        public function delete_slot($id) {
            $this->connect();

            $query = "DELETE FROM $this->SLOT_TABLE WHERE id=$id;";
           

            $res = mysqli_query($this->conn, $query);

            return $res;
        }






        // public function add_subcategory($name, $cat_id) {
        //     $this->connect();

        //     $qs = "SELECT * FROM $this->CATEGORIES_TABLE WHERE id=$cat_id";

        //     $obj = mysqli_query($this->conn, $qs);

        //     $record = mysqli_fetch_assoc($obj);

        //     if($record) {
        //         $query = "INSERT INTO $this->SUBCATEGORIES_TABLE(name, cat_id) VALUES('$name', $cat_id);";

        //         $res = mysqli_query($this->conn, $query);

        //         return $res;        
        //     } else {
        //         return false;
        //     }
            
        // }

    }

?>