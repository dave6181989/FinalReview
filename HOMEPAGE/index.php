<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <style>
      *{
  margin: 0;
  padding: 0;
  font-family: Century Gothic;

}
header{
  background-image:linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)),  url(homepic.jpg);
  height: 100vh;
  background-size: cover;
  background-position: center;
}
ul{
  float: right;
  list-style-type: none;
  margin-top: 20PX;
}
ul li{
  display: inline-block;
}
ul li a{
  text-decoration: none;
  color: #fff;
  padding: 5px 20px;
  border: 1px solid #fff;
}ul li a:hover{
  background-color: #fff;
  color: black;
  transition: 0.6s ease;

}
.logo img{
  float: left;
  width:150px;
  height: auto;
}
.main{
  max-width: 1200px;
  margin: auto;
}
.title{
  position: absolute;
  top:50%;
  left:50%;
  transform: translate(-50%, -50%);
  color: white;
}
.botton{
  position: absolute;
  top: 65%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.btn{
  border: 1px solid #fff;
  padding: 10px 30px;
  color: #fff;
  text-decoration: none;

}
.btn:hover{
  background-color: #fff;
  color: black;
  transition: 0.6s ease;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
  </style>
  
  
  
  <script>
  $(document).ready(function(){});
  </script>
  
  
<title>Welcome to Oasis</title>
</head>

<body>
<header>
  <div class="main">
    <div class="logo">
      <img src="logo.png">
    </div>
  <ul>
    
    
    <li><a href="Aboutus.php">About</a></li>
    <li><a href="https://www.yelp.com/biz/borough-of-manhattan-community-college-new-york-6?osq=bmcc">Contact Us</a></li>
  </ul>
</div>
<div class="title">
  <h1>Welcome to the Admin Page</h1>
</div>
<div class="botton">
  <a href="http://localhost/Project/index.php" class="btn">Click Here to Register!</a>
  
</div>

</header>
</html>
