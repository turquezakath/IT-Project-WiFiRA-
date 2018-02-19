<!DOCTYPE html>
<html lang="en">

<head>
      <title>WiFiRA ISP</title><meta charset="UTF-8" />

      <link rel="stylesheet" href="pages/assets/css/style.css">

      <style type="text/css">
      body {
        background-image: url("pages/assets/img/bg.jpg");
        background-repeat: no-repeat;
        background-size: 600px;
    background-position: center;
        background-color: #ffffff;; /* Black fallback color */
      background-color: #ffffff;; /* Black w/opacity */
      }
      </style>

</head>
<body>
<form name="reg" action="code_exec2.php" onsubmit="return validateForm()" method="post">
<table width="274" border="solid 10px" align="left" cellpadding="2" cellspacing="2" style="background-color:##686667">
  <tr>
    <td colspan="2">
    <div align="left">

        
      </div></td>
  </tr>
  <tr>
    <td style="background-color:##686667"><div align="center" style="color:#000000; font-family:life savers; font-size:18px;">Kiosk Name:</div></td>
    <td width="171"><input type="text" name="kioskName" /></td>
  </tr>
  <tr>
    <td style="background-color:##686667"><div align="center" style="color:#000000; font-family:life savers; font-size:18px;">Kiosk ID:</div></td>
    <td><input type="text" name="kioskId" /></td>
  </tr>
  <tr>
    <td style="background-color:##686667"><div align="center">Location:</div></td>
    <td><input type="text" name="location" /></td>
  </tr>
  <tr>
    <td style="background-color:##686667"><div align="center" style="color:#000000; font-family:life savers; font-size:18px;">IP Adress:</div></td>
    <td><input type="text" name="ipAddress" /></td>
  <tr>
    <td><div align="center"></div></td>
    <td>
    <input name="submit" type="submit" value="Submit" style="background-color:##686667" /></td>
  </tr>

  <tr>
    <td><div align="center"></div></td>
    <td>
    <a  href="login.php"><input name="aaa" type="aaa" value="Log In" style="background-color:##686667; text-align: center " /> 
        </a>
  </tr>

</table>
</form>
        </body>

</html>


<script type="text/javascript">
function validateForm()
{
var a=document.forms["reg"]["kioskName"].value;
var b=document.forms["reg"]["kioskId"].value;
var c=document.forms["reg"]["location"].value;
var d=document.forms["reg"]["ipAddress"].value;
if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d==""))
  {
  alert("All Field must be filled out");
  return false;
  }
if (a==null || a=="")
  {
  alert("Kiosk name must be filled out");
  return false;
  }
if (b==null || b=="")
  {
  alert("Kiosk ID must be filled out");
  return false;
  }
if (c==null || c=="")
  {
  alert("location must be filled out");
  return false;
  }
if (d==null || d=="")
  {
  alert("IP address must be filled out");
  return false;
  }
}
</script>