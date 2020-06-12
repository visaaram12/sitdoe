<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['uname'])) {
    header('Location:../index.php');
}
                                  include 'connection.php';
  $doc_no = filter_input(INPUT_POST, 'd_no');
                             
if (isset($_POST['submit1'])) {

$iss_no = filter_input(INPUT_POST, 'iss_no');
$a_made = filter_input(INPUT_POST, 'a_made');
$reason = filter_input(INPUT_POST, 'reason');
$am_no = filter_input(INPUT_POST, 'am_no');
$am_date = filter_input(INPUT_POST, 'am_date');

if($doc_no=="ATF-ML-8400-1")
{
    $table="m";
}
else if($doc_no=="ATF-ML-8400-1")

$query = "SELECT MAX(sno) AS sno FROM qual_manual";
$rowSQL = mysqli_query($conn, $query);
if ($rowSQL === FALSE) {
die(mysql_error());
}
$row = mysqli_fetch_array($rowSQL);
$largestNumber = $row['sno'];
$sno = $largestNumber + 1;
$file1 = $_FILES['file']['name'];
$array = explode('.', $file1);
$fileName = $array[0];
$fileExt = $array[1];
$name1 = $fileName."_".date('d').".".$fileExt;

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
$file2 = $_FILES['file1']['name'];
$array1 = explode('.', $file2);
$fileName1 = $array1[0];
$fileExt1 = $array1[1];
$name2 = $fileName1."_".date('d').".".$fileExt1;

$tmp_name2 = $_FILES['file1']['tmp_name'];

$position2 = strpos($name2, ".");

$fileextension2 = substr($name2, $position2 + 1);

$fileextension3 = strtolower($fileextension2);



if (isset($name2)) {

$path1 = 'uploads/';

if (!empty($name2)) {
if (move_uploaded_file($tmp_name2, $path1 . $name2)) {

}
}
}
$query1 = "Insert into qual_manual (sno ,doc_no ,document ,amendment_made ,reasons ,status ,date ,iss_no,am_no,issued_date,status1,pdf )
            values('$sno','ATF-ML-8400-1','uploads/$name1','$a_made','$reason','Waiting','$am_date','$iss_no','$am_no','Waiting','Waiting','uploads/$name2')";
if (mysqli_query($conn, $query1)) {






}
}




                      





   

  


$update1 = filter_input(INPUT_POST, 'update1');
$stat1 = filter_input(INPUT_POST, 'status1');
$hidden1 = filter_input(INPUT_POST, 'hidden1');



if (isset($update1)) {

date_default_timezone_set('Asia/Kolkata');
$date1 = date('d-m-Y');
if($stat1=="Rejected")
{ $update1 = "update qual_manual set status='$stat1',status1='$stat1',issued_date='-' ,date1='$date1' where sno='$hidden'";


if (mysqli_query($conn, $update1)) {}} else{
$update1 = "update qual_manual set status='$stat1',status1='$stat1',date1='03-08-2018'  where sno='$hidden1'";

if (mysqli_query($conn, $update1)) {
$sql = "SELECT document  FROM qual_manual where sno='$hidden1' ";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$document = $row['document'];


$zip = new ZipArchive;
//This is the main document in a .docx file.
$fileToModify = 'word/document.xml';

$wordDoc = $document;

if ($zip->open($wordDoc) === TRUE) {
//Read contents into memory   

$hd1 = 'word/footer1.xml';


$oldft2 = $zip->getFromName($hd1);


$newPhrase = str_replace("Approved on", "Approved on \n03-08-2018", $oldft2);


$zip->deleteName($hd1);



$zip->addFromString($hd1, $newPhrase);








}


}
else {
echo "Error updating record: " . mysqli_error($conn);
}

}

}
                    ?>
