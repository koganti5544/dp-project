<!DOCTYPE html>
<html lang="en">

<head>
	<title>Product Add</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
</head>

<body>
		
		<form id="form" style="padding:10px 20px">
		<diV style="display:inline-block;width:49%;"><b>Product Add</b></div>
		<div  style="display:inline-block;width:50%;text-align:right"><button type="button" onclick="add()">Save</button> &nbsp;<button type="button" onclick="cancel(event)">Cancel</button></div>
		<hr>
			<p>
				<label for="Sku">SKU</label>
				<input type="text" name="sku" id="sku" required>
			</p>
			<p>
				<label for="Name">Name</label>
				<input type="text" name="name" id="name" required>
			</p>	
			<p>
				<label for="Price">Price ($)</label>
				<input type="text" name="price" id="price" required>
			</p>	
			<p>
				<label for="Type">Type Switcher</label>
				<select  name="type" id="type">
				<option>DVD</option>
				<option>Book</option>
				<option>Furniture</option>
				</select>
			</p>
			<div style="border:1px solid #efefef;display: inline-block;padding: 0px 20px 10px 20px;">
				<p class="dvd_form">
					<label for="Size">Size (MB)</label>
					<input type="text" name="size" id="size">					
				</p>
				<small class="dvd_form">*Please provide size in MB*</small>
			<p class="book_form">
			<label for="Weight">Weight (KG)</label>
			<input type="text" name="weight" id="weight">
			</p>
			<small class="book_form">*Please provide weight in KG*</small>
			<p class="furniture_form">
			<label for="Height">Height (CM)</label>
			<input type="text" name="height" id="height">
			</p>
			<p class="furniture_form">
			<label for="Width">Width (CM)</label>
			<input type="text" name="width" id="width">
			</p>
			<p class="furniture_form">
			<label for="Length">Length (CM)</label>
			<input type="text" name="length" id="length">
			</p>
			<small class="furniture_form">*Please provide dimensions in H*W*L*</small>
			</div>
			
		</form>

		<script type="text/javascript">
		function add(){
			var data = $('#form').serializeArray().reduce(function(obj, item) {
    						obj[item.name] = item.value;
    						return obj;
						}, {});
			$.ajax({
          	url: 'https://products-list009870.000webhostapp.com/insert.php',
          	type: 'post',
          	data: data,
          	success: function( data ) {
				window.location.href="index.php";
          	}
        	});
		}
		function cancel(event){
			//event.stopPropagation();
			window.location.href="index.php";
		}
		$(".dvd_form").show();
		$(".book_form").hide();
		$(".furniture_form").hide();
		$('#type').on('change', function() {
    	if($(this).find('option:selected').text()=="DVD"){
			$(".dvd_form").show();
			$(".book_form").hide();
			$(".furniture_form").hide();
		}else if($(this).find('option:selected').text()=="Book"){
			$(".dvd_form").hide();
			$(".book_form").show();
			$(".furniture_form").hide();
		}else if($(this).find('option:selected').text()=="Furniture"){
			$(".dvd_form").hide();
			$(".book_form").hide();
			$(".furniture_form").show();
		}
});

		</script>
</body>

</html>
