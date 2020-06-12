<?php
include 'connection.php';

session_start();
if (!isset($_SESSION['uname'])) {
    header('Location:index.php');
}
if (isset($_POST['submit1'])) {
    $topic = filter_input(INPUT_POST, 'topic');
    $shortname= filter_input(INPUT_POST, 'shortname');
 
    $query1 = "Insert into topic (topic,shortname )
            values('$topic','$shortname')";
    if (mysqli_query($conn, $query1)) {



        echo '<script language="javascript">';
        echo 'alert("Successfully Entered"); ';
        echo '</script>';
    }
}

?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery-1.12.4.js"></script>  
        <link rel="stylesheet" href="js/datep.css">
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/datepick.js"></script>
        <script src=" js/datepicker.js"></script>
        <style>a{ font-family: Century Schoolbook; font-size: 15px}
            .table{
                background-color:  white;
 font-family: Century Schoolbook;
                border-color: #0097fa;
                border: 2px #0097fa double ;
                width: 80%;

            }
            td{ font-family: Century Schoolbook;
                font-size:25px;
                font-style: normal;
                color: #0097fa; 
                font-weight: 200; 
            }
            tr{
                height: 30;
            }
            .engraved {
                font-size: 20px;
                 font-family: Century Schoolbook;;
                background-color: #666666;
                -webkit-background-clip: text;
                -moz-background-clip: text;
                background-clip: text;
                color: #140f06;

            }
            h2 {
                 font-family: Century Schoolbook;
                font-size: 10px;
                width: 70vw;
                margin-top: calc(10vh - 5vw);
                text-align: center;
                background: linear-gradient(
                    60deg,
                    hsl(0, 75%, 50%) 50%,
                    hsl(20, 75%, 50%) 10%,


                    hsl(50, 75%, 50%) 40%,
                    hsl(130, 75%, 50%) 40%,
                    hsl(130, 75%, 50%) 55%,
                    hsl(200, 75%, 50%) 55%,
                    hsl(200, 75%, 50%) 10%,
                    hsl(260, 75%, 50%) 70%,
                    hsl(260, 75%, 50%) 85%,
                    hsl(0, 75%, 50%) 85%
                    );


                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                animation: 10s BeProud linear infinite,
                    3s Always ease alternate infinite;
            }

            @keyframes BeProud {
                100% { background-position: 100vw 0px; }
            }
            @keyframes Always {
                100% { transform: scale(1.1);} }
               
            </style>
            <script>
             $(function () {
                $("#taabs").tabs();
            });</script>
        </head>
        <body>
            <?php
            include 'head.php ';
            ?><br><button id="dis" onclick="window.parent.location.href = '../logout.php'" style="float: right;font-size: 12px; font-family: Century Schoolbook;;  " ><center><b>Logout</b></center></button>
            
  
             <button id="dis" onclick="window.parent.location.href = 'javascript:history.go(-1)'"  style="float: right;font-size: 12px; font-family: Century Schoolbook;;  "><center><b>Back</b></center> </button>  
               <button id="dis" onclick="window.parent.location.href = 'front.php'"  style="float: right;font-size: 12px; font-family: Century Schoolbook;;  "><center><b>Home</b></center> </button>

        <center><h2 class = "engraved"> TECHNICAL ENGLISH UNIT_I</h2></center>
                     
<div id="taabs" style="padding: 0px;border: none">
        <ul id='dis' >
           <?php if ($_SESSION['uname'] == "ramesh") { ?>   <li><a href="#taabs-1" id='aa' style="font-size: 12px">LIST</a></li>
              <li><a href="#taabs-2" id='aa' style="font-size: 12px" >ADD </a></li>
<?php } ?> 
                  
        </ul>

          <div id="taabs-1" style="padding: 0px;"  >
            <form  method='POST' action="" enctype="multipart/form-data" autocomplete="off">
                <div >
                         <table class="table " style="font-size: 15px;width: 85%">
                             <thead> <tr style="background-color: #0097fa;height: 30;color: white;font-size: 15px"><th colspan="2">INTRODUCTION TECHNICAL ENGLISH </th><tr></tr>
                   
                        </thead>
                        <tbody class="tbody">
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM topic  ");
                            while ($row = mysqli_fetch_array($result)) {
                                $topic=$row['topic'];
                                $shortname=$row['shortname'];?>
                                                           
                            <tr ><td></td><td><img src="images/ICON.jpg" style="border-radius: 50%;height: 20%">&nbsp;&nbsp;<a href="purposeStatement.php?id=<?php echo $shortname?>" style="color: black;font-weight: bold"><?php echo $topic ?></a></td><td><a href="delete.php?id=<?php echo $shortname?>">x</a></td></tr>
                                 
                                                          
                        <?php       }                           
                            mysqli_close($conn);
                            ?>
                        </tbody>    </table>
                </div>
            </form> 
        </div>
<?php if ($_SESSION['uname'] == "ramesh") { ?>       <div id="taabs-2">
                 <form action="" method="post" enctype="multipart/form-data" id="add" autocomplete="off">




                     <table > <tr style="height: 40" ><td  style="color: #000;width: 25%;font-size: 12px"><b>Topic Name<font style="color: red">*</font> </b></td><td style="color: #000;width: 25%;font-size: 12px"><input type="text" name="topic"  style="font-weight: bold;  font-family: Century Schoolbook;"  ></td>  </tr>
                        <tr style="height: 50"><td style="color: #000;width: 25%;font-size: 12px"><b> Shortname <font style="color: red">*</font></b> </td><td style="color: #000;width: 25%;font-size: 12px"><input type="text" name="shortname"  style="font-weight: bold;  font-family: Century Schoolbook;"  ></td></tr></table>
                    <br><center>  <input type="submit" name="submit1" value="Save Details" style="font-weight: bold;  font-family: Century Schoolbook;; font-size:15px;height: 30px;width: 10%" >
                    </center>  </form> 
            </div>
<?php } ?>
   
       
    
    </body>
</html>