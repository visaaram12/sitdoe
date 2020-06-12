<?php
include 'connection.php';

session_start();
if (!isset($_SESSION['uname'])) {
    header('Location:index.php');
}
$id = $_GET['id']; 

     $sql= "SELECT * FROM dbtable where data_name='$id' ";
    
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
           
}
      
                                else
                                {
                                    $sqlp= "CREATE TABLE $id (
sno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
document LONGBLOB NOT NULL,
status char NOT NULL

)";

if (mysqli_query($conn, $sqlp)) {
$sqla = "INSERT INTO dbtable (data_name)
VALUES ('$id')";

if (mysqli_query($conn, $sqla)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
} 


                             
                              
      }
                                
    
      
      
if (isset($_POST['submit1'])) {
    
    $name1 = $_FILES['file']['name'];
    $tmp_name1 = $_FILES['file']['tmp_name'];
    $position1 = strpos($name1, ".");
    $fileextension1 = substr($name1, $position1 + 1);
    $fileextension = strtolower($fileextension1);
    if (isset($name1)) {

        $path = 'uploads/';

        if (!empty($name1)) {
            if (move_uploaded_file($tmp_name1, $path . $name1)) {
                
            }
        }
    }


    $query1 = "Insert into $id (document,status )
            values('uploads/$name1','Y')";
    if (mysqli_query($conn, $query1)) {



        echo '<script language="javascript">';
        echo 'alert("Successfully Uploaded"); ';
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
        <script src="js/datepicker.js"></script>
        <style> @media print {               #dis {                     display: none;                 }                             }
            button
            {
                width: 10%;
                height: 30px;;
            }
            a
            { font-family: Century Schoolbook;
              text-decoration: none;
            }
            table{ font-family: Century Schoolbook;} .tr{                 height: 40;    word-wrap: break-word;          font-size: 12px;             }         </style>
        <script>
            function myFunction() {
                window.print();
            }
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            $(function () {
                $("#tabs").tabs();
            });
            $(function () {
                $("#tabsa").tabs();
            });
        </script>

    </head>
    <body>
        <?php include 'head.php'; ?>
        <button id="dis" onclick="window.parent.location.href = 'logout.php'" style="float: right;font-size: 12px; font-family: Century Schoolbook;;  " ><center><b>Logout</b></center></button>

        <button id="dis" onclick="window.parent.location.href = 'TE_Unit_1.php'"  style="float: right;font-size: 12px; font-family: Century Schoolbook;;  "><center><b>Back</b></center> </button>
        <button id="dis" onclick="window.parent.location.href = 'front.php'"  style="float: right;font-size: 12px; font-family: Century Schoolbook;;  "><center><b>Home</b></center> </button>
            <br><br>     <?php
    
            $resulte = mysqli_query($conn, "SELECT * FROM topic where shortname='$id' ");
      while ($rowe = mysqli_fetch_array($resulte)) {
                                $topic1 = $rowe['topic'];
      }
        
        ?>
    <center>  <h1 class="engraved" style="font-size: 15px; font-family: Century Schoolbook;color: blue"><?php echo $topic1;?>
        </h1></center>

    <div id="tabsa" style="padding: 0px;border: none">
        <ul id='dis' >
            <li><a href="#tabsa-1" id='aa' style="font-size: 12px">List</a></li>
            <?php if ($_SESSION['uname'] == "ramesh") { ?>    <li><a href="#tabsa-2" id='aa' style="font-size: 12px" >Details </a></li>

            <?php } ?>    
        </ul>
        <br>
        <div id="tabsa-1" style="padding: 0px;"  >
            <form  method='POST' action="" enctype="multipart/form-data" autocomplete="off">
                <div >
                    <table   style="font-size: 12px; border:1px solid; border-collapse: collapse;" >
                        <thead >
                            <tr class="tr" style=" background-color:  #56baed; color: black;border:1px solid;">
                                <th style="border: 1px solid #000;width: 5% ">Serial No.</th>
                                <th style="border: 1px solid #000;width: 10%">Filename  </th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php
                           
                            $result = mysqli_query($conn, "SELECT * FROM $id   ");
                            while ($row = mysqli_fetch_array($result)) {
                                $s = $row['document'];
                                $t = ltrim($s, "uploads/");                             //echo "<form method='post' action='update.php'  >";
                                echo "<tr  >";
                                echo "<td style='border: 1px solid'>" . $row['sno'] . "</td>";
                                echo "<td style='border: 1px solid;  ' ><a href='  " . $row['document'] . "' name='document' value=" . $row['document'] . ">" . $t . "</a></td>";
 }                            echo "</tr>";
                            mysqli_close($conn);
                            ?>
                        </tbody>    </table>
                </div>
            </form> 
        </div>
<?php if ($_SESSION['uname'] == "ramesh") { ?>       <div id="tabsa-2">
                <form action="" method="post" enctype="multipart/form-data" id="add" autocomplete="off">
                    <table >  <tr style="height: 50"><td style="color: #000;width: 25%;font-size: 12px"><b>File Upload in word <font style="color: red">*</font> </b>  </td><td style="color: #000;width: 25%;font-size: 12px"><input type="file" name="file" style="font-weight: bold;  font-family: Century Schoolbook;;" required></td>
                    </table>
                    <br><center>  <input type="submit" name="submit1" value="Save Details" style="font-weight: bold;  font-family: Century Schoolbook;; font-size:15px;height: 30px;width: 10%" >
                    </center>  </form>   
            </div>
<?php } ?>
    </div></body></html>