<html>
    <head>
        <link rel="stylesheet" href="sty.css">
        <script src="js/jquery-1.12.4.js"></script>  
        <link rel="stylesheet" href="js/datep.css">
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/datepick.js"></script>
        <script src="js/datepicker.js"></script>
         <link rel="stylesheet" href="../js/datep.css">
        <script src="../js/jquery-1.7.1.min.js"></script>
        <script src="../js/datepick.js"></script>
        <script src="../js/datepicker.js"></script>
        <script>
            $(function () {
                $("#fdate").datepicker({dateFormat: 'dd-mm-yy'});
                $("#tdate").datepicker({dateFormat: 'dd-mm-yy'});
            });

        </script>
        <script>
            $(document).ready(function () {
                $('input[name="certi"]').click(function ()
                {
                    var value = $(this).val();
                    if (value == "Yes")
                    {
                        $('#certic').show();
                        $('#certic1').show();

                    }
                    else {
                        $('#certic').hide();
                        $('#certic1').hide();
                    }


                });
            });
            $(document).ready(function(){   
$('#exp').keyup(function(e){
if(e.keyCode == 13){
var h= $('#exp').val();
$('#exp').val('');
$('#exp').val(h+String.fromCharCode(8)+"   ");// put your ascii code for special character
}
});
});
$(document).ready(function(){   
$('#qual').keyup(function(e){
if(e.keyCode == 13){
var h= $('#qual').val();
$('#qual').val('');
$('#qual').val(h+String.fromCharCode(8)+"   ");// put your ascii code for special character
}
});
});
            
        </script>
        <style>
            a
            {
                text-decoration: none;
            }
              @media print {
                #dis {
                    display: none;
                }
               
            }
            table{
                border-collapse: collapse;
                font-style: calibri;
                font-size: 22px;
            }
            div{
                border-color: white;
            }
           
        </style>
        <script>
             if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
            $(function () {
                $("#tabs").tabs();
            });
            $(function () {
                $("#tabsa").tabs();
            });
             $(function () {
                $("#tabsaa").tabs();
            });
            
         
            function myFunction() {
                window.print();
            }
              function formval()
            {
                var radios = document.getElementsByName("type");
                var radios = document.getElementsByName("feed");
                var radios = document.getElementsByName("certi");
                var radios = document.getElementsByName("evalu");

                var formValid = false;

                var i = 0;
                while (!formValid && i < radios.length) {
                    if (radios[i].checked)
                        formValid = true;
                    i++;
                }

                if (!formValid)
                {
                    alert("Training Type or Feedback or Evaluation or Certificate!");

                    return formValid;

                }

            }
        </script>

    </head>
    <body>
<?php include 'header.php'; ?>

        <button style="float: right">  <a href="login.php" id='dis' style="font-size: 22px;">Logout</a></button>
        <br>  <div id="tabs">
            <ul id='dis' >

                <li><a href="#tabs-1" id='dis' style="font-size: 20px">Dashboard</a></li>
                <li><a href="#tabs-2" id='dis' style="font-size: 20px" >Quality Manual</a></li>
                <li><a href="#tabs-3" id='dis' style="font-size: 20px">Quality Procedure</a></li>
                <li><a href="#tabs-4" id='dis' style="font-size: 20px">Training Record</a></li>
                <li><a href="#tabs-5" id='dis' style="font-size: 20px">Equipment Record</a></li>
                <li><a href="#tabs-6" id='dis' style="font-size: 20px">Customer Request Database</a></li>
                <li><a href="#tabs-7" id='dis' style="font-size: 20px">Master List</a></li>
                <li><a href="#tabs-8" id='dis' style="font-size: 20px">Forms Formats</a></li>
                <li><a href="#tabs-9" id='dis' style="font-size: 20px">Registers</a></li>
               
            </ul> <br>
            <div id="tabs-1">

            </div>
            <div id="tabs-2" name="manual" style="padding: 0px">
                <div id="tabsa" style="padding: 0px">
                    <ul id='dis' >
                        <li><a href="#tabsa-1" id='dis' style="font-size: 20px">List</a></li>
                    <?php if($_SESSION['uname']=="malar") { ?>    <li><a href="#tabsa-2" id='dis' style="font-size: 20px" >Details </a></li>
                    <?php }?>
                    </ul> <br>
                    <div id="tabsa-1" style="padding: 0px"  >
                        <form  method='POST' action="" enctype="multipart/form-data" autocomplete="off">
                            <div  >


                                <table   style="font-size: 14px; border:1px solid;" >
                                    <thead >
                                        <tr style=" background-color:  #4A8CDB; color: white">


                                            <th style="border: 1px solid">Document No.</th>
                                            <th style="border: 1px solid">Issue No.</th>

                                            <th style="border: 1px solid">Filename  </th>
                                            <th style="border: 1px solid">Amendment No. </th>
                                            <th style="border: 1px solid"> Date of Amendment  </th>
                                            <th style="border: 1px solid"> Amendment Made  </th>
                                            <th style="border: 1px solid"> Reasons of Amendment  </th>
                                            <th style="border: 1px solid"> Status  </th>
                                            
                                           
