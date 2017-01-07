<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/slideshow.css">

 <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet" href="css/material.indigo.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/index.js"></script>

<style type="text/css">

#ul1 li{
  display: inline;
}
#ul1 li{
   margin-left:7%;
  font-size: 12px;
}
#ul1{
  margin-top:8.5%;
}
#ul2 li{
  display: inline;
}
#ul2{
  margin-top:25%;
}
#ul4 li{
  display: inline;
}
tr{
  border-bottom: 1px solid #E4E5E7;
}
.collapsible-header{
  color:gray;
}
.serv,.serv:hover,.serv:visited,.serv:active,.serv:focus{
  text-decoration: none;
}

h6{
  font-size:15px;
}

#name{
  font-family:'Roboto', sans-serif;
  font-size:13px;
}

#fourth_line{
  font-size:13px;
}
.material-icons {
   
    margin-right: 20px;
    margin-top: -9px;
}
#menu{
  font-weight:bold;
  font-size:15px;
  font-family: 'Roboto', sans-serif;
  color:#FFFFFF;
}

.mdl-layout__drawer-button{
  margin-top:40px;
  margin-left:40px;
}

.mdl-layout__header-row .mdl-navigation__link {
    display: block;
    opacity: 1;
    line-height: 64px;
    padding: 0 24px;
    text-decoration: none !important;

}


.dropdown-menu{
 background-color:  #F1524B !important; 
text-transform: capitalize !important;


}
.dropdown-menu{
 background-color:  #F1524B !important; 
 
 }

 /*Below code is for color and top,bottom bar after mouse is Hover in the Drpdown menu*/
.dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
    color: #FFFFFF  !important;
    text-decoration: none !important;

    background-color: #f8b6b3 !important;

 /*   border-bottom: 1px solid #FFFFFF !important;
    border-top: 1px solid #FFFFFF !important;*/
}
/*This code is for  dropdown menu bar*/
.dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #FFFFFF;
    white-space: nowrap;
    text-decoration: none;
    z-index: -1;

}
/*When we hover this on Nav bar menu items a White line comes down */
.homonhov:hover {
    border-bottom: 4px solid #FFFFFF !important;
    text-decoration: none !important; 
    position: relative !important;}

</style>
</head>
<body  style="background-color:#E4E5E7">


<?php
$url_types_subtypes = 'https://vanisha-honda.herokuapp.com/get_vehicle_types_subtypes/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
$options_types_subtypes = array(
  'http' => array(
    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    'method'  => 'GET',
  ),
);
$context_types_subtypes = stream_context_create($options_types_subtypes);
$output_types_subtypes = file_get_contents($url_types_subtypes, false,$context_types_subtypes);
/*var_dump($output_types_subtypes);*/
$arr_types_subtypes = json_decode($output_types_subtypes,true);
?>

<div style="" class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#F1524B;height:110px" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" style="margin-top:4.5%">
          <!-- Title -->
          <img style="margin-top:-3.8%;margin-left:40px;" src="images/honda_logo_white.png" width="60" height="60"></img>
          <span style="margin-left:1%;font-size:20px;" class="mdl-layout-title">Vanisha Honda</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation -->
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link homonhov" href="index.php" id="menu" style="line-height:35px;">HOME</a>
            
            <div class="mdl-navigation__link dropdown homonhov"  style="line-height:35px;">
                  <a href="#" class="btn dropdown-toggle" id="menu" data-toggle="dropdown">PRODUCTS<!-- <span class="caret"></span> --></a>
                  <ul class="dropdown-menu">
                     <li>
                      <?php for($x=0;$x<count($arr_types_subtypes);$x++){?>
                          <a class="trigger right-caret"><?php echo $arr_types_subtypes[$x]['vehicle_type'] ?></a>
                              <ul class="dropdown-menu sub-menu">
                                <?php for($y=0;$y<count($arr_types_subtypes[$x]['subtype']);$y++){?>
                                  <li><a href="product_detail.php?v_id=<?php echo $arr_types_subtypes[$x]['subtype'][$y]['v_id'] ?>"><?php echo $arr_types_subtypes[$x]['subtype'][$y]['vehicle'] ?></a></li>
                                <?php } ?>
                              </ul>
                      <?php } ?>
                    </li>
                  </ul>
            </div>
                        
           <div class="mdl-navigation__link dropdown homonhov" style="line-height:35px;">
              <a href="#" class="btn dropdown-toggle" id="menu" data-toggle="dropdown">SERVICES<!-- <span class="caret"></span> --></a>
              <ul id="ul_service" class="dropdown-menu">
                <li><a href="book_service.php">Book Servicing</a></li>
                <li><a href="insurance.php">Renew Insurance</a></li>
                <li><a href="finance.php">Get Finance</a></li>
              </ul>
            </div>

            <a class="mdl-navigation__link homonhov" href="enquiry.php" id="menu" style="line-height:35px;">CONTACT US</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Vanisha Honda</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="index.php"><i class="material-icons">home</i>Home</a>
          <a class="mdl-navigation__link" href="product_types.php"><i class="material-icons">directions_bike</i>Products</a>
          <a class="mdl-navigation__link" href="customer_services.php"><i class="material-icons">build</i>Services</a>
          <a class="mdl-navigation__link" href="enquiry.php"><i class="material-icons">contact_phone</i>Contact Us</a>
        </nav>
      </div>

