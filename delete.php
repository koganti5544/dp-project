<!DOCTYPE html>
<html>

<head>
	<title>Delete</title>
</head>

<body>

		<?php
$conn = mysqli_connect("localhost", "id16804136_root", "~^@O9gt$^>|i-cdx", "id16804136_products");

if ($conn === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['data']))
{
    $id_array = $_POST['data']; // return array
    $id_count = count($_POST['data']); // count array
    for ($i = 0;$i < $id_count;$i++)
    {
        $id = $id_array[$i];
        $sql = "DELETE FROM productlist WHERE `sku` = '$id'";
        if (mysqli_query($conn, $sql))
        {
            echo "<h3>data deleted successfully.</h3>";
        }
        else
        {
            echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
echo ("<script>location.href = '/index.php';</script>");
?>
</body>

</html>
