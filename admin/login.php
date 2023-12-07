<!-- <?php
    // session_start();
    // include "../dao/pdo.php";
    // include "../dao/user.php";
    // if(isset($_POST["login"])){
    //     $uname=$_POST["uname"];
    //     $psw=$_POST["psw"];
    //     $user=checkuser($uname,$psw);
    //     if(isset($user)&&(is_array($user))&&(count($user)>0)){
    //         extract($user);
    //         if($role==1){
    //             $_SESSION['s_user']=$user;
    //             header('location: index.php');
    //         }else{
    //             $tb="Tài khoản này không có quyền đăng nhập trang quản trị";
    //         }
    //     }else{
    //         $tb="Tài khoản này không tồn tại. Hoặc đã nhầm!";
    //     }
        

    // }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

.boxcenter{
    width: 500px;
    margin: 0 auto;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<div class="boxcenter">
<h2>Login Form</h2>

<form action="login.php" method="post">
  <div class="imgcontainer">
    <img src="../layout/images/logo-bahozone-03-icon-h80.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Tên đăng nhập</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Mật khẩu</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <?php
        // if(isset($tb)&&($tb!="")){
        //     echo "<h3 style='color:red'>".$tb."</h3>";
        // }
    ?>
    <button type="submit" name="login">ĐĂNG NHẬP</button>
    
</div>

  
</form>
</div>
</body>
</html> -->
<?php
session_start();
include "../dao/pdo.php";
include "../dao/user_admin.php";
if (isset($_POST['loginsubmit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = get_user_username_pass($username, $password);

  // Check if the user array is not empty and the username is 'admin'
  if (is_array($user) && (count($user) > 1) && $username === 'admin') {
      $_SESSION['s_user'] = $user;
      header('location:index.php');
      $tb = "Đăng nhập thành công";
  } else {
      $tb = "<br>Đăng nhập không thành công";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="layout/assets/css/main.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <div class="container-fluid">
        <div class="col-xl-4 form-login">
            <div class="card form-gr">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" name="loginsubmit" class="btn btn-primary">Đăng nhập</button>
                    <?php
                    if(isset($tb)) echo $tb;
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>