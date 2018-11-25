<?php 
			$startTime = microtime(true);
			$x = $_POST["SelectX"];
			$y = $_POST["Y"];
			$r = $_POST["SelectR"];
			$res = 'no';
			
			if (!is_numeric($x) || !is_numeric($r) || !is_numeric($y)){
				header("HTTP/1.1 488 Input data");
				exit;
			}

			if ($y <= -5 || $y >= 5 ){
				header("HTTP/1.1 488 Wrong input Y");
				exit;
			}


			if ($x >= 0.0) {
				if ($y > 0.0) 
				{
					if ($x * $x + $y * $y <= $r * $r / 4)
					{
						$res = 'yes';
					}
				}
				else
				{
					if ($y >= $x - $r){
						$res = 'yes';
					}
				}
			}
			else 
			{
				if ($y <= 0.0 && $x >= -$r && $y >= -$r/2)
				{
					$res = 'yes';
				}
			}
		?>
<!DOCTYPE html>
<html>
<head>
	<title>IAD 1 Response</title>
	<meta charset="utf-8">
	<style>
		body{
    		margin: 0;
            background-color: #f2f2f2;
            color: #000000;
    		font-family: Times;
    	}
    	header{
            min-width: 900px;
    		height: 70px;
    		width: 100%;
    		font-family: Geneva, sans-serif;
    		color: #000000;
    		font-size: 20px;
    		background-color: #1E90FF;
    		border-radius: 0 0 10px 10px; 
    	}
    	header > .header-text{
    		margin: 0 7%;
    		float: left;
    	}
    	header > .header-image{
    		float: right;
    		margin: 0px 7%;
    	}

    	#VT-img{
    		height: 70px;
    		width: 70px;
    	}

    	.border {
				border: 2px solid #1E90FF;
				text-align: center;
			}
		#result {
				font-size: 20px;
				width: 500px;
				margin: 100px 35% 0 35% ;
			}
	</style>
</head>
<body>
<header>
	<div class="header-text">
		<div>Сергей Кочарян, Александр Артамонов</div>
		<div>P3218</div>
		<div>Вариант 28806</div>
	</div>
	<div class="header-image">
		<img id="VT-img" src="images/VT.jpg">
	</div>
</header>
		
		<div class="border" id="result">
			<?php echo "X:" . $x; ?> <br>
			<?php echo "Y:" . $y; ?> <br>
			<?php echo "R:" . $r; ?> <br>
			<?php echo "Hit:" . $res; ?> <br>
			<?php echo "Current time: " . date('Y-m-d H:i:s'); ?> <br>
			<?php
				echo "Script execution time: " . (microtime(true) - $startTime) . " sec";
			?>
		</div>
</body>
</html>
