<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
            <?php require './Login.php';?>
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
		<title>Smart Store | Contact</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
               
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
					<li><a href="#">Register</a></li>
					<li><a href="#">Login</a></li>
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
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="section group">				
				<div class="col span_1_of_3">
					
      			
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Enter Details Here :</h2>
                                        <form action="<?php $_SERVER['PHP_SELF']?>"method="POST">
					    	<div>
						    	<span><label>Username : </label></span>
                                                        <span><input type="text" name="txtUser"value=""></span>
						    </div>
						    <div>
						    	<span><label>Password : </label></span>
                                                        <span><input type="password" name="txtPass"value=""></span>
						    </div>
						  
						   <div>
                                                       <span><input type="submit" name="btnLogin"value="Login"></span>
                                                       <span><input type="submit" name="btnRegister"value="Register"></span>
                                                                
                                                                
                                                                <?php 
                                                                        if (isset($_POST['btnLogin']))
                                                                            {
                                                                            $user = $_POST['txtUser'];
                                                                            $pass = $_POST['txtPass'];
                                                                            
                                                                           
                                                                            $login = new Login($user, $pass);
                                                                            
                                                                            $x= $login->Login();
                                                                            
                                                                            if ($x == true) 
                                                                                {
                                                                                
                                                                                
                                                                                
                                                                                $cookie_name = "Logged_User";
                                                                                $cookie_value = $user;
                                                                                
                                                                                setcookie($cookie_name, $cookie_value, time() + 86400); // Cookie lasts one day upon creation
                                                                                
                                                                                
                                                                                header("location: index.php");
                                                                                
                                                                                
                                                                                
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "
                                                                                    <script language=\"JavaScript\">
                                                                                    alert('Username or Password Incorrect, Try Again')
                                                                                    </script>
                                                                                ";
                                                                            }
                                                                        }
                                                                        if (isset($_POST['btnRegister'])) 
                                                                            {
                                                                                $user = $_POST['txtUser'];
                                                                            $pass = $_POST['txtPass'];
                                                                            
                                                                             $login = new Login($user, $pass);
                                                                             
                                                                             $x= $login->InsertLogin();
                                                                             
                                                                             if ($x==1) 
                                                                                 {
                                                                                echo "
                                                                                    <script language=\"JavaScript\">
                                                                                    alert('Account created')
                                                                                    </script>
                                                                                ";
                                                                             }
                                                                             else
                                                                             {
                                                                                 echo "
                                                                                    <script language=\"JavaScript\">
                                                                                    alert('Account could not be registred')
                                                                                    </script>
                                                                                ";
                                                                             }
                                                                            }
                                                                ?>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
		    </div>
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
			<p>&copy; 2017 Smart Store. All Rights Reserved | Design by  <a href="http://w3layouts.com/">W3Layouts</a></p>
		</div>
		</div>
		</div>
	</body>
</html>

