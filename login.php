<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="login-frm">
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control">
			<small><a href="javascript:void(0)" id="new_account">Create New Account</a></small>
		</div>
		<button class="button btn btn-info btn-sm">Login</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script>
	$('#new_account').click(function(){
		uni_modal("Create an Account",'signup.php?redirect=index.php?page=checkout')
	})
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>
<!-- <?php session_start();?>
<?php
    // include_once 'db_connect.php';
    $d_connect = new mysqli("localhost","root","","doctors_appointment_db");

    $errors = array("namely"=>"","password"=>"");
    // if (isset($_GET['submit'])) {
    //     echo $_GET['email'];
    //     echo $_GET['namely'];
    //     echo $_GET['password'];
    // }
    if (isset($_POST['login'])) {
        // echo htmlspecialchars ($_POST['email']);
        //check email

        //check name
        if (empty($_POST["namely"])) {
            $errors['namely'] = "A name is required <br/>";
        }else{
            $name = htmlspecialchars ($_POST['namely']);
            if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
                $errors['namely'] = "Name must be letters and spaces only"; 
            }

        }
         
        //check password
        if (empty($_POST["password"])) {
            $errors["password"] = "Password is required <br/>";
        }else{
            $password = htmlspecialchars ($_POST['password']);
            //using regexp with if
            if (!preg_match("/^([a-zA-Z0-9\s.,#-]+)(,\s*[a-zA-Z0-9\s.,#-]*)*$/", $password)) {
                $errors["password"] = "password must be comma seperated"; 
            }

        }

        //Getting the form values
        $username =  $_POST['namely'];
        echo "<br>";
        $password =  $_POST['password'];
    
        //check connection
        // if($d_connect->connect_error){
        //     echo $d_connect->error;
        // }else {
        //     echo "connection succesful";
        //     echo "<br>";
        // }
        
        //select the user
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $d_connect->query($sql);

        //var_dump($result);
        if ($result->num_rows === 1) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['id'] = $user['id'];
            header("Location: index.php");
            exit();
        } 
    
    }
?> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>
<body> -->
<!-- Login form -->
<!-- <?php include_once "navbar.php";?>
 <section class="container grey-text">
    <h4 class="center">LogIn Here</h4>
    <form class="white loll" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Your Name:</label>
        <input type="text" name="namely" value=<?php echo $name?>>
        <div class="red-text"><?php echo $errors["namely"]?></div>

        <label>Your password (comma separated):</label>
        <input type="password" name="password">
        <div class="red-text"><?php echo $errors["password"]?></div>

        <div class="center">
            <input type="submit" name="login" value="login" class="btn z-depth-0">
        </div>
        <p>Don't have an account?<a href="signup.php">SignUp</a></p>
    </form>
 </section>
<?php include_once "footer.php"; ?>
</body> -->