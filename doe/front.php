<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['uname'])) {
    header('Location:index.php');
}
?><html>
    <head>
        <link rel="stylesheet" href="sty.css">
        <script src="js/highcharts.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery-1.12.4.js"></script>  
        <link rel="stylesheet" href="js/datep.css">
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/datepick.js"></script>
        <script src="js/datepicker.js"></script>
        <style>
            a,table{
                font-family: Century Schoolbook;
            }
            .td{
                font-size: 15px;
                height: 30;
                border-top:  2px ridge white ;
                font-family: Century Schoolbook;
            }

            th{
                height: 30; 
                font-family: Century Schoolbook;
            }

        </style>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            $(function () {
                $("#tabs").tabs();
            });
            $(function () {
                $("#id01").tabs();
            });
            $(function () {
                $("#tabsaa").tabs();
            });
        </script>
    </head>
    <body id="body">
        <?php include './head.php'; ?>

        <div id="tabsaa" class="div" style="padding: 0px;border: none;background-color: inherit;width: 100%" >
            <ul id='dis' >
                <?php if ($_SESSION['uname'] == "latha") { ?>    <li><a href="#tabsaa-1" id='dis' style="font-size: 15px; font-family: Century Schoolbook;">Dashboard</a></li>
                <?php } ?>
                <?php if ($_SESSION['uname'] == "chairman") { ?>    <li><a href="#tabsaa-3" id='dis' style="font-size: 15px; font-family: Century Schoolbook;">Dashboard</a></li>
                <?php } ?>
                 <?php if ($_SESSION['uname'] == "sundar") { ?>    <li><a href="#tabsaa-4" id='dis' style="font-size: 15px; font-family: Century Schoolbook;">Dashboard</a></li>
                <?php } ?>
                  <?php if ($_SESSION['uname'] == "chithra") { ?>    <li><a href="#tabsaa-5" id='dis' style="font-size: 15px; font-family: Century Schoolbook;">Dashboard</a></li>
                <?php } ?>
                   <?php if ($_SESSION['uname'] == "thiru") { ?>    <li><a href="#tabsaa-6" id='dis' style="font-size: 15px; font-family: Century Schoolbook;">Dashboard</a></li>
                <?php } ?>
                    <?php if ($_SESSION['uname'] == "malar") { ?>    <li><a href="#tabsaa-7" id='dis' style="font-size: 15px; font-family: Century Schoolbook;">Dashboard</a></li>
                <?php } ?>
                    <?php if ($_SESSION['uname'] == "sridhar") { ?>    <li><a href="#tabsaa-8" id='dis' style="font-size: 15px; font-family: Century Schoolbook;">Dashboard</a></li>
                <?php } ?>
                    <li><a href="#myChart" id='dis' style="font-size: 15px; font-family: Century Schoolbook;padding: 0px"><img src="images/Hom.jpg" height="35" width="80%" ></a></li>
                <a href="logout.php" id='dis' style="font-size: 15px; font-family: Century Schoolbook;;float: right"> <button><b>Logout</b> </button> </a>   
            </ul> 
            <center><h2  style="font-size: 20px;width: 100%"> TECHNICAL ENGLISH AND COMMUNICATIVE ENGLISH</h2>

            </center> 


            <div id='myChart' style="position: absolute; width: 50%;top: 0"   >
            </div>
            <div id='myChart1' style="float: right;position: relative; width: 50%;top: 0"   >
            </div>

            <script>
                var myConfig = {
                    "type": "ring3d",
                    "background-color": "url('images/background.jpg')",
                    "legend": {
                        "max-items": 0,
                        "overflow": "hidden"
                    },
                    "plotarea": {
                        "margin-right": "90%",
                        "margin-top": "0%"

                    },
                    "plot": {
                        "animation": {
                            "on-legend-toggle": false, //set to true to show animation and false to turn off


                        },
                        "value-box": {
                            "text": "%t",
                            "font-size": 15,
                            "font-family": "Century Schoolbook",
                            "font-weight": "bold",
                            "placement": "in",
                            "font-color": "WHITE"


                        },
                        "tooltip": {
                            "text": "Technical English",
                            "font-color": "black",
                            "font-family": "Century Schoolbook",
                            "font-size": "45px",
                            "text-alpha": 2,
                            "background-color": "white",
                            "border-width": 2,
                            "border-color": "#cccccc",
                            "line-style": "solid",
                            "border-radius": "10px",
                            "placement": "node:center"

                        },
                        "border-width": 1,
                        "border-color": "black   ",
                        "line-style": "solid",
                    },
                    "series": [
                        {
                            "values": [200],
                            "background-color": "rgb(113,139,220)",
                            "text": "UNIT-I",
                        },
                        {
                            "values": [200],
                            "background-color": "rgb(95,162,214)",
                            "text": "UNIT-II",
                        },
                        {
                            "values": [200],
                            "background-color": "rgb(113,139,150)",
                            "text": "UNIT-III",
                        },
                        {
                            "values": [200],
                            "background-color": "rgb(1,82,170)",
                            "text": "UNIT-IV",
                        },
                        {
                            "values": [200],
                            "background-color": "rgb(113,139,150)",
                            "text": "UNIT-V",
                        }

                    ]
                };
                zingchart.node_click = function (e) {
                    switch (e.plotindex) {
                        case 8:



                            break;
                        case 7:
                            window.open('procedure/index.php', '_self');

                            break;
                        case 6:
                            window.open('manual/q_manual.php', '_self');
                            break;
                        case 5:
                            window.open('record/checklist.php', '_self');
                            break;
                        case 4:
                            window.open('index1.php', '_self');
                            break;
                        case 3:
                            window.open('registers/index.php', '_self');
                            break;
                        case 2:

                            window.open('forms/index.php', '_self');
                            break;
                        case 1:
                            window.open('master/index.php', '_self');
                            break;
                        default:
                            window.open('TE_Unit_1.php', '_self');
                            break;
                    }
                }

                zingchart.render({
                    id: 'myChart',
                    data: myConfig,
                    height: 700,
                    width: "800%"

                });
                var myConfig = {
                    "type": "ring3d",
                    "background-color": "url('images/background.jpg')",
                    "legend": {
                        "max-items": 0,
                        "overflow": "hidden"
                    },
                    "plotarea": {
                        "margin-right": "90%",
                        "margin-top": "0%"

                    },
                    "plot": {
                        "animation": {
                            "on-legend-toggle": false, //set to true to show animation and false to turn off


                        },
                        "value-box": {
                            "text": "%t",
                            "font-size": 15,
                            "font-family": "Century Schoolbook",
                            "font-weight": "bold",
                            "placement": "in",
                            "font-color": "WHITE"


                        },
                        "tooltip": {
                            "text": "Communicative English",
                            "font-color": "black",
                            "font-family": "Century Schoolbook",
                            "font-size": "45px",
                            "text-alpha": 2,
                            "background-color": "white",
                            "border-width": 2,
                            "border-color": "#cccccc",
                            "line-style": "solid",
                            "border-radius": "10px",
                            "placement": "node:center"

                        },
                        "border-width": 1,
                        "border-color": "black   ",
                        "line-style": "solid",
                    },
                    "series": [
                        
                        {
                            "values": [200],
                            "background-color": "rgb(113,139,220)",
                            "text": "UNIT-I",
                        },
                        {
                            "values": [200],
                            "background-color": "rgb(95,162,214)",
                            "text": "UNIT-II",
                        },
                        {
                            "values": [200],
                            "background-color": "rgb(113,139,150)",
                            "text": "UNIT-III",
                        },
                        {
                            "values": [200],
                            "background-color": "rgb(1,82,170)",
                            "text": "UNIT-IV",
                        },
                        {
                            "values": [200],
                            "background-color": "rgb(113,139,150)",
                            "text": "UNIT-V",
                        }

                    ]
                };
                zingchart.node_click = function (e) {
                    switch (e.plotindex) {
                        case 8:



                            break;
                        case 7:
                            window.open('procedure/index.php', '_self');

                            break;
                        case 6:
                            window.open('manual/q_manual.php', '_self');
                            break;
                        case 5:
                            window.open('record/checklist.php', '_self');
                            break;
                        case 4:
                            window.open('index1.php', '_self');
                            break;
                        case 3:
                            window.open('registers/index.php', '_self');
                            break;
                        case 2:

                            window.open('forms/index.php', '_self');
                            break;
                        case 1:
                            window.open('master/index.php', '_self');
                            break;
                        default:
                            window.open('TE_Unit_1.php', '_self');
                            break;
                    }
                }
                zingchart.render({
                    id: 'myChart1',
                    data: myConfig,
                    height: 700,
                    width: "800%"

                });
            </script> 
            <?php if ($_SESSION['uname'] == "latha") { ?>     <div id="tabsaa-1">

                    <center><table style="border: ridge;width: 70%;background-color: white" >
                            <tr ><th style="color: #990000;border:2 px outset;font-size: 15px; text-align: center"><b >TO BE APPROVED</b></th></tr>
                            <?php
                            $sql = mysqli_query($conn, "select  * from  qual_manual  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {


                                echo " <tr><td class=td ><a href='manual/q_manual.php' >Quality Manual</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql = mysqli_query($conn, "select  * from  u_test  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {


                                echo " <tr><td class=td ><a href='procedure/testing.php' >Quality Procedure - Testing of underwater acoustic transducers</a></td></tr>";
                            }
                            ?>                    
                            <?php
                            $sql1 = mysqli_query($conn, "select  * from master_list  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql1)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='master/quality.php' >Master List - Quality Records</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql2 = mysqli_query($conn, "select  * from master_list1  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql2)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='master/lab.php' >Master List - Documents Maintained By the Lab</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql3 = mysqli_query($conn, "select  * from master_list2  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql3)) {





                                echo "   <tr><td class=td ><a href='master/equipment.php' >Master List - Equipment For Test/ Calibration</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql4 = mysqli_query($conn, "select  * from  form_certificate  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql4)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_certificate.php' >Forms Formats - Calibration Certificate</a></td></tr>";
                            }
                            ?>

                            <?php
                            $sql5 = mysqli_query($conn, "select  * from  form_closurereport  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql5)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_closurereport.php' >Forms Formats - Non Conformance Closure Report</a></td></tr>";
                            }
                            ?>

                            <?php
                            $sql6 = mysqli_query($conn, "select  * from  form_complaints  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql6)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_complaints.php' >Forms Formats - Complaints Form</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql7 = mysqli_query($conn, "select  * from  form_control  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql7)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_control.php' >Forms Formats - Control of non-conforming testing / calibration work</a></td></tr>";
                            }
                            ?>

                            <?php
                            $sql8 = mysqli_query($conn, "select  * from  form_corrective  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql8)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_corrective.php' >Forms Formats - Corrective and preventive action</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql9 = mysqli_query($conn, "select  * from  form_feedback  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql9)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_feedback.php' >Forms Formats - Training Feedback and Evaluation Form</a></td></tr>";
                            }
                            ?>  
                            <?php
                            $sql10 = mysqli_query($conn, "select  * from  form_internal  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql10)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_internal.php' >Forms Formats - Internal quality audit non conformity form</a></td></tr>";
                            }
                            ?>   
                            <?php
                            $sql11 = mysqli_query($conn, "select  * from  form_internalreport  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql11)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_internalreport.php' >Forms Formats - Internal audit summary report</a></td></tr>";
                            }
                            ?>   

                            <?php
                            $sql12 = mysqli_query($conn, "select  * from  form_minutes  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql12)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_minutes.php' >Forms Formats - Requisition for Testing of underwater acoustic transducers</a></td></tr>";
                            }
                            ?>   
                            <?php
                            $sql13 = mysqli_query($conn, "select  * from  form_req  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql13)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_req.php' >Forms Formats - Requisition for Calibration of underwater acoustic transducers</a></td></tr>";
                            }
                            ?>   
                            <?php
                            $sql14 = mysqli_query($conn, "select  * from  form_report  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql14)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_report.php' >Forms Formats - Test Report</a></td></tr>";
                            }
                            ?>                

                            <?php
                            $sql15 = mysqli_query($conn, "select  * from  assure  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql15)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/assure.php' >Quality Procedure - Assuring the quality of test and calibration results</a></td></tr>";
                            }
                            ?>                
                            <?php
                            $sql16 = mysqli_query($conn, "select  * from  atps  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql16)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/atps.php' >Quality Procedure - Maintenance of ATPS, crane and water tank</a></td></tr>";
                            }
                            ?>               
                            <?php
                            $sql17 = mysqli_query($conn, "select  * from  u_calib  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql17)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/calib.php' >Quality Procedure - Calibration of underwater acoustic transducers</a></td></tr>";
                            }
                            ?>               
                            <?php
                            $sql18 = mysqli_query($conn, "select  * from  complaint  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql18)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/complaint.php' >Quality Procedure - Customer Complaint</a></td></tr>";
                            }
                            ?>                     
                            <?php
                            $sql19 = mysqli_query($conn, "select  * from  docum  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql19)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/document.php' >Quality Procedure - Control of documents and records</a></td></tr>";
                            }
                            ?>                
                            <?php
                            $sql20 = mysqli_query($conn, "select  * from  ep  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql20)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/ep.php' >Quality Procedure - Monitoring Environmental Parameters</a></td></tr>";
                            }
                            ?>               
                            <?php
                            $sql21 = mysqli_query($conn, "select  * from  hand  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql21)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/hand.php' >Quality Procedure - Handling of standards and calibration/test items</a></td></tr>";
                            }
                            ?>             

                            <?php
                            $sql22 = mysqli_query($conn, "select  * from  nonconforming  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql22)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/nonconforming.php' >Quality Procedure - Control of nonconforming testing and calibration</a></td></tr>";
                            }
                            ?>               
                            <?php
                            $sql23 = mysqli_query($conn, "select  * from  preventive  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql23)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/preventive.php' >Quality Procedure - Corrective and preventive action</a></td></tr>";
                            }
                            ?>   

                            <?php
                            $sql24 = mysqli_query($conn, "select  * from  purchase  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql24)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/purchase.php' >Quality Procedure - Purchasing, Services and Supplies</a></td></tr>";
                            }
                            ?>   
                            <?php
                            $sql25 = mysqli_query($conn, "select  * from  review  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql25)) {

                                // $count=count($status);




                                echo "<tr><td class=td ><a href='procedure/review.php' >Quality Procedure - Review of requests, tenders and contracts</a></td></tr>";
                            }
                            ?> 


                            <?php
                            $sql26 = mysqli_query($conn, "select  * from  training  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql26)) {





                                echo "   <tr><td class=td ><a href='procedure/training.php' >Quality Procedure - Training</a></td></tr>";
                            }
                            ?>           
                            <?php
                            $sql = mysqli_query($conn, "select  * from  cali_in_outward  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/cali_in_outward.php' >Register Formats - Calibration equipment inward - outward register</a></td></tr>";
                            }
                            ?>                 
                            <?php
                            $sql = mysqli_query($conn, "select  * from  cali_log  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/cali_log.php' >Register Formats - Calibration Log</a></td></tr>";
                            }
                            ?>                     
                            <?php
                            $sql = mysqli_query($conn, "select  * from  epr_lf  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/epr_lf.php' >Register Formats - Environmental parameter register - LF</a></td></tr>";
                            }
                            ?>                        

                            <?php
                            $sql = mysqli_query($conn, "select  * from  epr_uat  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/epr_uat.php' >Register Formats - Environmental parameter register - UAT</a></td></tr>";
                            }
                            ?>                        

                            <?php
                            $sql = mysqli_query($conn, "select  * from  in_out_uat  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/in_out_uat.php' >Register Formats - Inward / Outward -UAT</a></td></tr>";
                            }
                            ?>               

                            <?php
                            $sql = mysqli_query($conn, "select  * from  mr_atps  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/mr_atps.php' >Register Formats - Maintenance Register - ATPS</a></td></tr>";
                            }
                            ?>                      
                            <?php
                            $sql = mysqli_query($conn, "select  * from  mr_eot  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/mr_eot.php' >Register Formats - Maintenance Register - EOT Crane</a></td></tr>";
                            }
                            ?>                  
                            <?php
                            $sql = mysqli_query($conn, "select  * from  std_hydro  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/std_hydro.php' >Register Formats - Standard Hydrophone Calibration Log</a></td></tr>";
                            }
                            ?>                    
                            <?php
                            $sql = mysqli_query($conn, "select  * from  test_log  where  status='Waiting'&& status1='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/test_log.php' >Register Formats - Test Log</a></td></tr>";
                            }
                            ?>  
                            <?php
                            $sql = mysqli_query($conn, "select  distinct year  from  conformity  where  TMApproval=''");
                            while ($row = mysqli_fetch_array($sql)) {

                                $yea = $row['year'];




                                echo "   <tr><td class=td ><a href='record/closure.php?id=$yea' >Internal Quality Audit - Non Conformance Closure Report</a></td></tr>";
                            }
                            ?> 
