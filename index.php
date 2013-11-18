<?php
$username="root";
$password="";
$db_name="facebook";
$tbl_name="status";

$con=mysqli_connect("$host","$username","$password","$db_name");
$display="";
$qry="select * from status order by ID desc";
	$result=mysqli_query($con,$qry);

	while($row = mysqli_fetch_array($result))
	{
		$display = $display."<div class='status' id=".$row['ID'].">".$row["Status"]."</div><br>";
	}
?>

<html>

<head>
<title>
Post Your Wall
</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" >
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" >
<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css" >
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style>
@charset 'UTF-8';
/* Starter CSS for Flyout Menu */
#cssmenu,
#cssmenu ul,
#cssmenu li #cssmenu a {
  list-style: none;
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 14px;
  font-family: Helvetica;
  line-height: 1;
}
#cssmenu {
  width: auto;
}
#cssmenu ul {
  zoom: 1;
  background: #c4d4a1 url(pattern.png) top left repeat;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  border: 1px solid #a3bc6d;
  -moz-box-shadow: 0 3px 3px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0 3px 3px rgba(0, 0, 0, 0.3);
  box-shadow: 0 3px 3px rgba(0, 0, 0, 0.3);
}
#cssmenu ul:before {
  content: '';
  display: block;
}
#cssmenu ul:after {
  content: '';
  display: table;
  clear: both;
}
#cssmenu a,
#cssmenu a:link,
#cssmenu a:visited {
  padding: 15px 20px;
  display: block;
  text-decoration: none;
  color: #ffffff;
  text-shadow: 0 -1px 1px #7d9745;
  border-right: 1px solid #a3bc6d;
}
#cssmenu a:hover {
  color: #7d9745;
  text-shadow: 0 1px 1px #dae4c4;
}
#cssmenu li {
  float: left;
  border-right: 1px solid #cfdcb2;
}
#cssmenu li:hover {
  background: #b9cc90 url(pattern.png) top left repeat;
}
#cssmenu li:first-child {
  border-left: none;
  -webkit-border-radius: 4px 0 0 4px;
  -moz-border-radius: 4px 0 0 4px;
  border-radius: 4px 0 0 4px;
}
.status
{
	padding:5px 5px 5px 5px;
	background-color:#F0F0F0;
}

</style>

</head>

<body>
<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.php'><span>Assignment 1</span></a></li>
   <li><a href='assignment2.php'><span>Assingment 2</span></a></li>
   
</ul>
</div>
<script>
function AddPost()
{
var xmlhttp="";
var str=document.getElementById("wall").value;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    //document.getElementById("result").innerHTML=
	var sid=xmlhttp.responseText;
	alert(sid);
	var string="<div id="+sid+" class='status'>"+str+"</div><br>";
	$("#main div:first-child").before(string);
	
    }
  }
xmlhttp.open("GET","Action_Wall.php?msg="+str,true);
//here we are using GET method. so we can send only 1024 caracter in url at a time ;
xmlhttp.send();
}


</script>

<div class="container" >


<br>

<br>
<br>
<div style=" width:60%; margin-left:20%; box-shadow: 0px 0px 4px 0px;">
<div style="">
<div style="color:blue">Assignment 1:</div>
<form name="form1">
<textarea style="margin-left:15%; margin-top:5%; width:70%; height:15%;" rows="3" name="wall" id="wall"></textarea><br>
<button style="margin-left:45%;" type="button" class="btn" onclick="AddPost()">Post</button>

</form>
</div>
<br>

<br>




<div style="padding:0 0 0 105px;color:blue" >Staus:
</div>
<div style="margin-left:15%; width:70%; box-shadow:0px 0px 2px 0px;">
<div id="main">
<?php echo $display;?>
</div>
<br>


</div>
<br>
</div>
<div style="padding:25px 0 0 0"></div>
</body>

</html>
