<html>
<head>
<title>PHP isset() example</title>
</head>
<body>

<form method="post">

Enter value1 :<input type="button" name="str1" value ="1"><br/>
Enter value2 :<input type="button" name="str2" value ="1"><br/>
<input type="submit" value="Sum" name="Submit1">

<?php
$sum=$_POST["str1"] + $_POST["str2"];
echo "The sum = ". $sum;
?>

</form>
</body>
</html>