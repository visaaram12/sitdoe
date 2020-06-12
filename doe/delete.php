
<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header('Location:index.php');
}
$id = $_GET['id']; ?><html>
    
<body>
<?php
include 'connection.php';

    
if(isset($_GET['id']))
{

$query1=mysqli_query($conn,"delete from topic where shortname='$id'");
if($query1)
{
   
   $query2=mysqli_query($conn,"drop table $id");
if($query2)
{
    
    $query3=mysqli_query($conn,"delete from dbtable where data_name='$id'");
if($query3)
{
    echo "Deleted Successfully";
     header('Location:TE_Unit_1.php');
}
 header('Location:TE_Unit_1.php');
}
 header('Location:TE_Unit_1.php');
}
}
?>
</body>
</html>
