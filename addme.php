<?php
  $con = mysqli_connect('localhost','id7134286_root2','root123','id7134286_demo');
if($con==true)
{
	echo "connect";
}
else
echo "not";

$uname=$_POST['username'];
$uemail=$_POST['email'];
$ucredit=0;
$upswds=$_POST['pswd'];
$prequer="SELECT *FROM `member` WHERE name='$uname'";
$run=mysqli_query($con,$prequer);
$presnam=mysqli_fetch_assoc($run);
       if($presnam['name']==$uname)
       {
          ?>
          <script type="text/javascript">
            alert("Userame alerady present");
            window.open('index.php','_self')
          </script>
          <?php
       }
     else
     {
     $query="INSERT INTO `member`(`name`, `email`, `currenrcredit`, `password`) VALUES ('$uname','$uemail','$ucredit','$upswds')";

     $run=mysqli_query($con,$query);
     ?>
          <script type="text/javascript">
            alert("You are join with us");
            window.open('index.php','_self')
          </script>
          <?php
     }
?>