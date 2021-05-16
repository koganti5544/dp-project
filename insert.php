<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>

		<?php
$conn = mysqli_connect("localhost", "id16804136_root", "~^@O9gt$^>|i-cdx", "id16804136_products");

if ($conn === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sku = $_REQUEST['sku'];
$name = $_REQUEST['name'];
$price = $_REQUEST['price'];
$type = $_REQUEST['type'];
$size = $_REQUEST['size'];
$weight = $_REQUEST['weight'];
$height = $_REQUEST['height'];
$width = $_REQUEST['width'];
$length = $_REQUEST['length'];
if ($sku)
{
    $sql = "INSERT INTO productlist VALUES ('$sku',
			'$name','$price','$type','$size','$weight','$height','$width','$length')";

    if (mysqli_query($conn, $sql))
    {
        echo "<h3>data stored in a database successfully.</h3>";
    }
    else
    {
        echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
    }
}

mysqli_close($conn);
echo ("<script>location.href = '/index.php';</script>");
?>
</body>

</html>
