
<!DOCTYPE HTML>
<html>
	<head>
            <?php require './Product.php';?>
            <?php 
            $counter=0;
                session_start();
                if (isset($_SESSION['CART'])) 
                    {
                   
                    $arrCart = $_SESSION['CART'];
                   
                   
                    foreach ($arrCart as $key => $value) 
                        {
                        
                        $id = $key;
                        $price = $value;
                        if (!$id =='') 
                            {
                            
                        $counter++;
                        
                            }
                        
                        
                    }
                    }
                           
                    
                else
                {
                      
                     $arrCart = array(''=>'');
                    $_SESSION['CART'] = $arrCart;
                  
                }
                
               
            ?>
            
		<title>Smart Store | Home </title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
                <script src="js/Processing.js" type="text/javascript"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
            	
		<div class="wrap">
		<!----start-Header---->
		<div class="header">
			<div class="search-bar">
                            
                             <form> 
                    <input type="text" onkeyup="ShowHint(this.value)">
                    <input type="button" value="Search" />
                    </form>
                    <span id="txtHint"></span>
                 
          
                <script>
                    function ShowHint(hintGiven)
                    {
                        if (hintGiven.length == 0) 
                        {
                   document.getElementById("txtHint").innerHTML = "";
               }
               else
               {
                   xhttpReqeust = new XMLHttpRequest();
                   xhttpReqeust.onreadystatechange = function(){
                       if ((this.readyState == 4)&&(this.status == 200)) 
                       {
                   document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                   };

                   xhttpReqeust.open("GET","GetHint.php?hint="+hintGiven,true);
                   xhttpReqeust.send();
               }
                    }
        
    </script>
                                        
				
			</div>
			<div class="clear"> </div>
			<div class="header-top-nav">
				<ul>
					<li><a href="Login_Register.php">Register</a></li>
					<li><a href="Login_Register.php">Login</a></li>
                                        <li><a href="#"><span>shopping cart&nbsp;&nbsp;: </span></a><label> &nbsp;<?php echo $counter. ' items';?></label></li>
				</ul>
			</div>
			<div class="clear"> </div>
		</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
               
		<div class="top-nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="store.php">Store</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <?php 
                                   
                                    
                                    if (isset($_COOKIE['Logged_User'])) 
                                    {
                                   
                                    
                                    echo '<li><a href="AddProducts.php"> Add a Product</a></li>';
                                    echo '<li><a onclick="logOut(\'Logged_User\')" href="index.php">Log Out</a></li>';
                                     echo '<label>Logged in as : '. $_COOKIE['Logged_User'].'</label>';
                                   
                                    
                                    
                                    
                                }
                                else
                                {
                                    echo '<label>Not Logged in</label>';
                                }
                                
                                ?>
                                
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
	<!--start-image-slider---->
					<div class="wrap">
					<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					      <li><img src="images/1.png" alt=""></li>
					      <li><img src="images/2.png" alt=""></li>
					      <li><img src="images/012.png" alt=""></li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
					</div>
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="top-3-grids">
		    		<div class="section group">
				<div class="grid_1_of_3 images_1_of_3">
					  <img src="images/grid-img1.jpg">
					  <h3>Great Serivce </h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 second">
					  <img src="images/grid-img2.jpg">
					  <h3>Great Phones </h3>
				</div>
				<div class="grid_1_of_3 images_1_of_3 theree">
					   <img src="images/grid-img3.jpg">
					  <h3>At Affordable Prices</h3>
				</div>
			</div>
		    	</div>
		    	
		   
		    	
		    </div>
		    <div class="clear"> </div>
		    </div>
		<div class="footer">
			<div class="wrap">
			<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h3>Our Info</h3>
					<p>Smart Store is a small company consisting of less than 10 employees working hard night and day to bring you the best deals at an affordable price.</p>
				</div>
				
				<div class="col_1_of_4 span_1_of_4">
					
					<h3>Order-online</h3>
					<p>080-1234-56789</p>
					<p>080-1234-56780</p>
				</div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					<h3>News-Letter</h3>
                                        <form <?php $_SERVER['PHP_SELF']; ?> method="POST">
                                            <input name="txtEmail" type="text" value="">
                                            <input type="submit"  name="btnEmail" value="Add Email"/>
                                        </form>
                                                <?php 
                                                                                
                                                                                    
                                                                                
                                                                        if (isset($_POST['btnEmail'])) {
                                                                            
                                                                        
                                                         
                                                         
                                                                $email = $_POST['txtEmail'];
                                                                
                                                                $product = new Product('','' , '', '','' , '');
                                                                
                                                                $x = $product->InsertEmail($email);
                                                                
                                                                 
                                              if ($x == true) 
                                               {
                                                                                
                                                                             
                                                                echo "
                                                     <script language=\"JavaScript\">
                                                       alert('Your email was added to the newsletter!')
                                                       </script>
                                                         ";                   
                                                   
                                                                                
                                                                                
                                                }
                                                 else
                                                {
                                                   echo "
                                                     <script language=\"JavaScript\">
                                                       alert('Something went wrong and your emial could not be added')
                                                       </script>
                                                         ";
                                                }
                                                                        }     
                                                                      
                                                                                
                                                ?>
					
					<h3>Follow Us:</h3>
					 <ul>
					 	<li><a href="#"><img src="images/twitter.png" title="twitter" />Twitter</a></li>
					 	<li><a href="#"><img src="images/facebook.png" title="Facebook" />Facebook</a></li>
					 	<li><a href="#"><img src="images/rss.png" title="Rss" />Rss</a></li>
					 </ul>
				</div>
			</div>
		</div>
		
		<div class="clear"> </div>
		<div class="wrap">
		<div class="copy-right">
			<p>&copy; 2018 Smart Store. All Rights Reserved | Design by  <a href="http://w3layouts.com/">W3Layouts</a></p>
		</div>
		</div>
		</div>
                    
                   
	</body>
        
        
       
                            
        
</html>

