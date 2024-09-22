<?php if (!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title>Newton's Method</title>	
	
	<meta name="description" content="Newton's Method">
	<meta name="author" content="Nathaniel Webster">

	<!-- Internal styles not linked -->
	<style type="text/css">
		body{
			text-align: center;
			background-image: url(https://www.rebeccaruppresources.com/blog/wp-content/uploads/2020/03/math.jpg);
			background-size: cover;
			background-attachment: fixed;
			font-family: Allerta, "Varela Round", Voltaire, sans-serif;
			font-size: 20px;
			padding: 0;
			margin: 0;
			width: 100%;
			height: 100%;
		}
		* {
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
		}
		/* fluid column layout */
		.fluid1col, .fluid2col, .fluid3col, .fluid23col, .fluid4col, .fluid5col, .fluid6col, .fluid34col {
			padding:  10px 10px;
			position: relative;
			display: inline-block;
			width: 100%;
			float: left;
			-webkit-transition: all 0.5s ease;
			-moz-transition: all 0.5s ease;
			-o-transition: all 0.5s ease;
			transition: all 0.5s ease;	
		}
		@media screen and (min-width: 601px) {
			/* fluid columns */
			.fluid1col {
				width: 100%;
			}
			.fluid2col {
				width: 50%;
			}
			.fluid23col {
				width: 66.666666666666666%;
			}	
			.fluid3col {
				width: 33.33333333333%;		
			}
			.fluid34col {
				width: 75%;	
			}	
			.fluid4col {
				width: 25%;	
			}	
			.fluid5col {
				width: 20%;
			}
			.fluid6col {
				width:  16.6666666666%;
			}
		}
		@media screen and (max-width: 600px) {
			/* fluid columns */
			.fluid1col, .fluid2col, .fluid3col, .fluid23col, .fluid4col, .fluid5col, .fluid6col, .fluid34col {
				width:  100%;
			}
		}
		.clear {
			clear: both;
		}
		#faded-background{
			position: relative;
			display: inline-block;
			border-radius: 0.7em;
			margin-left: auto;
			margin-right: auto;
			width: 1000px;
			padding: 20px;
			background: rgba(179, 128, 255, 0.8);
			border: 10px solid #ff751a; /* the values in order are size, style, color */
		}
		.smallImage {
			border-radius: 0.5em; /* 50% border radius */
			box-shadow: 0px 0px 10px #333333; /* http://www.css3.info/preview/box-shadow/ */
			-moz-box-shadow: 0px 0px 10px #333333;
			-webkit-box-shadow: 0px 0px 10px #333333;
			padding: 5px; 
			background-color: #0099ff;
			width: 100px;
		}
		.normalImage {
			border-radius: 0.5em; /* 50% border radius */
			box-shadow: 0px 0px 10px #333333; /* http://www.css3.info/preview/box-shadow/ */
			-moz-box-shadow: 0px 0px 10px #333333;
			-webkit-box-shadow: 0px 0px 10px #333333;
			padding: 5px; 
			background-color: #0099ff;
			width: 200px;
		}
		.numberInputs{
			font-size: 25px;
			padding: 10px;
			border-radius: 0.4em;
			outline: none;
			width: 90%;
			background: #80dfff;
			color: #0000ff;
			margin-right: auto;
			margin-left: auto;
			margin-bottom: 30px;
		}		
		.buttons {
			background: #0031f7;
			background-image: -webkit-linear-gradient(top, #0031f7, #f01111);
			background-image: -moz-linear-gradient(top, #0031f7, #f01111);
			background-image: -ms-linear-gradient(top, #0031f7, #f01111);
			background-image: -o-linear-gradient(top, #0031f7, #f01111);
			background-image: linear-gradient(to bottom, #0031f7, #f01111);
			-webkit-border-radius: 28;
			-moz-border-radius: 28;
			border-radius: 28px;
			font-family: Arial;
			color: #ffffff;
			font-size: 20px;
			padding: 10px 20px 10px 20px;
			text-decoration: none;
			margin: 10px;
		}

		.buttons:hover {
			background: #2a90fc;
			background-image: -webkit-linear-gradient(top, #2a90fc, #ff2638);
			background-image: -moz-linear-gradient(top, #2a90fc, #ff2638);
			background-image: -ms-linear-gradient(top, #2a90fc, #ff2638);
			background-image: -o-linear-gradient(top, #2a90fc, #ff2638);
			background-image: linear-gradient(to bottom, #2a90fc, #ff2638);
			text-decoration: none;
		}
		.errorText {
			font-size: 25px;
			color: #ff0000;
		}
		/* default link styles */
		a:link, a:visited, a:active {
			color: #333333;
			text-decoration: underline;
		}
		a:hover {
			color: #ffa500;
			text-decoration: underline;
		}
	</style>

	<!-- Link to font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<!-- Put a faded background behind all elements -->
	<div id="faded-background">
		<!-- Put content in the middle of the page -->
		<div class="fluid1col">

			<!-- Title -->
			<h1>Newton's Method</h1>

			<!-- Recursive algorithm definition -->
			<h2>What is a Recursive algorithim?</h2>
			<p>It is a method of solving problems by turning them into smaller problems until you can solve them with simple math. </p>

			<!-- Newton's method definition (along with image of the algorithm) -->
			<h2>What is a Newton's Method?</h2>
			<img src="recursive-algorithim.JPG" class="normalImage"><br />
			<p>Newton’s method is a recursive algorithm that is used to calculate the square root of variable “a”. In the formula above “a” is the number we want to square root, “xn” is the current estimation of the square root, and “xn2” is the next estimation of the square root. It uses the formula in the picture to make its first estimate on the square root. This estimation becomes “xn” and the program runs through the formula again to get a better estimation. This continues until the estimation no longer changes after going through the formula. Once this happens we know that we’ve reached a pretty close estimation to the actual square root. </p>

			<img src="recursive-flowchart.JPG" class="normalImage">

			<!-- Works Cited page link -->
			<h2>Link to Works Cited page:</h2>
			<a href="https://docs.google.com/document/d/1gxgbXL83MwUktNGqdenTunT51PKfYmfXKDDbIvBZrK4/edit">Works Cited</a>

			<!-- Form description -->
			<p>This form allows the user to input a number they want square rooted and how many iterations of the recursion they want. It then uses the algorithm/formula to estimate the square root. For this program to work, it uses conditional statements and functions.</p>

			<!-- Form where the user can enter a number to be square rooted and the number of iterations-->
			<form name="Selection form" action="" method="post">
				<input type="number" name="squaredNumber" class="numberInputs" placeholder="Enter the number you want square rooted!" value="<?php echo $_POST['squaredNumber'] ?>"/><br />
				<input type="number" name="iterations" class="numberInputs" placeholder="Enter how many iterations you want it to do!" value="<?php echo $_POST['iterations'] ?>"/><br />

				<input type="submit" name="squareRoot" value="Square Root!" class="buttons" /><br />
			<hr size="1" />
			</form>

			<?php
				// Function to estimate the square root
				/* Variables are: original number, estimated square root that starts at the original number, and # of iterations */
				function estimateSquareRoot($a, $xn, $t) {


					for ($i=0; $i <= $t; $i++) { 
						//calculation for estimated square root
						$estSquareRoot = 0.5 * ($xn + ($a / $xn));

						//Echo the estimated square root
						echo " <br />" . $estSquareRoot . " ";
			
						/*Have xn equal the previous value of the estimated square root before doing the calculation again */
						$xn = $estSquareRoot; 
					}
					
				}
				// If the user clicks "Square Root!" 
				if ($_POST['squareRoot']) {
					
					//initialize variables
					$SN = $_POST['squaredNumber'];
					$iterations = $_POST['iterations'];

					//Set error to false
					$error = false;

					//Error if no numbers are given
					if ($SN  == "" OR $iterations == "") {
						$error = true;
						$errorMessage = "<p class='errorText'><i class='fa-solid fa-triangle-exclamation'></i> ERROR: <br />Please enter a number into each input field!</p>";
						echo " " . $errorMessage . " ";
					}
					//Error if either number is less than or equal to 0
					else if ($SN <= 0 OR $iterations <= 0) {
						$error = true;
						$errorMessage = "<p class='errorText'><i class='fa-solid fa-triangle-exclamation'></i> ERROR: <br />Both numbers must be greater than 0!</p>";
						echo " " . $errorMessage . " ";
					}
					//Error if # of iterations is greater than 20
					else if ($iterations > 20) {
						$error = true;
						$errorMessage = "<p class='errorText'><i class='fa-solid fa-triangle-exclamation'></i> ERROR: <br />You can only do a maximum of 20 iterations for the recursion!</p>";
						echo " " . $errorMessage . " ";
					}

					//If there are no errors
					if ($error == false) {
						//Estimate the square root of the number the user inputed
						echo "<h2>Estimated Square Root:</h2>";
						estimateSquareRoot($SN, $SN, $iterations);

						//Calculate the actual square root
						echo "<h2>Actual Square Root:</h2>";
						$squareRoot = sqrt($SN);
						echo " <br />" . $squareRoot . " ";


					}

				}
			?>
		</div>
	</div>

	

</body>
</html>