<?php if ($_SESSION['uname'] == "malar") { ?> 
                                              <th style="border: 1px solid"> Approval Date  </th>
                                            <th style="border: 1px solid"> Issued Date  </th>
                                            <th style="border: 1px solid"> Pdf File </th><?php } ELSE { ?>
 <th style="border: 1px solid"> Issued Date  </th>
                                            <th style="border: 1px solid"> Approval Date  </th><?php }?>


                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
<?php
$result = mysqli_query($conn, "SELECT * FROM qual_manual order by sno desc ");
while ($row = mysqli_fetch_array($result)) {
    $s = $row['document'];
    $s1 = $row['pdf'];
    $t = ltrim($s, "uploads/");
    $t1 = ltrim($s1, "uploads/");
    //echo "<form method='post' action='update.php'  >";

    echo "<tr  >";

    echo "<td style='width:6%;border: 1px solid'>" . $row['doc_no'] . "</td>";
    echo "<td style='border: 1px solid'>" . $row['iss_no'] . "</td>";



    if ($_SESSION['uname'] == "malar") {
        echo "<td style='width:11%;border: 1px solid' ><a href='  " . $row['document'] . "' name='document' value=" . $row['document'] . ">" . $t . "</a></td>";
    } else {
        echo "<td style='width:11%;border: 1px solid'><a href='  " . $row['pdf'] . "' name='document' value=" . $row['pdf'] . ">" . $t1 . "</a></td>";
    }
    echo "<td  style='border: 1px solid'>" . $row['am_no'] . "</td>";
    echo "<td style='border: 1px solid'>" . $row['date'] . "</td>";
    echo "<td  style='width:20%;border: 1px solid'><div style='max-height:30px;overflow:auto;width:100%'>" . $row['amendment_made'] . "</div></td>";
    echo "<td style='width:20%;border: 1px solid'><div style='max-height:30px;overflow:auto;width:100%'>" . $row['reasons'] . "</div></td>";
    echo "<td style='border: 1px solid'>" . $row['status'] . "</td>";

    // echo "<td class='td' width='71px'><input type='hidden' name='hidden' value=" . $row['sno'] . "></td>";

    if ($_SESSION['uname'] == "malar") {
        if ($row['issued_date'] == "Waiting" && $row['status1'] == "Approved" || $row['status1'] == "Waiting") {
             echo "<td class='td' width='8%' style='border:1px solid'>" . $row['date1'] . "</td>";
            ?><td style='border: 1px solid'> <input type='hidden' name='hidden' value='<?php echo $row["sno"] ?>'/><br><input type='submit' name='update' value='Update' style='width:88%'/></td><td> <input name="file5" type="file" style="width: 50%;"/><br><input type='submit' name='updatee' value='Upload' style='width:88%'/></input><br></td></tr>

                                            <?php
                                            } else {
  echo "<td class='td' width='8%' style='border:1px solid'>" . $row['date1'] . "</td>";
                                                echo "<td class='td' width='8%' style='border:1px solid'>" . $row['issued_date'] . "</td>";
                                                echo "<td class='td' width='8%' style='border:1px solid'><a href='  " . $row['pdf'] . "' name='document' value=" . $row['pdf'] . " >" . $t1 . "</td>";
                                            }
                                            if (isset($_POST['update'])) {

                                                $hidden = filter_input(INPUT_POST, 'hidden');


                                                date_default_timezone_set('Asia/Kolkata');
                                                $issue_date = date('d-m-Y ');




                                                $update = "update qual_manual set  issued_date='03-08-2018'  where sno='$hidden'";

                                                if (mysqli_query($conn, $update)) {
                                                    $sql = "SELECT *  FROM qual_manual where sno='$hidden' ";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($result)) { {
                                                            $document = $row['document'];
                                                            $iss_no = $row['iss_no'];
                                                            $am_no = $row['am_no'];
                                                            $am_date = $row['date'];

                                                            $zip = new ZipArchive;
//This is the main document in a .docx file.
                                                            $fileToModify = 'word/document.xml';

                                                            $wordDoc = $document;

                                                            if ($zip->open($wordDoc) === TRUE) {
//Read contents into memory   

                                                                $hd1 = 'word/footer1.xml';

                                                              
                                                                $oldft2 = $zip->getFromName($hd1);



                                                                $a = ["Issued on", "Issue No.", "Amend. No.", "Amend Dt.", "_"];
                                                                $b = ["Issued on 03-08-2018", "Issue No.     " . $iss_no, "Amend. No. " . $am_no, "Amend Dt.  " . $am_date, "Controlled Copy"];

                                                                $newPhrase = str_replace($a, $b, $oldft2);


                                                                $zip->deleteName($hd1);



                                                                $zip->addFromString($hd1, $newPhrase);
                                                            }





                                                            $snoo = $hidden - 1;
                                                            $sql1 = "SELECT *  FROM qual_manual where sno='$snoo' ";

                                                            $result1 = mysqli_query($conn, $sql1);
                                                            while ($rows = mysqli_fetch_array($result1)) {


                                                                $document = $rows['document'];
                                                                $zip = new ZipArchive;
//This is the main document in a .docx file.
                                                                $fileToModify = 'word/document.xml';

                                                                $wordDoc = $document;
                                                                $status = $rows['status'];

                                                                if ($status == "Approved") {
                                                                    if ($zip->open($wordDoc) === TRUE) {
//Read contents into memory   

                                                                        $hd1 = 'word/footer1.xml';


                                                                        $oldft2 = $zip->getFromName($hd1);

                                                                        $newPhrase1 = str_replace("Controlled Copy", "Obsolete Copy", $oldft2);



                                                                        $zip->deleteName($hd1);



                                                                        $zip->addFromString($hd1, $newPhrase1);
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($_POST['updatee'])) {

                                                $hidden = filter_input(INPUT_POST, 'hidden');

                                                $name5 = $_FILES['file5']['name'];

                                                $temp_name = $_FILES['file5']['tmp_name'];

                                                if (!empty($name5)) {
                                                    $location = 'uploads/';
                                                    if (move_uploaded_file($temp_name, $location . $name5)) {
                                                       
                                                    } else {
                                                        echo 'You should select a file to upload !!';
                                                    }
                                                }
                                                $update = "update qual_manual set pdf='uploads/$name5'  where sno='$hidden'";

                                                if (mysqli_query($conn, $update)) {
                                                    
                                                }
                                            }
                                        } else if ($_SESSION['uname'] == "latha") {
                                            if ($row['status1'] == "Waiting") {
 echo "<td class='td' width='8%'style='border: 1px solid'>" . $row['issued_date'] . "</td>";
                                                echo "<td class='td' width='8%'><form  method='POST' action='#tabs-2'><input type='hidden' name='hidden1' value='" . $row["sno"] . "'/>
            <select name='status1' required>
  <option value=''>Select</option>
  <option value='Approved'>Approved</option>
  <option value='Rejected'>Rejected</option>
  
</select> <br> <input type='submit' name='update1' value='Done' style='height:20px;width:70%' /></form></td>";
                                                // echo "<td class='td' width='71px'><input type='submit' name='update' value='Submit' style='width:70'></td>";
                                            } else {
                                                 echo "<td class='td' width='8%'style='border: 1px solid'>" . $row['issued_date'] . "</td>";
                                                    echo "<td style='border: 1px solid'>" . $row['date1'] . "</td>";
                                               
                                            }
                                        } else {
                                             echo "<td class='td' width='8%'style='border: 1px solid'>" . $row['issued_date'] . "</td>";
                                                echo "<td style='border: 1px solid'>" . $row['date1'] . "</td>";
                                           
                                        }
                                        
                                        echo "</tr>";
                                    }

                                    mysqli_close($conn);
                                    ?>
                                    </tbody>    </table>
                            </div>







                        </form> 

                    </div>
                <?php if($_SESSION['uname']=="malar") { ?>       <div id="tabsa-2">
                        <fieldset> 
                            <center> <h1 style="color: rgb(0,127,255)"> QUALITY MANUAL</h1>
                            </center>
                            <form action="#tabs-2" method="post" enctype="multipart/form-data" id="add" autocomplete="off">




                                <table > <tr style="height: 40" ><td  style="color: #000;width: 25%;font-size: 20px"><b>Document No.<font style="color: red">*</font> </b></td><td style="color: #000;width: 25%;font-size: 20px"><input type="text" name="d_no" value="ATF-ML-8400-1" style="font-weight: bold; font-family: calibri"  size="20" disabled></td>  
                                        <td  style="color: #000;width: 25%;font-size: 20px"><b>Issue No.<font style="color: red">*</font> </b></td><td ><input type="text" name="iss_no"  style="font-weight: bold; font-family: calibri"  size="10" ></td></tr><tr><td style="color: #000;width: 25%;font-size: 20px"><b>Amendment No.</b></td><td style="color: #000;width: 25%;font-size: 20px"><input type="text" name="am_no" id="am_no" style="font-weight: bold; font-family: calibri"  size="10" ></td><td style="color: #000;width: 25%;font-size: 20px"><b>Amendment Date.</b></td><td style="color: #000;width: 25%;font-size: 20px"><input type="checkbox" name="am_date" value=" <?php date_default_timezone_set('Asia/Kolkata');
                                    echo date('d-m-Y');
                                    ?>" style="font-weight: bold; font-family: calibri"></td></tr> 
                                    <tr style="height: 50"><td style="color: #000;width: 25%;font-size: 20px"><b> Amendment Made <font style="color: red">*</font></b> </td><td style="color: #000;width: 25%;font-size: 20px"><textarea  name="a_made" cols="30" rows="2" style="font-weight: bold; font-family: calibri;" required ></textarea>
                                        <td style="color: #000;width: 25%;font-size: 20px"><b>Reasons of Amendment<font style="color: red">*</font> </b>  </td><td style="color: #000;width: 25%;font-size: 20px"><textarea  name="reason" cols="30" rows="2" style="font-weight: bold; font-family: calibri;" required></textarea></td></tr> 
                                    <tr style="height: 50"><td style="color: #000;width: 25%;font-size: 20px"><b>File Upload in word <font style="color: red">*</font> </b>  </td><td style="color: #000;width: 25%;font-size: 20px"><input type="file" name="file" style="font-weight: bold; font-family: calibri;" required></td>
                                        <td style="color: #000;width: 25%;font-size: 20px"><b>File Upload in pdf<font style="color: red">*</font> </b>  </td><td style="color: #000;width: 25%;font-size: 20px"><input type="file" name="file1" style="font-weight: bold; font-family: calibri;" required></td></tr></table>
                                <br><center>  <input type="submit" name="submit1" value="Save Details" style="font-weight: bold; font-family: calibri; font-size:15px;height: 30px;width: 10%" >
                                </center>  </form>   </fieldset>
                        
                </div><?php }?>
                   
                </div></div>
       
        <div id="tabs-3">
            <br>
            <center><b>QUALITY PROCEDURE</b><br>
                <table style="border:1px solid;padding: 2px;width: 80%">
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td colspan="2" >CONTENTS</td></tr>
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td>Document No</td><td>Title of the Document</td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/training.php" >ATF-QP-6200-1</a></td><td style="border:1px solid;"><a href="procedure/training.php">TRAINING</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/ep.php">ATF-QP-6300-1</a></td><td style="border:1px solid;"><a href="procedure/ep.php">MONITORING ENVIRONMENTAL PARAMETERS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/hand.php">ATF-QP-6400-1</a></td><td style="border:1px solid;"><a href="procedure/hand.php">HANDLING OF STANDARDS AND CALIBRATION / TEST ITEMS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/atps.php">ATF-QP-6400-2</a></td><td style="border:1px solid;"><a href="procedure/atps.php">MAINTENANCE OF ATPS, CRANE AND WATER TANK</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/purchase.php">ATF-QP-6600-1</a></td><td style="border:1px solid;"><a href="procedure/purchase.php">PURCHASING, SERVICES AND SUPPLIES</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/review.php">ATF-QP-7010-1</a></td><td style="border:1px solid;"><a href="procedure/review.php">REVIEW OF REQUESTS, TENDERS AND CONTRACTS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/nonconforming.php">ATF-QP-7100-1</a></td><td style="border:1px solid;"><a href="procedure/nonconforming.php">CONTROL OF NONCONFORMING TESTING AND CALIBRATION</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/calib.php">ATF-QP-7200-1</a></td><td style="border:1px solid;"><a href="procedure/calib.php">CALIBRATION OF UNDERWATER ACOUSTIC TRANSDUCERS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/testing.php">ATF-QP-7200-2</a></td><td style="border:1px solid;"><a href="procedure/testing.php">TESTING OF UNDERWATER ACOUSTIC TRANSDUCERS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/assure.php">ATF-QP-7700-1</a></td><td style="border:1px solid;"><a href="procedure/assure.php">ASSURING THE QUALITY OF TEST AND CALIBRATION RESULTS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/complaint.php">ATF-QP-7900-1</a></td><td style="border:1px solid;"><a href="procedure/complaint.php">CUSTOMER COMPLAINT</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/document.php">ATF-QP-8400-1</a></td><td style="border:1px solid;"><a href="procedure/document.php">CONTROL OF DOCUMENTS AND RECORD</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="procedure/preventive.php">ATF-QP-8700-1</a></td><td style="border:1px solid;"><a href="procedure/preventive.php">CORRECTIVE AND PREVENTIVE ACTION</a></td> </tr>
                
               
                </table></center>
            <br>
             <button id="dis" onclick="myFunction()" style="width: 8%;height: 38;float: right;font-family: calibri"><b>Print</b></button>
        </div>
            <div id="tabs-4" >
  </div>
      
        <div id="tabs-5">
           <center><b>EQUIPMENT RECORD</b><br>
                <table style="border:1px solid;padding: 2px;width: 80%">
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td colspan="2" >CONTENTS</td></tr>
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td>Document No</td><td>Title of the Document</td> </tr>
               <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href="hcs/hcs.php"><b> ATF-FL-6400-1 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hcs/hcs.php "><b>Hydrophone Calibration System </b></a></td></tr>
               
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'impedance/Hcs.php'><b>ATF-FL-6400-2 </b></a></td><td style="border:1px solid;width: 30%"><a href=" impedance/hcs.php "><b>Impedance Analyzer  </b> </a></td></tr>
               <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href='signal/Hcs.php'><b>ATF-FL-6400-3 </b></a></td><td style="border:1px solid;width: 30%"><a href=" signal/hcs.php "><b>Dynamic Signal Analyzer </b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'function/Hcs.php'><b>ATF-FL-6400-4 </b></a></td><td style="border:1px solid;width: 30%"><a href=" function/hcs.php "><b>Function Generator </b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro16/Hcs.php'   ><b>ATF-FL-6400-5 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro16/hcs.php "><b>Hydrophone - B&K 8103 - 2404781</b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro21/Hcs.php'><b>ATF-FL-6400-6</b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro21/hcs.php "><b> Hydrophone -B&K 8104 - 2308913  </b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro1/Hcs.php'><b>ATF-FL-6400-7 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro1/hcs.php "><b>Hydrophone -B&K 8104 - 2308914 </b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro17/Hcs.php'><b>ATF-FL-6400-8</b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro17/hcs.php "><b>Hydrophone - B&K 8104 - 2847189 </b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro2/Hcs.php'><b>ATF-FL-6400-9 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro2/hcs.php "><b>Hydrophone - B&K 8105 - 2307259  </b>  </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro3/Hcs.php'><b>ATF-FL-6400-10 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro3/hcs.php "><b>Hydrophone - Reson  4033 - 1399005 </b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro4/Hcs.php'   ><b>ATF-FL-6400-11 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro4/hcs.php "><b>Hydrophone - Neptune  D-11 - 24000</b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro5/Hcs.php'><b>ATF-FL-6400-12</b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro5/hcs.php "><b> Hydrophone - B&K 8104 - 2486983 </b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro6/Hcs.php'><b>ATF-FL-6400-13 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro6/hcs.php "><b>Hydrophone - B&K  8104 - 2486984   </b>  </a></td></tr>    
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro7/Hcs.php'><b>ATF-FL-6400-14 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro7/hcs.php "><b>Hydrophone - B&K 8104 - 2486985 </b>  </a></td></tr>
                 <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro9/Hcs.php' ><b>ATF-FL-6400-16 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro9/hcs.php "><b>NI Data Acquisition System </b> </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro10/Hcs.php'  ><b>ATF-FL-6400-17 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro10/hcs.php "><b>Hydrophone - TC 4034 - 2410026</b> </a></td></tr>
                
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro12/Hcs.php'><b>ATF-FL-6400-18 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro12/hcs.php "><b>Hydrophone - Reson TC 4034 - 2410030</b></a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro13/Hcs.php'><b>ATF-FL-6400-19 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro13/hcs.php "><b>Hydrophone - Reson TC 4014-5 - 2814020</b></a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro14/Hcs.php'><b>ATF-FL-6400-20</b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro14/hcs.php "><b> Hydrophone - Reson TC 4034 - 0514016</b></a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro15/Hcs.php'><b>ATF-FL-6400-21 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro15/hcs.php "><b>Low Frequency Calibration System</b> </a></td></tr>
                
                
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro18/Hcs.php'><b>ATF-FL-6400-22</b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro18/hcs.php "><b> pH/EC/TDS meter</b>  </a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro19/Hcs.php'><b>ATF-FL-6400-23</b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro19/hcs.php "><b> Wet & Dry bulb Thermometer - 125181  </b></a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro20/Hcs.php'><b>ATF-FL-6400-24 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro20/hcs.php "><b>Wet & Dry bulb Thermometer - 145189 </b></a></td></tr>
                <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro21/Hcs.php' style="background-color: aqua"><b>ATF-FL-6400-25 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro21/hcs.php "><b>Hydrophone - TC 4034 - 2410027</b> </a></td></tr>
                 <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro22/Hcs.php' style="background-color: aqua"><b>ATF-FL-6400-26 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro22/hcs.php "><b>Digital Multimeter, 8.5 digit</b> </a></td></tr>
                  <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro23/Hcs.php' style="background-color: aqua"><b>ATF-FL-6400-27 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro23/hcs.php "><b>Digital Multimeter, 6.5 digit</b> </a></td></tr>
                   <tr style="height: 25"><td style="border:1px solid;width: 30%"><a href= 'hydro24/Hcs.php' ><b>ATF-FL-6400-28 </b></a></td><td style="border:1px solid;width: 30%"><a href=" hydro24/hcs.php "><b>Low-Noise Preamplifier</b> </a></td></tr>
                  
                   




                </table></center>
       
             <button id="dis" onclick="myFunction()" style="width: 8%;height: 38;float: right;font-family: calibri"><b>Print</b></button>
       
             

            
        </div>
        <div id="tabs-6">
            <iframe src="http://www.niot.res.in/ATF/Acousticreq/loginpage.php" height="100%" width="100%">
            </iframe>
        </div>
        <div id="tabs-7">
<br>
            <center><b>MASTER LIST</b><br>
                <table style="border:1px solid;padding: 2px;width: 80%">
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td colspan="2" >CONTENTS</td></tr>
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td>Document No</td><td>Title of the Document</td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="master/quality.php" >ATF-ML-8400-1</a></td><td style="border:1px solid;"><a href="master/quality.php">MASTER LIST OF QUALITY RECORDS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="master/lab.php">ATF-ML-8300-1</a></td><td style="border:1px solid;"><a href="master/lab.php"">MASTER LIST OF DOCUMENTS MAINTAINED BY THE LABORATORY</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="master/equipment.php">ATF-ML-6400-1</a></td><td style="border:1px solid;"><a href="master/equipment.php">MASTER LIST OF EQUIPMENT FOR TEST/CALIBRATION</a></td> </tr>
                   
               
                </table></center>
            <br>
             <button id="dis" onclick="myFunction()" style="width: 8%;height: 38;float: right;font-family: calibri"><b>Print</b></button>
       
        </div>
        <div id="tabs-8">
  <center><b>FORMS FORMATS</b><br>
                <table style="border:1px solid;padding: 2px;width: 80%">
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td colspan="2" >CONTENTS</td></tr>
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td>Document No</td><td>Title of the Document</td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_feedback.php" >ATF-FM-6200-1</a></td><td style="border:1px solid;"><a href="forms/form_feedback.php">	TRAINING FEEDBACK & EVALUATION FORM</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_req.php">ATF-FM-7010-1</a></td><td style="border:1px solid;"><a href="forms/form_req.php">	REQUISITION FOR CALIBRATION OF UNDERWATER ACOUSTIC TRANSDUCERS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_minutes.php">ATF-FM-7010-2</a></td><td style="border:1px solid;"><a href="forms/form_minutes.php">	REQUISITION FOR TESTING OF UNDERWATER ACOUSTIC TRANSDUCERS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_control.php">ATF-FM-7100-1</a></td><td style="border:1px solid;"><a href="forms/form_control.php">CONTROL OF NON-CONFORMING TESTING / CALIBRATION WORK</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_report.php">ATF-FM-7830-1</a></td><td style="border:1px solid;"><a href="forms/form_report.php">TEST REPORT</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_certificate.php">ATF-FM-7840-1</a></td><td style="border:1px solid;"><a href="forms/form_certificate.php">CALIBRATION CERTIFICATE</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_complaints.php">ATF-FM-7900-1</a></td><td style="border:1px solid;"><a href="forms/form_complaints.php">COMPLAINTS FORM</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_corrective.php">ATF-FM-8700-1</a></td><td style="border:1px solid;"><a href="forms/form_corrective.php">CORRECTIVE & PREVENTIVE ACTION</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_internal.php">ATF-FM-8800-1</a></td><td style="border:1px solid;"><a href="forms/form_internal.php">INTERNAL QUALITY AUDIT NON CONFORMITY FORM</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_internalreport.php">ATF-FM-8800-2</a></td><td style="border:1px solid;"><a href="forms/form_internalreport.php">INTERNAL AUDIT SUMMARY REPORT</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="forms/form_closurereport.php">ATF-FM-8800-3</a></td><td style="border:1px solid;"><a href="forms/form_closurereport.php">NON CONFORMANCE CLOSURE REPORT</a></td> </tr>
                    
               
                </table></center>
            <br>
             <button id="dis" onclick="myFunction()" style="width: 8%;height: 38;float: right;font-family: calibri"><b>Print</b></button>
       
            
        </div>
        <div id="tabs-9">
 <br>
            <center><b>REGISTER FORMATS</b><br>
                <table style="border:1px solid;padding: 2px;width: 80%">
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td colspan="2" >CONTENTS</td></tr>
                    <tr style=" background-color:  #4A8CDB; color: white;height: 30;text-align: center;font-weight: bolder"><td>Document No</td><td>Title of the Document</td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="registers/epr_lf.php" >ATF-RG-6300-1</a></td><td style="border:1px solid;"><a href="registers/epr_lf.php">ENVIRONMENTAL PARAMETER REGISTER - LF</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="registers/in_out_uat.php">ATF-RG-6300-2</a></td><td style="border:1px solid;"><a href="registers/epr_uat.php">ENVIRONMENTAL PARAMETER REGISTER - UAT</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="registers/mr_eot.php">ATF-RG-6400-1</a></td><td style="border:1px solid;"><a href="registers/mr_eot.php">MAINTENANCE REGISTER - EOT CRANE</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="registers/mr_atps.php">ATF-RG-6400-2</a></td><td style="border:1px solid;"><a href="registers/mr_atps.php">MAINTENANCE REGISTER - ATPS</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="registers/cali_in_outward.php">ATF-RG-7400-1</a></td><td style="border:1px solid;"><a href="registers/cali_in_outward.php">CALIBRATION EQUIPMENT INWARD - OUTWARD REGISTER</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="registers/in_out_uat.php">ATF-RG-7400-2</a></td><td style="border:1px solid;"><a href="registers/in_out_uat.php">INWARD / OUTWARD - UAT</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="registers/std_hydro.php">ATF-RG-7500-1</a></td><td style="border:1px solid;"><a href="registers/std_hydro.php">STANDARD HYDROPHONES CALIBRATION LOG</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="registers/cali_log.php">ATF-RG-7500-2</a></td><td style="border:1px solid;"><a href="registers/cali_log.php">CALIBRATION LOG</a></td> </tr>
                    <tr style="height: 30"><td style="border:1px solid;width: 30%"><a href="registers/test_log.php">ATF-RG-7500-3</a></td><td style="border:1px solid;"><a href="registers/test_log.php">TEST LOG</a></td> </tr>
                    
               
                </table></center>
            <br>
             <button id="dis" onclick="myFunction()" style="width: 8%;height: 38;float: right;font-family: calibri"><b>Print</b></button>
       
        </div>
        <div id="tabs-10">
<?php
                  
              

?>
        </div>

    </div>
</body>
</html>