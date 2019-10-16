<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script type="text/javascript" src="index.js"></script>
  <script type="text/javascript" src="sw.js"></script>
  <link rel="manifest" href="manifest.json">
<!--   <link rel="stylesheet" type="text/css" href="main.css"> -->
</head>
 <script>
            $(document).ready(function() {
                setInterval(function() {  // set Interval function to carry out same operation in the time specified
                    $('#memdiv').load('index.php #memdiv > *'); // Reloads 'seminar-overview.php' table every 6 seconds as <div> tag is specified and closed after table
            }, 6000);
                });
    </script>
    <style>
        p{
            font-size:18px;
        }

    </style>
<body style="height: 100vh;font-size:16px;">
<div class="row" style="height: 100vh;">

<div id="memdiv" class="col s4 m2" style="height: 100vh;">
		<input type="button" name="" value="Home page" onclick="formopn()" style="width:100%;" class="waves-effect waves-light btn"><br><br>
		<div class="center-align">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names" title="Type in a name"><div id="mfxd">
         <?php
          $con = mysqli_connect('localhost','id7134286_root2','root123','id7134286_demo');
           
          $prequer="SELECT *FROM `member` ";
          $run=mysqli_query($con,$prequer);
          $data=mysqli_fetch_assoc($run); 
          if($run=mysqli_query($con,$prequer))
            {
               ?>
                <div style="overflow-y:auto;" class="table-wrapper-scroll-y">
                  <ul id="myUL"><?php
               while($data=mysqli_fetch_assoc($run))
               {
                ?>
                  <li><a id="membershow" href="#" onclick="showmem('<?php echo $data['name']; ?>','<?php echo $data['email']; ?>','<?php echo $data['currenrcredit']; ?>' )"> <?php echo $data['name'];  ?></a></li>
                 <?php
                }
                ?></ul></div><?php
           }
          else echo"wrong";
            ?>
            </div>
        </div>
</div>
	<script type="text/javascript">
		//sorting function==========>>>>>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
	</script>
	<!------------------------------------------------------------------------------------------------------------------------>
<div class="col s8 m10" style="background-image: linear-gradient(59deg,#82E0AA,#2471A3);height: 100vh;">
	  <div id="frmdata">
     <!-- <img src="https://i.pinimg.com/originals/07/6d/90/076d90cf221955510577c3e9298c64f6.jpg" style="height: 100vh; width:100%;"/>-->
      <h1 class="center-align" style="margin-top: 140px;">Credite Sharing System</h1>
      </div>
    
      <div id="showinfo">	

      </div>
</div>


</div>
</body>
<script type="text/javascript">
	function showmem(a,b,c)
	{
	  showinfo();
	  document.getElementById('showinfo').innerHTML="<p id=nam >Name : "+a+"</p><p id=ema>Email : "+b+"</p><p id=cc>Current credit : "+c+"</p><form action=addcredit.php method=post id=creditaddform onsubmit=return&nbsp;credadd()><input type=number name=credit id=ttcnum value=0><input type=text id=ttfo name=memnam placeholder=Member name><input type=submit id=ttsub value=Send name=sub><input type=hidden name=usnam value="+a+"></form><br><h5 id=addcr></h5>";
	}
</script>
<script type="text/javascript">
     function formsubmit()
     {
      $.ajax({
        type: 'POST',
        url: 'addme.php',
        data: $('#addmemform').serialize(),
        success:function(response)
        {
          $('#info').html(response);
        }
      });
      var form=document.getElementById('addmemform').reset();

      return false;
     }
</script>
<script type="text/javascript">
     function credadd()
     {
      $.ajax({
        type: 'POST',
        url: 'addcredit.php',
        data: $('#creditaddform').serialize(),
        success:function(response)
        {
          $('#addcr').html(response);
        }
      });
      var form=document.getElementById('creditaddform').reset();

      return false;
     }
</script>
</html>