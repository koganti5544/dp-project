<!DOCTYPE html>
<html>

<head>
	<title>Product List</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
</head>

<body>
<diV style="display:inline-block;width:49%;"><b>Product List</b></div>
		<div  style="display:inline-block;width:50%;text-align:right"><button type="button" onclick="add(event)">ADD</button> <button type="button" onclick="massDelete(event)">MASS DELETE</button></div>
		<hr>
		<?php
$conn = mysqli_connect("localhost", "id16804136_root", "~^@O9gt$^>|i-cdx", "id16804136_products");

// Check connection
if ($conn === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT sku,name,price,type,size,weight,height,width,length FROM productlist";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    // output data of each row
    while ($row = $result->fetch_assoc())
    {
        if ($row["type"] == "DVD")
        {
            echo "<div style='width:20%;display:inline-block;padding:5px;border:1px solid #efefef;margin:10px;'><input  type='checkbox' class='delcheckbox' value='" . $row['sku'] . "'><div style='text-align:center'>" . $row['sku'] . "</div><div style='text-align:center'>" . $row['name'] . "</div><div style='text-align:center'>" . $row['price'] . " $</div><div style='text-align:center'>Size: " . $row['size'] . "MB</div></div>";
        }
        else if ($row["type"] == "Book")
        {
            echo "<div style='width:20%;display:inline-block;padding:5px;border:1px solid #efefef;margin:10px;'><input type='checkbox' class='delcheckbox' value='" . $row['sku'] . "'><div style='text-align:center'>" . $row['sku'] . "</div><div style='text-align:center'>" . $row['name'] . "</div><div style='text-align:center'>" . $row['price'] . " $</div><div style='text-align:center'>Weight: " . $row['weight'] . "KG</div></div>";
        }
        else if ($row["type"] == "Furniture")
        {
            echo "<div style='width:20%;display:inline-block;padding:5px;border:1px solid #efefef;margin:10px;'><input type='checkbox' class='delcheckbox' value='" . $row['sku'] . "'><div style='text-align:center'>" . $row['sku'] . "</div><div style='text-align:center'>" . $row['name'] . "</div><div style='text-align:center'>" . $row['price'] . " $</div><div style='text-align:center'>Dimension: " . $row['height'] . "*" . $row['width'] . "*" . $row['length'] . "</div></div>";
        }
    }
}
else
{
    echo "0 results";
}

// Close connection
mysqli_close($conn);
?>

		<script type="text/javascript">
		function add(e){
			window.location.href="add.php";
		}
		function massDelete(e){
			var selected=$('input[type=checkbox]:checked').map(function(_, el) {
    						return $(el).val();
						}).get();
						$.ajax({
          url: 'https://products-list009870.000webhostapp.com/delete.php',
          type: 'post',
          data: {data:selected},
          success: function( data ) {
			window.location.reload();
          }
        });
		}
		</script>
</body>

</html>
