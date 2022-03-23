<?php
class validation{
    public function __construct()
    {

        
        
    }
    public function validat($data){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'retype_password' => trim($_POST['retype_password'])
        ];

        //Validate inputs
        if(empty($data['name']) || empty($data['email']) || empty($data['usersUid']) || 
        empty($data['password']) || empty($data['retype_password'])){
            $message="Please fill out all inputs";
            header("location: ../register.php");
            return false;
            
        }

        if(!preg_match("/^[a-zA-Z0-9]*$/", $data['usersUid'])){
            $message= "Invalid username";
            header("location: ../register.php");
            return false;
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $message="Invalid email";
            header("location: ../register.php");
            return false;
        }

        if(strlen($data['password']) < 6){
            $message="Invalid password";
            header("location: ../register.php");
            return false;
        } else if($data['password'] !== $data['retype_password']){
            $message="Passwords don't match";
            header("location: ../register.php");
            return false;
        }
        else
        {
            return true;
        }
    }


}
?>