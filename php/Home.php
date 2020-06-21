<html>

<head>
  <title>TheBliss!</title>
  <!-- font family-->
  <link href="https://fonts.googleapis.com/css?family=Caveat|Cookie|Courgette|Gloria+Hallelujah|Lobster+Two|Pacifico|Permanent+Marker|Sacramento|Satisfy|Shadows+Into+Light|Signika|Special+Elite&display=swap" rel="stylesheet">
<!-- Materalized Frame -->
<!--jquery cdn-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Social media PLugins Materialized-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--add script for carousel-->
    <script>
      $(document).ready(function(){
        $('.carousel').carousel();
        // function for auto play carousel-slider
        setInterval(function(){
          $('.carousel').carousel('next');
        }, 5000);
        $('.carousel.carousel-slider').carousel({fullWidth: true});
      });
      </script>
    <!-- styling of carousel slider -->
 <style>
   .carousel{
     max-height:600px;
     position:cover;
     }
     /* social media plugin styling */

     .fa {
  font-size: 30px;
  width: 45px;
  text-decoration: none;
}

.fa-facebook {
  
  color: white;
}
.fa-instagram {
  
  color: white;
}
.fa-twitter{
  color:white;
}
.fa:hover{
  opacity: 0.5;
  }
  {
    box-sizing: border-box;
}
 </style>
   <link rel="stylesheet" href="../css/home.css">

  
</head>

<body>
  <!-- navbar attributes -->
  <div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      <a href="../php/home.php" class="brand-logo">TheBliss</a></li>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
       <li><a href="../php/home.php">Home</a></li>
        <li><a href="#aboutus">About Us</a></li>
        <li><a href="#featured">Featured</a></li>
        <li><a href="#contactus">Contact Us</a></li>
      </ul>
    </div>
 </nav>
</div>
  

<!--for carausel photos -->
  <div class="carousel carousel-slider" data-indicators ="true">
    <a href="#runway!" class="carousel-item" ><img src="../image/runway.jpg"></a>
    <a href="#two!" class="carousel-item" ><img src="../image/wed1.jpg"></a>
    <a href="#three!" class="carousel-item" ><img src="../image/idea.jpg"></a>
    <a href="#four!" class="carousel-item" ><img src="../image/nice.jpg"></a>
    <a href="#six!" class="carousel-item" ><img src="../image/wed6.jpg"></a>
<br><br>
  </div>
  <br>
 
  <div class="container">
    <h2 style="color:#EE6E73; font-family:'Special Elite', cursive;text-align:center">Recently Created Events</h2>
 <!--photo card for news update of company-->
 
 <div class="row">
  <?php
  require "connection.php";
  $sql = "select * from tbl_events  order by created_at desc limit 4 ";
  $result = $connect->query($sql);
  $data = [];
  if ($result->num_rows > 0) {
      while ($events = $result->fetch_assoc()) {
          array_push($data, $events);
      }
  }
   ?>

<a name="events">
  <?php 
for($i = 0;$i<count($data);$i++){
?>
<div class="col s12 m3">
     <div class="card sticky-action">
        <div class="card-image">
          <img src="images/<?php echo $data[$i]['image'] ?>" alt = "">
          <a class="btn red btn-floating halfway-fab pulse activator">View Details</a>
        </div>
        <div class="card-content">
          <p><?php echo $data[$i]['name']?></p>
          <p><?php echo $data[$i]['eventdate']?></p>

        </div>
        <div class="card-reveal">
          <span class="card-title"><i class="right">x</i></span>
          <p><?php echo $data[$i]['description']?></p>
        </div>
    </div>
    </div>


<?php

}

  ?>
</div>
</a>
<!-- about us -->
            <a name="aboutus">
            <h3 style="text-align:center; white-space:pre-wrap; color:#551743;font-family:'Lobster Two', cursive;">TheBliss is a full service event <br> management firm based in  Kathmandu, Nepal that was created by pairing together <br> our passion for business and events. We bring a fresh, unique approach to the event management industry.</h3>
