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
      <?php include './header.php'; ?>

       <div id="tabsaa" class="div" style="padding: 0px;border: none;background-color: inherit;width: 100%" >
                <ul id='dis' >
                      <li><a href="#myChart" id='dis' style="font-size: 15px">Front Page</a></li>
                   <li><a href="#tabsaa-1" id='dis' style="font-size: 15px">Dashboard</a></li>
                  

                </ul> <button id="dis" style="float: right" ><a href="logout.php" id='dis' style="font-size: 20px;font-family: calibri;float: right"><b>Logout</b></a></button>       
            <center><h2 class = "engraved" style="font-size: 30px;width: 100%"> LABORATORY QUALITY MANAGEMENT SYSTEM</h2>

            </center> 
           
               
           <div id='myChart' style="position: absolute; width: 100%"   >
          </div>
        
        <script>
        var myConfig = {
 "type":"ring3d",
 "background-color":"url('images/background.jpg')",
  
  "legend":{ 
     "max-items" : 0,
    "overflow" : "hidden" 
  },
  	
  "plotarea":{
    "margin-right":"90%",
    "margin-top":"5%"
    
  },
  "plot":{
    "animation":{
 	    "on-legend-toggle": false, //set to true to show animation and false to turn off
 	   
          
    },
    "value-box":{
      "text":"%t",
      "font-size":18,
      "font-family":"Calibri",
      "font-weight":"normal",
          "placement":"in",
          "font-color":"WHITE"
         
          
    },
    
    "tooltip":{
      "text":"ATF",
      "font-color":"black",
      "font-family":"calibri",
      "font-size":"45px",
      "text-alpha":2,
      "background-color":"white",
    
      "border-width":2,
      "border-color":"#cccccc",
      "line-style":"solid",
      "border-radius":"10px",
    
      "placement":"node:center"
    
    },
    "border-width":1,
    "border-color":"black   ",
    "line-style":"solid",
   
  },
  
  "series":[
    {
      "values":[250],
      "background-color":"rgb(8,122,175)",
      "text":"EQUIPMENT \n RECORD",
      
    
     
    },
    {
      "values":[250],
      "background-color":"rgb(95,162,214)",
      "text":"MASTER \n LIST",
      
    },
    {
      "values":[250],
      "background-color":"rgb(113,139,166)",
      "text":"FORMS",
      
    },
    {
      "values":[250],
      "background-color":"rgb(113,139,220)",
      "text":"REGISTERS",
      
    },
    {
      "values":[250],
      "background-color":"rgb(1,82,170)",
      "text":"QUALITY \n MANUAL",
      
    },
    {
      "values":[250],
      "background-color":"rgb(113,139,150)",
      "text":"QUALITY \n PROCEDURE",
     
    }
  ]
};
zingchart.node_click = function(e) {
  switch(e.plotindex) {
     case 6:
      window.open('forms/home.php', '_self');
      break;
  case 5:
      window.open('procedure/home.php', '_self');
      break;
            case 4:
      window.open('quality_manual.php', '_self');
      break;
    case 3:
      window.open('register/home.php', '_self');
      break;
    case 2:
      window.open('forms/home.php', '_self');
      break;
    case 1:
      window.open('master/home.php', '_self');
      break;
    default:
      window.open('EquipmentRecord/index.php', '_self');
      break;
  }
}
 
