<?php
session_start();
include './connection.php';


?>
 <?php
    if(isset($_POST['login']))
{
   
                 
    $uname = $_POST['uname'];
$sql="SELECT * FROM manuals_login WHERE uname='$uname'";

$result1 = mysqli_query($conn, "SELECT * FROM manuals_login WHERE uname='$uname' ");
while($row = mysqli_fetch_array($result1))
{
$name = $row['uname'];
$_SESSION['uname'] = $row['uname'];
$_SESSION['pass'] = $row['pwd'];
$email = $row['email'];
}
if(($name==$uname))
{
    
   $otp= mt_rand(1000, 9999); 
     $query1 = "update manuals_login set skey='$otp' where uname='$name';";
    ;
    if (mysqli_query($conn, $query1)) {

    
      $headers = "From: postmaster@niot.res.in\r\n";
        $url = "www.niot.res.in";
      
        $msgsub = "Reset Password  ";


        $msgbody="<html><body> Sir/Madam<br/> <br/>";





      
        $msgbody.="OTP Number is  ".$otp;




       
        $msgbody .="<br><br>With Regards<br/>";
        $msgbody .="Acoustic Test Facility,<br/>National Institute of Ocean Technology,<br/>Pallikaranai,<br/>Chennai - 600100<br/>";
        $msgbody .="Contact: atf@niot.res.in<br/>Telefax : +9144 66783405 <br/> Phone : +9144 6678 3406/3408 </body></html><br/><br/>";










        require("PHPMailer/class.phpmailer.php");

        $mail = new PHPMailer();

        $mail->IsSMTP();                                      // set mailer to use SMTP
//$mail->Host = "domino1.niot.res.in";  // specify main and backup server
        $mail->Host = "192.168.1.75";
        $mail->SMTPAuth = false;     // turn on SMTP authentication

        $mail->From = "atf@niot.res.in";
        $mail->FromName = "atf@niot.res.in";
        $mail->AddAddress($email);
        
     



        $mail->Subject = $msgsub;
        $mail->Body = $msgbody;
        $mail->AltBody = "";
        $mail->IsHTML(true);
//$file_to_attach = "/upload/";
//$mail->AddAttachment( $file_to_attach , 'phpfmdJB0.pdf' );


        if (!$mail->Send()) {
            //echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }
        header("Location:otp.php"); 
    }
}}
    
//if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="latha")||($_SESSION['uname']=="sundar")
  //      ||($_SESSION['uname']=="sridhar")||($_SESSION['uname']=="dhanaraj")||($_SESSION['uname']=="ragu")||($_SESSION['uname']=="chithra")||($_SESSION['uname']=="thiru"))&& $a=="Employee Training Record")
//{
  //  header("Location:training/training_record.php");
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="latha")||($_SESSION['uname']=="sridhar")||($_SESSION['uname']=="sundar")||($_SESSION['uname']=="chithra")||($_SESSION['uname']=="thiru")) && $a=="QUALITY MANUAL")
//{
  //header("Location:manual/q_manual.php");  
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="latha" )||($_SESSION['uname']=="sridhar")||($_SESSION['uname']=="sundar")||($_SESSION['uname']=="chithra")||($_SESSION['uname']=="thiru"))&& $a=="QUALITY PROCEDURE")
//{
  //header("Location:procedure/index.php");  
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="latha")||($_SESSION['uname']=="sridhar")||($_SESSION['uname']=="sundar")||($_SESSION['uname']=="chithra")||($_SESSION['uname']=="thiru"))&& $a=="MASTER LIST")
//{
 // header("Location:master/index.php");  
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="latha" )||($_SESSION['uname']=="sridhar")||($_SESSION['uname']=="sundar")||($_SESSION['uname']=="chithra")||($_SESSION['uname']=="thiru"))&& $a=="REGISTERS FORMATS")
//{
  //header("Location:registers/index.php");  
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="latha")||($_SESSION['uname']=="sridhar")||($_SESSION['uname']=="sundar")||($_SESSION['uname']=="chithra")||($_SESSION['uname']=="thiru"))&& $a=="FORM FORMATS")
//{
//  header("Location:forms/index.php");  
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="sridhar")||($_SESSION['uname']=="preyenga")||($_SESSION['uname']=="sundar")||($_SESSION['uname']=="thiru")||($_SESSION['uname']=="chithra")||($_SESSION['uname']=="sridhar"))&& $a=="Equipment Record")
//{
//  header("Location:Equipment/index.php");  
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="dhanaraj"))&& $a=="Environmental Parameter Register - LF")
//{
 // header("Location:registere/ep_lf.php");  
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="dhanaraj"))&& $a=="Environmental Parameter Register - UAT")
//{
 // header("Location:registere/ep_uat.php");  
///}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="dhanaraj"))&& $a=="Maintenance Register - ATPS")
//{
 // header("Location:registere/atps.php");  
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="latha")||($_SESSION['uname']=="dhanaraj") )&& $a=="Maintenance Register - EOT CRANE")
//{
//  header("Location:registere/crane.php");  
//}
//else if((($_SESSION['uname']=="malar")||($_SESSION['uname']=="sundar")||($_SESSION['uname']=="thiru")||($_SESSION['uname']=="chithra")||($_SESSION['uname']=="sridhar"))&& $a=="Internal Quality Audit Record")
//{
 
//}




             ?>
<html>
    <head>
           <link rel="stylesheet" href="sty.css">
         <style>
             body{
                font-family: Century Schoolbook;
             }           
a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 40%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 80%;
  max-width: 350px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  font-family: Century Schoolbook;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text],input[type=password] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  font-family: Century Schoolbook;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus ,input[type=password] :focus{
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder ,input[type=password] :placeholder{
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 2s;
  animation-duration: 2s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}

* {
  box-sizing: border-box;
}
         </style>
    </head>
    <body>
         <?php include './head.php'; ?>
           <h2 class = "engraved" style="width: 100%"> LABORATORY QUALITY MANAGEMENT SYSTEM
                </h2> 
        <div class="wrapper fadeInDown" style="height: 70%">
    <div id="formContent">
    <!-- Tabs Titles -->
    <center>  <h1 class="active"> <center>  </center> </h1></center>
   

    <!-- Icon -->
    <div class="fadeIn first">
        <img src="images/DSCN2230.jpg" id="icon" alt="User Icon" style="border-radius: 20%" />
    </div>

    <!-- Login Form -->
    <form method="post" autocomplete="off" action="">
      <input type="text" id="login" class="fadeIn second" name="uname" placeholder="Username">
     
      <input type="submit" class="fadeIn fourth" value="Forgot /Reset Password" name="login" style="font-size: 12px;padding: 4px">
   
    </form>

   

  </div>
</div>
            
    </body>
</html>