</div>
<br>

<img src="../image/passion.jpg"><br><br>
<div class="container">
<h5 style="text-align:center;  white-space:pre-wrap; color:#EE6E73;font-family:'Shadows Into Light', cursive;">We put your organization first. We learn about your business, we focus on your challenges, and we plan events to support your goals.</h5><br>

<h4 style="text-align:center;color:black;  white-space:pre-wrap;font-family:'Josefin Sans', sans-serif;" >Our philosophy as an events company is to offer a highly flexible, bespoke and consultancy driven serviceTheBliss provides event management services that covers  corporate functions, dinner & dances, team buildings, office openings, product launches, music video shoot, employee awards, private parties, and weddings. The list is endless! </h4>                
    <!-- For Featured Events -->
<a name="featured">
<h2 style="color:#EE6E73; font-family:'Special Elite', cursive;text-align:center">Featured Events</h2></a>
<div class="row">
  <?php
  require "connection.php";
  $sql = "select * from tbl_events where isfeatured=1 order by created_at desc limit 3 ";
  $result = $connect->query($sql);
  $data = [];
  if ($result->num_rows > 0) {
      while ($events = $result->fetch_assoc()) {
          array_push($data, $events);
      }
  }
   ?>



<div class="col 14 m4 s12">
     <div class="card sticky-action">
        <div class="card-image">
          <img src="images/<?php echo $data[0]['image'] ?>" alt = "">
          <a class="btn red btn-floating halfway-fab pulse activator">View Details</a>
        </div>
        <div class="card-content">
          <p><?php echo $data[0]['name']?></p>
          <p><?php echo $data[0]['eventdate']?></p>

        </div>
        <div class="card-reveal">
          <span class="card-title"><i class="right">x</i></span>
          <p><?php echo $data[0]['description']?></p>
        </div>
    </div>
    </div>
    <div class="col 14 m4 s12">
     <div class="card sticky-action">
        <div class="card-image">
          <img src="images/<?php echo $data[1]['image'] ?>" alt = "">
          <a class="btn red btn-floating halfway-fab pulse activator">View Details</a>
        </div>
        <div class="card-content">
          <p><?php echo $data[1]['name']?></p>
          <p><?php echo $data[1]['eventdate']?></p>

        </div>
        <div class="card-reveal">
          <span class="card-title"><i class="right">x</i></span>
          <p><?php echo $data[1]['description']?></p>
        </div>
    </div>
    </div>
<div class="col 14 m4 s12">
     <div class="card sticky-action">
        <div class="card-image">
          <img src="images/<?php echo $data[2]['image'] ?>" alt = "">
          <a class="btn red btn-floating halfway-fab pulse activator">View Details</a>
        </div>
        <div class="card-content">
          <p><?php echo $data[2]['name']?></p>
          <p><?php echo $data[2]['eventdate']?></p>

        </div>
        <div class="card-reveal">
          <span class="card-title"><i class="right">x</i></span>
          <p><?php echo $data[2]['description']?></p>
        </div>
    </div>
    </div>
  </div>

<!--for contact us-->
<a name="contactus">
<h3 style="color:#EE6E73; font-family:'Special Elite', cursive;text-align:center">Contact Us</h3></a>

<h5 style="color:black";>Contact us about anything related to our company or services.<br> We'll do our best to get back to you as soon as possible.</h5><br>
<!-- <div class="container">  -->
    <div class="row">
     <div class="col s12 m6">