zingchart.render({ 
	id : 'myChart', 
	data : myConfig, 
	height: 800,
	width: "800%" 
        
});
          </script> 
         <div id="tabsaa-1">

                <table style="border: ridge" >
                    <tr><th style="color: #990000;border:2 px outset;font-size: 20px; text-align: center"><b >TO BE APPROVED</b></th></tr>
                    <?php
                    $sql = mysqli_query($conn, "select  * from  u_test  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {


                        echo " <tr><td ><a href=''procedure/testing.php' >Testing of underwater acoustic transducers</a></td></tr>";
                    }
                    ?>                    
                    <?php
                    $sql1 = mysqli_query($conn, "select  * from master_list  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql1)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href=''master/quality.php' >Quality Records</a></td></tr>";
                    }
                    ?>
                    <?php
                    $sql2 = mysqli_query($conn, "select  * from master_list1  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql2)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='master/lab.php >Documents Maintained By the Lab</a></td></tr>";
                    }
                    ?>
                    <?php
                    $sql3 = mysqli_query($conn, "select  * from master_list2  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql3)) {





                        echo "   <tr><td ><a href='master/equipment.php >Equipment For Test/ Calibration</a></td></tr>";
                    }
                    ?>
                    <?php
                    $sql4 = mysqli_query($conn, "select  * from  form_certificate  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql4)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_certificate.php >Calibration Certificate</a></td></tr>";
                    }
                    ?>

                    <?php
                    $sql5 = mysqli_query($conn, "select  * from  form_closurereport  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql5)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_closurereport.php >Non Conformance Closure Report</a></td></tr>";
                    }
                    ?>

                    <?php
                    $sql6 = mysqli_query($conn, "select  * from  form_complaints  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql6)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_complaints.php >Complaints Form</a></td></tr>";
                    }
                    ?>
                    <?php
                    $sql7 = mysqli_query($conn, "select  * from  form_control  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql7)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_control.php >Control of non-conforming testing / calibration work</a></td></tr>";
                    }
                    ?>

                    <?php
                    $sql8 = mysqli_query($conn, "select  * from  form_corrective  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql8)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_corrective.php >Corrective and preventive action</a></td></tr>";
                    }
                    ?>
                    <?php
                    $sql9 = mysqli_query($conn, "select  * from  form_feedback  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql9)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_feedback.php >Training Feedback and Evaluation Form</a></td></tr>";
                    }
                    ?>  
                    <?php
                    $sql10 = mysqli_query($conn, "select  * from  form_internal  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql10)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_internal.php >Internal quality audit non conformity form</a></td></tr>";
                    }
                    ?>   
                    <?php
                    $sql11 = mysqli_query($conn, "select  * from  form_internalreport  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql11)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_internalreport.php >Internal audit summary report</a></td></tr>";
                    }
                    ?>   

                    <?php
                    $sql12 = mysqli_query($conn, "select  * from  form_minutes  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql12)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_minutes.php >Requisition for Testing of underwater acoustic transducers</a></td></tr>";
                    }
                    ?>   
                    <?php
                    $sql13 = mysqli_query($conn, "select  * from  form_req  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql13)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_req.php >Requisition for Calibration of underwater acoustic transducers</a></td></tr>";
                    }
                    ?>   
                    <?php
                    $sql14 = mysqli_query($conn, "select  * from  form_report  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql14)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='forms/form_report.php >Test Report</a></td></tr>";
                    }
                    ?>                

                    <?php
                    $sql15 = mysqli_query($conn, "select  * from  assure  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql15)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/assure.php >Assuring the quality of test and calibration results</a></td></tr>";
                    }
                    ?>                
                    <?php
                    $sql16 = mysqli_query($conn, "select  * from  atps  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql16)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/atps.php >Maintenance of ATPS, crane and water tank</a></td></tr>";
                    }
                    ?>               
                    <?php
                    $sql17 = mysqli_query($conn, "select  * from  u_calib  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql17)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/calib.php >Calibration of underwater acoustic transducers</a></td></tr>";
                    }
                    ?>               
                    <?php
                    $sql18 = mysqli_query($conn, "select  * from  complaint  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql18)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/complaint.php >Customer Complaint</a></td></tr>";
                    }
                    ?>                     
                    <?php
                    $sql19 = mysqli_query($conn, "select  * from  docum  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql19)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/document.php' >Control of documents and records</a></td></tr>";
                    }
                    ?>                
                    <?php
                    $sql20 = mysqli_query($conn, "select  * from  ep  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql20)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/ep.php >Monitoring Environmental Parameters</a></td></tr>";
                    }
                    ?>               
                    <?php
                    $sql21 = mysqli_query($conn, "select  * from  hand  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql21)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/hand.php >Handling of standards and calibration/test items</a></td></tr>";
                    }
                    ?>             

                    <?php
                    $sql22 = mysqli_query($conn, "select  * from  nonconforming  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql22)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/nonconforming.php >Control of nonconforming testing and calibration</a></td></tr>";
                    }
                    ?>               
                    <?php
                    $sql23 = mysqli_query($conn, "select  * from  preventive  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql23)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/preventive.php >Corrective and preventive action</a></td></tr>";
                    }
                    ?>   

                    <?php
                    $sql24 = mysqli_query($conn, "select  * from  purchase  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql24)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/purchase.php >Purchasing, Services and Supplies</a></td></tr>";
                    }
                    ?>   
                    <?php
                    $sql25 = mysqli_query($conn, "select  * from  review  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql25)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='procedure/review.php >Review of requests, tenders and contracts</a></td></tr>";
                    }
                    ?> 


                    <?php
                    $sql26 = mysqli_query($conn, "select  * from  training  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql26)) {

                        echo $sql26;



                        echo "   <tr><td ><a href='procedure/training.php >Training</a></td></tr>";
                    }
                    ?>           
                    <?php
                    $sql = mysqli_query($conn, "select  * from  cali_in_outward  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='register/cali_in_outward.php >Calibration equipment inward - outward register</a></td></tr>";
                    }
                    ?>                 
                    <?php
                    $sql = mysqli_query($conn, "select  * from  cali_log  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='register/cali_log.php >Calibration Log</a></td></tr>";
                    }
                    ?>                     
                    <?php
                    $sql = mysqli_query($conn, "select  * from  epr_lf  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='register/epr_lf.php >Environmental parameter register - LF</a></td></tr>";
                    }
                    ?>                        

                    <?php
                    $sql = mysqli_query($conn, "select  * from  epr_uat  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='register/epr_uat.php >Environmental parameter register - UAT</a></td></tr>";
                    }
                    ?>                        

                    <?php
                    $sql = mysqli_query($conn, "select  * from  in_out_uat  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='register/in_out_uat.php >Inward / Outward -UAT</a></td></tr>";
                    }
                    ?>               

                    <?php
                    $sql = mysqli_query($conn, "select  * from  mr_atps  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='register/mr_atps.php >Maintenance Register - ATPS</a></td></tr>";
                    }
                    ?>                      
                    <?php
                    $sql = mysqli_query($conn, "select  * from  mr_eot  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='register/mr_eot.php >Maintenance Register - EOT Crane</a></td></tr>";
                    }
                    ?>                  
                    <?php
                    $sql = mysqli_query($conn, "select  * from  std_hydro  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='register/std_hydro.php >Standard Hydrophone Calibration Log</a></td></tr>";
                    }
                    ?>                    
                    <?php
                    $sql = mysqli_query($conn, "select  * from  test_log  where  status='Waiting'&& status1='Waiting'");
                    while ($row = mysqli_fetch_array($sql)) {

                        // $count=count($status);




                        echo "   <tr><td ><a href='register/test_log.php >Test Log</a></td></tr>";
                    }
                    ?>                    



                </table>
          </div>
        </div></body>
</html>
