
<html>
    <head>
      
        <script src="../js/jquery-1.12.4.js"></script>  
        <link rel="stylesheet" href="../js/datep.css">
        <script src="../js/jquery-1.7.1.min.js"></script>
        <script src="../js/datepick.js"></script>
        <script src="../js/datepicker.js"></script>
       <style> @media print {               #dis {                     display: none;                 }                             }
            a
            {
                text-decoration: none;
            }
        table{font-family:calibri;} .tr{                 height: 40;                 font-size: 18px;             }         </style>
        <script>
               function myFunction() {                 window.print();             }       if ( window.history.replaceState ) {  
        window.history.replaceState( null, null, window.location.href );
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
<?php include 'header.php'; ?>
        <button id='dis'> <a href="javascript:history.back()" id='dis' style="font-size: 20px">Back</a>   </button> <button style="float: right" id='dis'>  <a href="../index.php" id='dis' style="font-size: 20px">Logout</a>    </button> 
    <center>  <h1 class="engraved" style="font-size: 22px;color: blue">MASTER LIST - QUALITY RECORDS
        </h1></center>
 
        <div id="tabsa" style="padding: 0px;border: none">
                    <ul id='dis' >
                        <li><a href="#tabsa-1" id='aa' style="font-size: 20px">List</a></li>
                    <?php if($_SESSION['uname']=="malar") { ?>    <li><a href="#tabsa-2" id='aa' style="font-size: 20px" >Details </a></li>
                    <?php }?>
                    
                   
                    </ul> <br>
             
                
               
                    <div id="tabsa-1" style="padding: 0px;"  >
                        <form  method='POST' action="" enctype="multipart/form-data" autocomplete="off">
                            <div  >


                                <table   style="font-size: 14px; border:1px solid; border-collapse: collapse;" >
                                    <thead >
                                        <tr class="tr" style=" background-color:  #56baed; color: black;border:1px solid;">


                                            <th style="border: 1px solid #000; ">Document No.</th>
                                            <th style="border: 1px solid #000">Issue No.</th>

                                            <th style="border: 1px solid #000">Filename  </th>
                                            <th style="border: 1px solid #000">Amendment No. </th>
                                            <th style="border: 1px solid #000"> Date of Amendment  </th>
                                        <th style="border: 1px solid #000"> Amendment Made  </th>
                                            <th style="border: 1px solid #000"> Reasons of Amendment  </th>
                                            <th style="border: 1px solid #000"> Status  </th>
                                            
                                           
<?php if ($_SESSION['uname'] == "malar") { ?> 
                                              <th style="border: 1px solid #000"> Approval Date  </th>
                                            <th style="border: 1px solid #000"> Issued Date  </th>
                                            <th style="border: 1px solid #000" id='dis'> Pdf File </th><?php } ELSE { ?>
 <th style="border: 1px solid #000"> Issued Date  </th>
                                            <th style="border: 1px solid #000"> Approval Date  </th><?php }?>


                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
<?php
$result = mysqli_query($conn, "SELECT * FROM master_list order by sno desc ");
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
            ?><td style='border: 1px solid'> <input type='hidden' name='hidden' value='<?php echo $row["sno"] ?>'/><br><input type='submit' name='update' value='Update' style='width:88%'/></td><td id='dis'> <input name="file5" type="file" style="width: 50%;"/><br><input type='submit' name='updatee' value='Upload' style='width:88%'/></input><br></td></tr>

                                            <?php
                                            } else {
  echo "<td class='td' width='8%' style='border:1px solid'>" . $row['date1'] . "</td>";
                                                echo "<td class='td' width='8%' style='border:1px solid'>" . $row['issued_date'] . "</td>";
                                                echo "<td class='td' width='8%' style='border:1px solid' id='dis'><a href='  " . $row['pdf'] . "' name='document' value=" . $row['pdf'] . " >" . $t1 . "</td>";
                                            }
                                            if (isset($_POST['update'])) {

                                                $hidden = filter_input(INPUT_POST, 'hidden');


                                                date_default_timezone_set('Asia/Kolkata');
                                                $issue_date = date('d-m-Y ');




                                                $update = "update master_list set  issued_date='$issue_date'  where sno='$hidden'";

                                                if (mysqli_query($conn, $update)) {
                                                    $sql = "SELECT *  FROM master_list where sno='$hidden' ";
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
                                                                $b = ["Issued on ".$issue_date, "Issue No.     " . $iss_no, "Amend. No. " . $am_no, "Amend Dt.  " . $am_date, "Controlled Copy"];

                                                                $newPhrase = str_replace($a, $b, $oldft2);


                                                                $zip->deleteName($hd1);



                                                                $zip->addFromString($hd1, $newPhrase);
                                                            }





                                                            $snoo = $hidden - 1;
                                                            $sql1 = "SELECT *  FROM master_list where sno='$snoo' ";

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
                                                $update = "update master_list set pdf='uploads/$name5'  where sno='$hidden'";

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

                            <br>
                               <button id="dis" onclick="myFunction()" style="width: 8%;height: 38;float: right;font-family: calibri"><b>Print</b></button>





                        </form> 

                    </div>
                <?php if($_SESSION['uname']=="malar") { ?>       <div id="tabsa-2">
                       
                            
                            <form action="" method="post" enctype="multipart/form-data" id="add" autocomplete="off">




                                <table > <tr style="height: 40" ><td  style="color: #000;width: 25%;font-size: 20px"><b>Document No.<font style="color: red">*</font> </b></td><td style="color: #000;width: 25%;font-size: 20px"><input type="text" name="d_no" value="ATF-ML-8400-1" style="font-weight: bold; font-family: calibri"  size="20" disabled></td>  
                                        <td  style="color: #000;width: 25%;font-size: 20px"><b>Issue No.<font style="color: red">*</font> </b></td><td ><input type="text" name="iss_no"  style="font-weight: bold; font-family: calibri"  size="10" ></td></tr><tr><td style="color: #000;width: 25%;font-size: 20px"><b>Amendment No.</b></td><td style="color: #000;width: 25%;font-size: 20px"><input type="text" name="am_no" id="am_no" style="font-weight: bold; font-family: calibri"  size="10" ></td><td style="color: #000;width: 25%;font-size: 20px"><b>Amendment Date.</b></td><td style="color: #000;width: 25%;font-size: 20px"><input type="checkbox" name="am_date" value=" <?php date_default_timezone_set('Asia/Kolkata');
                                    echo date('d-m-Y');
                                    ?>" style="font-weight: bold; font-family: calibri"></td></tr> 
                                    <tr style="height: 50"><td style="color: #000;width: 25%;font-size: 20px"><b> Amendment Made <font style="color: red">*</font></b> </td><td style="color: #000;width: 25%;font-size: 20px"><textarea  name="a_made" cols="30" rows="2" style="font-weight: bold; font-family: calibri;" required ></textarea>
                                        <td style="color: #000;width: 25%;font-size: 20px"><b>Reasons of Amendment<font style="color: red">*</font> </b>  </td><td style="color: #000;width: 25%;font-size: 20px"><textarea  name="reason" cols="30" rows="2" style="font-weight: bold; font-family: calibri;" required></textarea></td></tr> 
                                    <tr style="height: 50"><td style="color: #000;width: 25%;font-size: 20px"><b>File Upload in word <font style="color: red">*</font> </b>  </td><td style="color: #000;width: 25%;font-size: 20px"><input type="file" name="file" style="font-weight: bold; font-family: calibri;" required></td>
                                        <td style="color: #000;width: 25%;font-size: 20px"><b>File Upload in pdf<font style="color: red">*</font> </b>  </td><td style="color: #000;width: 25%;font-size: 20px"><input type="file" name="file1" style="font-weight: bold; font-family: calibri;" required></td></tr></table>
                                <br><center>  <input type="submit" name="submit1" value="Save Details" style="font-weight: bold; font-family: calibri; font-size:15px;height: 30px;width: 10%" >
                                </center>  </form>   
                        
                </div><?php }?>
                   
                </div>
       
        </body></html>