<main class="mdl-layout__content">
    

<div class="row" style="background-color:white;margin-top:1%;text-align:center">
 <div style="margin-top:5.5%;">
  <div style="text-align:center;margin-bottom:13%" class="col-sm-4">
    <div class="row">
      <a class="serv" href="book_service.php">
      <img style="width:200px;height:200px" src="images/book_servicing.png"></img>
      <p style="margin-top:-30%;color:white;font-size:25px">Book Servicing</p>
      </a>
    </div>
  </div>
  <div style="text-align:center;margin-bottom:5%" class="col-sm-4">
    <div class="row">
      <a class="serv" href="insurance.php">
      <img style="width:200px;height:200px" src="images/Insurance.png"></img>
      <p style="margin-top:-30%;color:white;font-size:25px">Insurance <br>Renewal</p>
      </a>
    </div>
  </div>
  <div style="text-align:center;margin-bottom:5%" class="col-sm-4">
    <div class="row">
      <a class="serv" href="finance.php">
      <img style="width:200px;height:200px" src="images/Finance.png"></img>
      <p style="margin-top:-30%;color:white;font-size:25px">Get Finance</p>
      </a>
    </div>
  </div>
 </div>
</div>


<div style="background-color:#607D8B;border-bottom:1px solid #688491;margin-top:1%" class="row">
  <div class="col-sm-1" style="color:white;">
  </div>
  <div class="col-sm-3" style="color:white;">
       <div style="margin-top:5%">
       <img style="width:20%;height:20%" src="images/honda_logo_red.png"></img>
        <h5 style="margin-top:-6%;margin-left:25%">Vanisha Honda</h5>
       </div>
  </div>
  <div class="col-sm-5" style="color:#FFFFFF">
       <ul id="ul1">
            <li><a style="color:#FFFFFF" href="index.php">HOME</a></li>
            <li><a style="color:#FFFFFF" href="product_types.php">PRODUCTS</a></li>
            <li><a style="color:#FFFFFF" href="customer_services.php">SERVICES</a></li>
            <li><a style="color:#FFFFFF" href="enquiry.php">CONTACT US</a></li>
        </ul>
  </div>
  <div class="col-sm-2" style="color:#FFFFFF;text-align:right">
      <ul id="ul2">
            <li><img src="images/twitter.png"></img></li>
            <li><img src="images/facebook.png"></img></li>
            <li><img src="images/google-plus.png"></img></li>
        </ul>
  </div>
  <div class="col-sm-1">
  </div>
</div>

<div style="background-color:#607D8B;margint-top:5%;border-bottom:1px solid #688491" class="row">
  <div class="col-sm-1" style="color:#FFFFFF;">
  </div>
  <div class="col-sm-3" style="color:#FFFFFF;margin-top:3%">
        <ul id="ul3" style="list-style: none;margin-left:-14%;font:italic 13px Roboto,sans-serif;">
            <li>+91-9987654321</li>
            <li>+91-8314208821</li>
            <li>info@vanishahonda.com</li>
        </ul>
  </div>
  <div class="col-sm-2" style="color:#FFFFFF">
  </div>
  <div class="col-sm-5" style="color:#97A8B0;text-align:right">
        <ul id="ul4" style="margin-top:17%">
            <li>PRIVACY POLICY</li>
            <li style="margin-left:10%">TERMS AND CONDITIONS</li>
        </ul>
  </div>
  <div class="col-sm-1">
  </div>
</div>



  </main>


</body>
</html>

