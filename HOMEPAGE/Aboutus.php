<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
.video {
    width: 560px; /* you have to have a size or this method doesn't work */
    height: 315px; /* think about making these max-width instead - might give you some more responsiveness */

    position: absolute; /* positions out of the flow, but according to the nearest parent */
    top: 0; right: 0; /* confuse it i guess */
    bottom: 0; left: 0;
    margin: auto; /* make em equal */
}

</style>
<title>About Us</title>
</head>

<body>
<header>
<div class="main">
    <div class="logo">
      <img src="HOMEPAGE/logo.png">
    </div>
  <ul>
    <li><a href="http://localhost/Project/HOMEPAGE/index.php">Home</a></li>
   
    <li><a href="http://localhost/Project/AboutUs.html">About Us</a></li>
    <li><a href="https://www.yelp.com/biz/borough-of-manhattan-community-college-new-york-6?osq=bmcc">Contact Us</a></li>
  </ul>
</div>
<div class="video"  >
  <iframe width="560" height="315" src="https://www.youtube.com/embed/jt7EtVRjOHY?start=00" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

</body>
</header>
</html>
