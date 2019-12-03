<html>

<head>
    <style>
        p.inline {
            display: inline-block;
        }
        
        span {
            font-size: 13px;
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */
        }
    </style>
</head>

<body onload="window.print();" onmouseover="window.location.href='regjistrimi-mallit';">
    <div style="margin-left: 5%">
        <?php
		if(isset($_POST['submitd'])){
	    include 'barcode128.php';
		$product = $_POST['emrimallit'];
		$barcode = $_POST['barcode'];
		// $rate = $_POST['rate'];

		for($i=1;$i<=$_POST['sasia'];$i++){
			echo "<p class='inline'><span ><b>Malli: $product</b></span>".bar128(stripcslashes($barcode))."<span ><b></b><span></p>&nbsp&nbsp&nbsp&nbsp";
		}
	}

		?>

    </div>
    <script>
    </script>
</body>

</html>