<?php
                                    $sql1 = mysqli_query($conn, "select * from training_record where dur IS NULL && knowledge IS NULL &&  way IS NULL && prior IS NULL && apply IS NULL &&   suggestions IS NULL &&   fd_date IS NULL && name='Dr. G. Latha' && feed='Yes'");
                                    while ($row = mysqli_fetch_array($sql1)) {

                                          $name = $row['name'];
                                            $description= $row['description'];
                                        echo "   <tr><td class=td ><a href='training/feedback.php?id=" . $row['description'] . "&name=" . $row['name'] . "' name='document' >Training Feedback Form</a></td></tr>";
                                    }
                                    ?>



                        </table></center>
                </div><?php } ?>
            <?php if ($_SESSION['uname'] == "chairman") { ?>     <div id="tabsaa-3">  <center><table style="border: ridge;width: 70%;background-color: white" >
                            <tr ><th style="color: #990000;border:2 px outset;font-size: 15px; text-align: center"><b >TO BE APPROVED</b></th></tr>
                                    <?php
                                    $sql = mysqli_query($conn, "select  distinct year  from  conformity  where  Chairman_Approval=''");
                                    while ($row = mysqli_fetch_array($sql)) {

                                        $yea = $row['year'];




                                        echo "   <tr><td class=td ><a href='record/closure.php?id=$yea' >Internal Quality Audit - Non Conformance Closure Report</a></td></tr>";
                                    }
                                    ?> </table></center></div><?php } ?>
              <?php if ($_SESSION['uname'] == "sundar") { ?>     <div id="tabsaa-4">  <center><table style="border: ridge;width: 70%;background-color: white" >
                            <tr ><th style="color: #990000;border:2 px outset;font-size: 15px; text-align: center"><b >TO BE APPROVED</b></th></tr>
                                    <?php
                                    $sql = mysqli_query($conn, "select  *  from  conformity  where  completed_date='' && auditor='R. Sundar'");
                                    while ($row = mysqli_fetch_array($sql)) {

                                        $ref = $row['ref'];




                                        echo "   <tr><td class=td ><a href='record/auditt.php?id=$ref' >Internal Quality Audit - Non Conformity Report</a></td></tr>";
                                    }
                                    ?>
                      <?php
                                    $sql1 = mysqli_query($conn, "select * from training_record where dur IS NULL && knowledge IS NULL &&  way IS NULL && prior IS NULL && apply IS NULL &&   suggestions IS NULL &&   fd_date IS NULL && name='R. Sundar' && feed='Yes'");
                                    while ($row = mysqli_fetch_array($sql1)) {
                                          $name = $row['name'];
                                            $description= $row['description'];
                                        echo "   <tr><td class=td ><a href='training/feedback.php?id=" . $row['description'] . "&name=" . $row['name'] . "' name='document' >Training Feedback Form</a></td></tr>";
                                    }
                                    ?>
</table></center></div><?php } ?>
              <?php if ($_SESSION['uname'] == "chithra") { ?>     <div id="tabsaa-5">  <center><table style="border: ridge;width: 70%;background-color: white" >
                            <tr ><th style="color: #990000;border:2 px outset;font-size: 15px; text-align: center"><b >TO BE APPROVED</b></th></tr>
                                    <?php
                                    $sql = mysqli_query($conn, "select  *  from  conformity  where  completed_date='' && auditor='K. Chithra'");
                                    while ($row = mysqli_fetch_array($sql)) {

                                        $ref = $row['ref'];




                                        echo "   <tr><td class=td ><a href='record/auditt.php?id=$ref' >Internal Quality Audit - Non Conformity Report</a></td></tr>";
                                    }
                                    ?> 
                        <?php
                                    $sql1 = mysqli_query($conn, "select * from training_record where dur IS NULL && knowledge IS NULL &&  way IS NULL && prior IS NULL && apply IS NULL &&   suggestions IS NULL &&   fd_date IS NULL && name='K. Chithra' && feed='Yes'");
                                    while ($row = mysqli_fetch_array($sql1)) {

                                          $name = $row['name'];
                                            $description= $row['description'];




                                        echo "   <tr><td class=td ><a href='training/feedback.php?id=" . $row['description'] . "&name=" . $row['name'] . "' name='document' >Training Feedback Form</a></td></tr>";
                                    }
                                    ?></table></center></div><?php } ?>
            <?php if ($_SESSION['uname'] == "thiru") { ?>     <div id="tabsaa-6">  <center><table style="border: ridge;width: 70%;background-color: white" >
                            <tr ><th style="color: #990000;border:2 px outset;font-size: 15px; text-align: center"><b >TO BE APPROVED</b></th></tr>
                                    <?php
                                    $sql = mysqli_query($conn, "select  *  from  conformity  where  completed_date='' && auditor='A.Thirunavukkarasu'");
                                    while ($row = mysqli_fetch_array($sql)) {

                                        $ref = $row['ref'];




                                        echo "   <tr><td class=td ><a href='record/auditt.php?id=$ref' >Internal Quality Audit - Non Conformity Report</a></td></tr>";
                                    }
                                    ?>
                       <?php
                                    $sql1 = mysqli_query($conn, "select * from training_record where dur IS NULL && knowledge IS NULL &&  way IS NULL && prior IS NULL && apply IS NULL &&   suggestions IS NULL &&   fd_date IS NULL && name='A.Thirunavukkarasu' && feed='Yes'");
                                    while ($row = mysqli_fetch_array($sql1)) {

                                          $name = $row['name'];
                                            $description= $row['description'];




                                        echo "   <tr><td class=td ><a href='training/feedback.php?id=" . $row['description'] . "&name=" . $row['name'] . "' name='document' >Training Feedback Form</a></td></tr>";
                                    }
                                    ?></table></center></div><?php } ?>
              <?php if ($_SESSION['uname'] == "malar") { ?>     <div id="tabsaa-7">  <center><table style="border: ridge;width: 70%;background-color: white" >
                            <tr ><th style="color: #990000;border:2 px outset;font-size: 15px; text-align: center"><b >TO BE APPROVED</b></th></tr>
                                    <?php
                                    $sql = mysqli_query($conn, "select  distinct year  from  conformity  where  fdaate!='' && incharge='A.Malarkodi' && QMApproval='' ");
                                    while ($row = mysqli_fetch_array($sql)) {

                                        $year= $row['year'];
                                        echo "   <tr><td class=td ><a href='record/closure.php?id=$year' >Internal Quality Audit - Non Conformity Report</a></td></tr>";
                                    }
                                    ?>
                       <?php
                                    $sql = mysqli_query($conn, "select  *  from  training  where status='Approved' && issued_date='Waiting' ");
                                    while ($row = mysqli_fetch_array($sql)) {
                                       
                                        echo "   <tr><td class=td ><a href='procedure/training.php' >QUALITY PROCEDURE - TRAINING - ATF-QP-6200-1</a></td></tr>";
                                    }
                                    ?>
                      <?php
                            $sql = mysqli_query($conn, "select  * from  qual_manual  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {


                                echo " <tr><td class=td ><a href='manual/q_manual.php' >Quality Manual</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql = mysqli_query($conn, "select  * from  u_test  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {


                                echo " <tr><td class=td ><a href='procedure/testing.php' >Quality Procedure - Testing of underwater acoustic transducers</a></td></tr>";
                            }
                            ?>                    
                            <?php
                            $sql1 = mysqli_query($conn, "select  * from master_list  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql1)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='master/quality.php' >Master List - Quality Records</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql2 = mysqli_query($conn, "select  * from master_list1  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql2)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='master/lab.php' >Master List - Documents Maintained By the Lab</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql3 = mysqli_query($conn, "select  * from master_list2  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql3)) {





                                echo "   <tr><td class=td ><a href='master/equipment.php' >Master List - Equipment For Test/ Calibration</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql4 = mysqli_query($conn, "select  * from  form_certificate  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql4)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_certificate.php' >Forms Formats - Calibration Certificate</a></td></tr>";
                            }
                            ?>

                            <?php
                            $sql5 = mysqli_query($conn, "select  * from  form_closurereport  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql5)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_closurereport.php' >Forms Formats - Non Conformance Closure Report</a></td></tr>";
                            }
                            ?>

                            <?php
                            $sql6 = mysqli_query($conn, "select  * from  form_complaints  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql6)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_complaints.php' >Forms Formats - Complaints Form</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql7 = mysqli_query($conn, "select  * from  form_control  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql7)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_control.php' >Forms Formats - Control of non-conforming testing / calibration work</a></td></tr>";
                            }
                            ?>

                            <?php
                            $sql8 = mysqli_query($conn, "select  * from  form_corrective  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql8)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_corrective.php' >Forms Formats - Corrective and preventive action</a></td></tr>";
                            }
                            ?>
                            <?php
                            $sql9 = mysqli_query($conn, "select  * from  form_feedback  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql9)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_feedback.php' >Forms Formats - Training Feedback and Evaluation Form</a></td></tr>";
                            }
                            ?>  
                            <?php
                            $sql10 = mysqli_query($conn, "select  * from  form_internal  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql10)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_internal.php' >Forms Formats - Internal quality audit non conformity form</a></td></tr>";
                            }
                            ?>   
                            <?php
                            $sql11 = mysqli_query($conn, "select  * from  form_internalreport  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql11)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_internalreport.php' >Forms Formats - Internal audit summary report</a></td></tr>";
                            }
                            ?>   

                            <?php
                            $sql12 = mysqli_query($conn, "select  * from  form_minutes  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql12)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_minutes.php' >Forms Formats - Requisition for Testing of underwater acoustic transducers</a></td></tr>";
                            }
                            ?>   
                            <?php
                            $sql13 = mysqli_query($conn, "select  * from  form_req  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql13)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_req.php' >Forms Formats - Requisition for Calibration of underwater acoustic transducers</a></td></tr>";
                            }
                            ?>   
                            <?php
                            $sql14 = mysqli_query($conn, "select  * from  form_report  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql14)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='forms/form_report.php' >Forms Formats - Test Report</a></td></tr>";
                            }
                            ?>                

                            <?php
                            $sql15 = mysqli_query($conn, "select  * from  assure  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql15)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/assure.php' >Quality Procedure - Assuring the quality of test and calibration results</a></td></tr>";
                            }
                            ?>                
                            <?php
                            $sql16 = mysqli_query($conn, "select  * from  atps  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql16)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/atps.php' >Quality Procedure - Maintenance of ATPS, crane and water tank</a></td></tr>";
                            }
                            ?>               
                            <?php
                            $sql17 = mysqli_query($conn, "select  * from  u_calib  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql17)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/calib.php' >Quality Procedure - Calibration of underwater acoustic transducers</a></td></tr>";
                            }
                            ?>               
                            <?php
                            $sql18 = mysqli_query($conn, "select  * from  complaint  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql18)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/complaint.php' >Quality Procedure - Customer Complaint</a></td></tr>";
                            }
                            ?>                     
                            <?php
                            $sql19 = mysqli_query($conn, "select  * from  docum  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql19)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/document.php' >Quality Procedure - Control of documents and records</a></td></tr>";
                            }
                            ?>                
                            <?php
                            $sql20 = mysqli_query($conn, "select  * from  ep  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql20)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/ep.php' >Quality Procedure - Monitoring Environmental Parameters</a></td></tr>";
                            }
                            ?>               
                            <?php
                            $sql21 = mysqli_query($conn, "select  * from  hand  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql21)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/hand.php' >Quality Procedure - Handling of standards and calibration/test items</a></td></tr>";
                            }
                            ?>             

                            <?php
                            $sql22 = mysqli_query($conn, "select  * from  nonconforming  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql22)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/nonconforming.php' >Quality Procedure - Control of nonconforming testing and calibration</a></td></tr>";
                            }
                            ?>               
                            <?php
                            $sql23 = mysqli_query($conn, "select  * from  preventive  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql23)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/preventive.php' >Quality Procedure - Corrective and preventive action</a></td></tr>";
                            }
                            ?>   

                            <?php
                            $sql24 = mysqli_query($conn, "select  * from  purchase  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql24)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='procedure/purchase.php' >Quality Procedure - Purchasing, Services and Supplies</a></td></tr>";
                            }
                            ?>   
                            <?php
                            $sql25 = mysqli_query($conn, "select  * from  review  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql25)) {

                                // $count=count($status);




                                echo "<tr><td class=td ><a href='procedure/review.php' >Quality Procedure - Review of requests, tenders and contracts</a></td></tr>";
                            }
                            ?> 


                            <?php
                            $sql26 = mysqli_query($conn, "select  * from  training  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql26)) {





                                echo "   <tr><td class=td ><a href='procedure/training.php' >Quality Procedure - Training</a></td></tr>";
                            }
                            ?>           
                            <?php
                            $sql = mysqli_query($conn, "select  * from  cali_in_outward  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/cali_in_outward.php' >Register Formats - Calibration equipment inward - outward register</a></td></tr>";
                            }
                            ?>                 
                            <?php
                            $sql = mysqli_query($conn, "select  * from  cali_log  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/cali_log.php' >Register Formats - Calibration Log</a></td></tr>";
                            }
                            ?>                     
                            <?php
                            $sql = mysqli_query($conn, "select  * from  epr_lf  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/epr_lf.php' >Register Formats - Environmental parameter register - LF</a></td></tr>";
                            }
                            ?>                        

                            <?php
                            $sql = mysqli_query($conn, "select  * from  epr_uat  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/epr_uat.php' >Register Formats - Environmental parameter register - UAT</a></td></tr>";
                            }
                            ?>                        

                            <?php
                            $sql = mysqli_query($conn, "select  * from  in_out_uat  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/in_out_uat.php' >Register Formats - Inward / Outward -UAT</a></td></tr>";
                            }
                            ?>               

                            <?php
                            $sql = mysqli_query($conn, "select  * from  mr_atps  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/mr_atps.php' >Register Formats - Maintenance Register - ATPS</a></td></tr>";
                            }
                            ?>                      
                            <?php
                            $sql = mysqli_query($conn, "select  * from  mr_eot  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/mr_eot.php' >Register Formats - Maintenance Register - EOT Crane</a></td></tr>";
                            }
                            ?>                  
                            <?php
                            $sql = mysqli_query($conn, "select  * from  std_hydro  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/std_hydro.php' >Register Formats - Standard Hydrophone Calibration Log</a></td></tr>";
                            }
                            ?>                    
                            <?php
                            $sql = mysqli_query($conn, "select  * from  test_log  where  status='Approved' && issued_date='Waiting'");
                            while ($row = mysqli_fetch_array($sql)) {

                                // $count=count($status);




                                echo "   <tr><td class=td ><a href='register/test_log.php' >Register Formats - Test Log</a></td></tr>";
                            }
                            ?>
                             <?php
                                    $sql1 = mysqli_query($conn, "select * from training_record where dur IS NULL && knowledge IS NULL &&  way IS NULL && prior IS NULL && apply IS NULL &&   suggestions IS NULL &&   fd_date IS NULL && name='A. Malarkodi' && feed='Yes'");
                                    while ($row = mysqli_fetch_array($sql1)) {

                                          $name = $row['name'];
                                            $description= $row['description'];




                                        echo "   <tr><td class=td ><a href='training/feedback.php?id=" . $row['description'] . "&name=" . $row['name'] . "' name='document' >Training Feedback Form</a></td></tr>";
                                    }
                                    ?>
                             <?php
                                    $sql1 = mysqli_query($conn, "select * from training_record where (dur !='' || knowledge !='' ||  way !='' || prior !='' || apply !=''  ||   fd_date !='')&& (purpose IS NULL && present IS NULL  && scope IS NULL &&monotor IS NULL &&ev_date IS NULL )&& evalu='Yes'");
                                    while ($row = mysqli_fetch_array($sql1)) {

                                          $name = $row['name'];
                                            $description= $row['description'];




                                        echo "   <tr><td class=td ><a href='training/evaluation.php?id=" . $row['description'] . "&name=" . $row['name'] . "' name='document' >Training Evaluation Form  -      ".$row['name']."</a></td></tr>";
                                    }
                                    ?>
