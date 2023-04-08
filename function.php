<?php 

    class dataBase {

        private $conn;

        //database connection method start here
        public function __construct()
        {
            $dbhost     = 'localhost';
            $dbuser     = 'root';
            $dbpassword = '';
            $dbname     = 'funtion';

            $this->conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
            if(!$this->conn){
                die("Database connection Failed." .mysqli_connect_error());
            }

        }
        //database connection method end here


        //Insert method start here
        public function insertData($data){

            $username = $data['userIn'];
            $email = $data['emailIn'];
            $password = $data['passwordIn'];
            $phone = $data['phoneIn'];
            $gender = $data['gender'];
            $address = $data['address'];
            $file_name = $_FILES['upload_image']['name'];
            $tmp_name = $_FILES['upload_image']['tmp_name'];

            //insert query
            $sql = "INSERT INTO `udata`( `name`, `email`, `password`, `phone`, `gender`, `picture`, `address`) VALUES ('$username','$email','$password','$phone','$gender', '$file_name', '$address')";

            if(mysqli_query($this->conn, $sql)){

                return "New user added Successfully.";
            }

        }
        //Insert method end here

        //Read data section start here 
        public function read_data(){

            $sql = "SELECT * FROM `udata`";
            $connect = mysqli_query($this->conn, $sql);
           if($connect){
             return $connect;
           }
         }
         //Read data section end here

        //display data show section start here 
        public function readData($view_id){

            $sql = "SELECT * FROM udata WHERE id = $view_id";
           if(mysqli_query($this->conn, $sql)){

                $result = mysqli_query($this->conn, $sql);
                $fet_result = mysqli_fetch_assoc($result);
                return $fet_result;
           }
         }
         //Read data section end here

        //update method start here
        public function update($data){

            $id = $data['id_name'];
            $username = $data['userIn'];
            $email = $data['emailIn'];
            $password = $data['passwordIn'];
            $phone = $data['phoneIn'];
            $gender = $data['gender'];
            $address = $data['address'];
            $file_name = $_FILES['upload_image']['name'];
            $tmp_name = $_FILES['upload_image']['tmp_name'];

            //insert query
            $sql = "UPDATE `udata` SET `name`='$username',`email`='$email',`password`='$password',`phone`='$phone',`gender`='$gender',`picture`='$file_name',`address`='$address' WHERE id = $id";

            if(mysqli_query($this->conn, $sql)){

                return "User Data Updated Successfully.";
            }

        }
        //update method end here

          //database data section start here 
          public function delete_data($deleteid){

             $delete_sql = "DELETE FROM `udata` WHERE id = $deleteid";
             // execute connection 
             if(mysqli_query($this->conn, $delete_sql)){

                $connect = mysqli_query($this->conn, $delete_sql);
                return 'Data Successfully Deleted';
             }
          }

    }

?>