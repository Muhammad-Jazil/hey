<?php
include ('dbcon.php');
session_start();
$userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "";
$userName = $userEmail = $userPassword = $userConfirmPassword = "";
if (isset($_POST['userRegister'])) {

    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userConfirmPassword = $_POST['userConfirmPassword'];
    if (empty($userName)) {
        $userNameErr = "Name is required";
    }

    if (empty($userEmail)) {
        $userEmailErr = "Email is required";
    } 
    else {
        $query = $pdo->prepare("select * from users where email = :uEmail");
        $query->bindParam('uEmail', $userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $userEmailErr = "Email Already Exist";
        }
    }
    

    if (empty($userPassword)) {
        $userPasswordErr = "Password is required";
    }

    if (empty($userConfirmPassword)) {
        $userConfirmPasswordErr = "Confirm password is required";
    }
     else {
        if ($userPassword != $userConfirmPassword) {
            $userConfirmPasswordErr = "Password and Confirm Password does not match";
        }
    }

    if(empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr)){
        $query = $pdo->prepare("insert into users (name , email , password) values (:name , :email , :password)");
        $query->bindParam(':name', $userName);
        $query->bindParam(':email', $userEmail);
        $query->bindParam(':password',$userPassword);
        $query->execute();
        echo "<script>alert('user added');location.assign('login.php')</script>";
        

    }
}


// 
 $uEmail=$uPassword="";
 $uEmailErr = $uPasswordErr= "";
 if(isset($_POST['userlogin'])){

    $uEmail = $_POST['uEmail'];
    $uPassword = $_POST['uPassword'];
    if(empty($uEmail)){
        $uEmailErr = "Email is required";

    }
    if(empty($uPassword)){
        $uPasswordErr="password is required";
    }
    if(empty($uEmailErr) && empty($uPasswordErr)){
        $query = $pdo ->prepare("select * from users where email = :userEmail");
        $query->bindParam('userEmail',$uEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);


        // print_r($user);
        if($user){
            if($user['password']==$uPassword){


if($user['role_id']==1){
    $_SESSION['adminEmail'] = $user['email'];
    $_SESSION['adminName'] =$user['name'];
    echo "<script>alert('login');location.assign('adminpanel/index.php')</script>";
}


                echo "<script>location.assign('login.php?success=login')
                </script>";

            }
            else{
                echo "<script>location.assign('login.php?error=invalid password')</script>";
            }
            }
            else {
                echo "<script>location.assign('login.php?error=user not found')</script>";
            }
        
    
    }

 }

?>