<address itemscope="itemscope" itemtype="http://schema.org/Organization">
<div>
<address class="mb0" itemscope="itemscope" itemtype="http://schema.org/Organization">
<div>
<span itemprop="name">TheBliss Pvt Ltd</span>
</div>
<div itemprop="address" itemscope="itemscope" itemtype="http://schema.org/PostalAddress">
<div>
<i class="fa fa-map-marker fa-fw" role="img" aria-label="Address" title="Address"></i>
<span itemprop="streetAddress">Balkumari<br>Lalitpur,Nepal</span>
</div>
<div><i class="fa fa-phone fa-fw" role="img" aria-label="Phone" title="Phone"></i> <span itemprop="telephone">+977-9830902810</span></div>
<div><i class="fa fa-envelope fa-fw" role="img" aria-label="Email" title="Email"></i> <span itemprop="email">theblissnepal@gmail.com</span></div>
</div>
</address>
</div>
<span class="fa fa-map-marker fa-fw mt16" role="img" aria-label="Address" title="Address"></span> <a target="_BLANK" href="https://www.google.com/maps/place/Nepal+College+of+Information+Technology/@27.671451,85.3386407,21z/data=!4m19!1m13!4m12!1m4!2m2!1d85.3625818!2d27.6904685!4e1!1m6!1m2!1s0x39eb19e8af4a5fe3:0x963d00cdf478c6b6!2sncit+college!2m2!1d85.3387383!2d27.6713817!3m4!1s0x39eb19e8af4a5fe3:0x963d00cdf478c6b6!8m2!3d27.6713817!4d85.3387383"> Google Maps
</a></address>
</div>
<?php
if (isset($_POST['submit'])) {
$err = [];
if (isset($_POST['username']) && !empty($_POST['username'])) {
  $username = $_POST['username'];
  }else{
    $err['username'] = "Can't be empty";
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
  $email = $_POST['email'];
  }else{
    $err['email'] = "Can't be empty";
}

if (isset($_POST['message']) && !empty($_POST['message'])) {
  $message = $_POST['message'];
  }else{
    $err['message'] = "Can't be empty";
   }
   if(count($err) == 0){  
require "connection.php";
$sql = "insert into tbl_message(username,email,message) values('$username','$email','$message')";
 $connect->query($sql);

 if($connect->affected_rows == 1 && $connect->insert_id > 0){
  echo 'Message Sent';
 }else{
    echo 'Message not sent';
 }
}
}
?>
<div  class="col s12 m6">
  <div class="card-panal">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="input-field">
        <input type="text" name="username" id="username">
        <label for="username">Username</label>
      </div>
      <div class="input-field">
        <input type="email" name="email" id="email" class="validate">
        <label for="email">Email</label>
      </div>
      <div class="input-field">
        <label for="message">Enter message</label>
          <input type="text" name="message" id="message" >
      </div>
      <input type="submit" name="submit" class="btn">
    </form>
  </div>
</div>
</div>
</div>


<!-- For Page Footer -->
<footer class="page-footer">
           <div class="container"> 
            <div class="row">

            <div class="col s4">
                <h5 class="white-text">Navigate to...</h5>
                <a href="../php/home.php">Home</a>
              </div>
              <div class="col s4">
               <h5>Connect with us</h5>                                                               
                 +977-9830902810<br>
                 Balkumari, Lalitpur, Nepal
                 theblissnepal@gmail.com</p>
                 <a href="https://www.facebook.com/TheBliss-103443334364405" class="fa fa-facebook"></a>
                  <a href="https://www.instagram.com/theblissnepal/" class="fa fa-instagram"></a>
                  <a href="https://twitter.com/home?lang=en" class="fa fa-twitter"></a>
                </div> 
              
              <div class="col s4">
                <h5 class="white-text">TheBliss Pvt. Ltd.</h5>
                <p class="grey-text text-lighten-4">TheBliss is founded with the aim of bringing a fresh, unique approach to the event management industry.</p>
              </div>
            </div>
          </div> 
         
          <div class="footer-copyright">
            <div class="container"> 
            Copyright © TheBliss Pvt. Ltd.  
             </div> 
           </div> 

          </footer>
        
            

</body>

</html>


  


