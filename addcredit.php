<?php
  $con = mysqli_connect('localhost','id7134286_root2','root123','id7134286_demo');
$unm=$_POST['usnam'];
$cunc=$_POST['credit'];
$nam=$_POST['memnam'];
if($unm!=$nam)
{
$prequer="SELECT *FROM `member` WHERE name='$nam'";
$run=mysqli_query($con,$prequer);
$data=mysqli_fetch_assoc($run); 
$oldcr=$data['currenrcredit'];
$newcon=$oldcr+$cunc;

$sql = "UPDATE member SET currenrcredit='$newcon' WHERE name='$nam'";
$run=mysqli_query($con,$sql);
?>
 <script type="text/javascript">
            alert("send");
          
          </script>
<?php 
}
else
{ ?>
 <script type="text/javascript">
            alert("Not send itself");
          </script>
<?php }
?>
