<html>

<head>
<title>
Post Your Wall
</title>

</head>

<body>

<script>
function AddPost()
{
var xmlhttp="";
var str=document.getElementById("wall").value;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("result").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","Action_Wall.php?msg="+str,true);
xmlhttp.send();
}


</script>
<br>
<div>Assignment 1:</div>
<br>
<br>
<form name="form1">
<textarea rows="4" cols="35" name="wall" id="wall"></textarea>
<input type="button" value="post" onclick="AddPost()">
</form>
<br>

<div>=======================================</div>
<br>


<div>
<p><span id="result"></span></p>
</div>
<script>
AddPost();
</script>
</body>

</html>
