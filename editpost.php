<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขบทความ</title>
    <link rel="shortcut icon" href="logo_tbh_bg.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<link rel="stylesheet" href="stylehome.css" type="text/css" >
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark  navgreen blue kanit">
<span><img src="logo_tbh.png" width="30" height="30" alt="">
  <a class="navbar-brand" href="index.php">ThailandBlogHub</a></span>
  <?php
  session_start();
  if($_SESSION!=NULL)
  {
    $user=$_SESSION["user"];
    $catagory=$_POST["catagory"];
    $id=$_POST["id"];
  }
  
  
  ?>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav litsize">
    <a class="nav-item nav-link " href="science.php">Science <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link " href="it.php">IT</a>
      <a class="nav-item nav-link " href="health.php">Health/Sport</a>
      <a class="nav-item nav-link" href="travel.php">Travel</a>
      <a class="nav-item nav-link " href="business.php">Business</a>
      <a class="nav-item nav-link" href="education.php">Education</a>
      <a class="nav-item nav-link" href="entertainment.php">Entertainment</a>
      <a class="nav-item nav-link" href="homegarden.php">Home/Garden</a>
      <a class="nav-item nav-link" href="reaction.php">Reaction/Review</a>
      <a class="nav-item nav-link" href="reporter.php">Reporter</a>
    </ul>
    
  </div>
  <?php 
  if ($_SESSION==NULL)
  {
    echo "<a class='nav-item nav-link white' href='login.php'>เข้าสู่ระบบ</a>";
  }
  else
  {
      $user=$_SESSION["user"];
      echo"<span class='nav-item dropdown' >";
      //echo  " <a class='nav-item nav-link white'style='color:white;'>สวัสดี".$user."</a>";
      echo   "<a class='nav-link dropdown-toggle usrnameshow' style='color:white;' role='button' id='navbarDropdown'  data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> สวัสดี".$user."</a> 
      
      <div class='dropdown-menu widescreennav'aria-labelledby='navbarDropdown' >
    <a class='dropdown-item ' href='profile.php'>โปรไฟล์ของคุณ</a>
  
    <div class='dropdown-divider'></div>
  
    <a class='dropdown-item ' href='setting.php'>การตั้งค่า</a>
    <a class='dropdown-item ' href='logout.php'>ลงชื่อออก</a>
  </div>";
  echo "</span>";
  }
  ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<br>
<div class="container">
<h3 class="kanit"> <i class="fas fa-paper-plane"></i> แก้ไขบทความ</h3>
<div class="row">
  <div class="col-12 col-md-8">
<?php
$conn=mysqli_connect("localhost","puyscexc","Tttt2544","puyscexc_thailandbloghub");
$sql="SELECT * FROM $catagory WHERE ID='$id'";
$memo=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($memo);
if ($_SESSION!=NULL)
{
    print "<p>กรุณาแก้ไขและบันทึกเป็นอย่างๆ ไป</p>
    <form  action='edittopic.php' method='post' >
    <div class='form-group'>
    <label for='exampleInputEmail1'>ชื่อบทความ</label>
    <input type='text' class='form-control' name='topic' value='".$row["Topic"]."' placeholder='ใส่ชื่อบทความ' >

    <input type='text' name='catagory' value='".$catagory."' hidden>
    <input type='text' name='id' value='".$id."' hidden>
    <button type='submit' class='btn btn-primary'>แก้ไขชื่อบทความ</button>
    </div>
     </form>
     
<br>

<form  action='editsitename.php' method='post' >
  <div class='indiv'>
  <label for='exampleInputEmail1'>ชื่อเว็บไซต์/บล็อก</label>
  <input type='text' class='form-control' name='blogtitle' value='".$row["Sitename"]."' placeholder='ใส่ชื่อเว็บไซต์หรือชื่อบล็อก' >
  <input type='text' name='catagory' value='".$catagory."' hidden>
  <input type='text' name='id' value='".$id."' hidden>
  <button type='submit' class='btn btn-primary'>แก้ไขชื่อบล็อก</button>
  </div>
</form>
<br>

<form  action='editlink.php' method='post' >
  <label for='exampleInputEmail1'>URL ของบทความนี้ (โปรดใส่ http:// หรือ https://)</label>
<input class='form-control' type='url' name='link'  value='".$row["link"]."'>
<input type='text' name='catagory' value='".$catagory."' hidden>
  <input type='text' name='id' value='".$id."' hidden>
  <button type='submit' class='btn btn-primary'>แก้ไขลิงค์</button>
</form><br>

<form  action='editinfo.php' method='post' >
  <label for='exampleInputEmail1'>บรรยายคร่าวๆเกี่ยวกับบทความ ไม่เกิน 150 ตัวอักษร </label>
    <textarea class='form-control' name='describe'  rows='3' maxlength='150'>".$row["Infoadd"]."</textarea>
    <input type='text' name='catagory' value='".$catagory."' hidden>
  <input type='text' name='id' value='".$id."' hidden>
  <button type='submit' class='btn btn-primary'>แก้ไขข้อความ</button>
</form>
<br>

<form  action='editissuephoto.php' method='post' enctype='multipart/form-data'>
  <label for='exampleInputEmail1'>ใส่รูปภาพ (ใส่หรือไม่ใส่ก็ได้)</label>
    <input type='file' name='photo' id='photo'>
    <input type='text' name='catagory' value='".$catagory."' hidden>
  <input type='text' name='id' value='".$id."' hidden>
  <button type='submit' class='btn btn-primary'>เปลี่ยนรูปภาพ</button>
    </form><br>
<br>
    ";
}
if ($_SESSION==NULL)
{
    echo "Please Login";
}
?>
  
  </div> <!-- div for col-12 col-md-8 -->

  <div class="col-6 col-md-4">      <div id="fb-root"></div> <script>(function(d, s, id) {   var js, fjs = d.getElementsByTagName(s)[0];   if (d.getElementById(id)) return;   js = d.createElement(s); js.id = id;   js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.12&appId=389712018153235&autoLogAppEvents=1';   fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script><div class="fb-page" data-href="https://www.facebook.com/thailandbloghub/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/thailandbloghub/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thailandbloghub/">Thailand Blog Hub</a></blockquote></div>
   </div>  <!-- for col-6 col-md-4 -->     </div> <!-- for container --> </div> <!-- div for row -->
</div> <!-- for container div -->
<br><br><br><br><br><br> <div class="footer  navbar-dark bg-dark ">   <div class="container">   <div class="row">     <div class="col">       <div class="footercontent">     <div class="flexdiv">       <img src="logo_tbh_bg.png" class="footerlogo">       <div style="color:white;">     <h6 class="kanit">ไทยแลนด์บล็อกฮับ</h6>     <p>Copyright 2018 Thailand Blog Hub</p>     <a href="condition.php" class="listfooter"> ข้อกำหนดและเงื่อนไข </a><br>     <a href="policy.php" class="listfooter"> นโยบายความเป็นส่วนตัว </a>      </div>      </div><!--for flex div -->      </div>     </div><!--for col div-->            </div><!--for row div-->      </div> <!--for container --> </div><!-- for nav bottom --> </body></html>