</table></center></div><?php } ?>
              <?php if ($_SESSION['uname'] == "sridhar") { ?>     <div id="tabsaa-8">  <center><table style="border: ridge;width: 70%;background-color: white" >
                            <tr ><th style="color: #990000;border:2 px outset;font-size: 15px; text-align: center"><b >TO BE APPROVED</b></th></tr>
                                    <?php
                                    $sql = mysqli_query($conn, "select  *  from  conformity  where  completed_date='' && auditor='A.Thirunavukkarasu'");
                                    while ($row = mysqli_fetch_array($sql)) {

                                        $ref = $row['ref'];




                                        echo "   <tr><td class=td ><a href='record/auditt.php?id=$ref' >Internal Quality Audit - Non Conformity Report</a></td></tr>";
                                    }
                                    ?>
                      <?php
                                    $sql1 = mysqli_query($conn, "select * from training_record where dur IS NULL && knowledge IS NULL &&  way IS NULL && prior IS NULL && apply IS NULL &&   suggestions IS NULL &&   fd_date IS NULL && name='P.S.S.R. Sridhar' && feed='Yes'");
                                    while ($row = mysqli_fetch_array($sql1)) {
                                          $name = $row['name'];
                                            $description= $row['description'];
                                        echo "   <tr><td class=td ><a href='training/feedback.php?id=" . $row['description'] . "&name=" . $row['name'] . "' name='document' >Training Feedback Form</a></td></tr>";
                                    }
                                    ?>
</table></center></div><?php } ?>

        </div></body>
</html>
