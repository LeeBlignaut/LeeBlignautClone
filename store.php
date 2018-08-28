<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
            <?php require './Product.php'; ?>
            <?php 
                        
             
                if (isset($_SESSION['CART'])) 
                    {
                   
                    $arrCart = $_SESSION['CART'];
                   
      
                        
                    }
                           
                    
                else
                {
                      
                     $arrCart = array(''=>'');
                    $_SESSION['CART'] = $arrCart;
                  
                }
                
               
            ?>
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
            
            
          
		<title>Smart Store | Store</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.livequery.js"></script>
		<link href="css/style1.css" rel="stylesheet" />
                <script src="js/Processing.js" type="text/javascript"></script>
		<script type="text/javascript">
                    

$(document).ready(function() {
	
	var Arrays=new Array();
	
	$('.add-to-cart-button').click(function(){
		
		var thisID 	  = $(this).parent().parent().attr('id').replace('detail-','');
		
		var itemname  = $(this).parent().find('.item_name').html();
		var itemprice = $(this).parent().find('.price').html();
		
		if(include(Arrays,thisID))
		{
			var price 	 = $('#each-'+thisID).children(".shopp-price").find('em').html();
			var quantity = $('#each-'+thisID).children(".shopp-quantity").html();
			quantity = parseInt(quantity)+parseInt(1);
			
			var total = parseInt(itemprice)*parseInt(quantity);
			
			$('#each-'+thisID).children(".shopp-price").find('em').html(total);
			$('#each-'+thisID).children(".shopp-quantity").html(quantity);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)-parseInt(price);
			
			prev_charges = parseInt(prev_charges)+parseInt(total);
			$('.cart-total span').html(prev_charges);
			
			$('#total-hidden-charges').val(prev_charges);
		}
		else
		{
			Arrays.push(thisID);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)+parseInt(itemprice);
			
			$('.cart-total span').html(prev_charges);
			$('#total-hidden-charges').val(prev_charges);
			
			var Height = $('#cart_wrapper').height();
			$('#cart_wrapper').css({height:Height+parseInt(45)});
			
			$('#cart_wrapper .cart-info').append('<div class="shopp" id="each-'+thisID+'"><div class="label">'+itemname+'</div><div class="shopp-price"> $<em>'+itemprice+'</em></div><span class="shopp-quantity">1</span><img src="images/remove.png" class="remove" /><br class="all" /></div>');
			
		}
		
	});	
	
	$('.remove').livequery('click', function() {
		
		var deduct = $(this).parent().children(".shopp-price").find('em').html();
		var prev_charges = $('.cart-total span').html();
		
		var thisID = $(this).parent().attr('id').replace('each-','');
		
		var pos = getpos(Arrays,thisID);
		Arrays.splice(pos,1,"0")
		
		prev_charges = parseInt(prev_charges)-parseInt(deduct);
		$('.cart-total span').html(prev_charges);
		$('#total-hidden-charges').val(prev_charges);
		$(this).parent().remove();
		
	});	
	
	$('#Submit').livequery('click', function() {
		
		var totalCharge = $('#total-hidden-charges').val();
		
		$('#cart_wrapper').html('Total Charges: $'+totalCharge);
		
		return false;
		
	});	
	
	// this is for 2nd row's li offset from top. It means how much offset you want to give them with animation
	var single_li_offset 	= 200;
	var current_opened_box  = -1;
	
	$('#wrap li').click(function() {
	
		var thisID = $(this).attr('id');
		var $this  = $(this);
		
		var id = $('#wrap li').index($this);
		
		if(current_opened_box == id) // if user click a opened box li again you close the box and return back
		{
			$('#wrap .detail-view').slideUp('slow');
			return false;
		}
		$('#cart_wrapper').slideUp('slow');
		$('#wrap .detail-view').slideUp('slow');
		
		// save this id. so if user click a opened box li again you close the box.
		current_opened_box = id;
		
		var targetOffset = 0;
		
		// below conditions assumes that there are four li in one row and total rows are 4. How ever if you want to increase the rows you have to increase else-if conditions and if you want to increase li in one row, then you have to increment all value below. (if(id<=3)), if(id<=7) etc
		
		if(id<=3)
			targetOffset = 0;
		else if(id<=7)
			targetOffset = single_li_offset;
		else if(id<=11)
			targetOffset = single_li_offset*2;
		else if(id<=15)
			targetOffset = single_li_offset*3;
		
		$("html:not(:animated),body:not(:animated)").animate({scrollTop: targetOffset}, 800,function(){
			
			$('#wrap #detail-'+thisID).slideDown(500);
			return false;
		});
		
	});
	
	$('.close a').click(function() {
		
		$('#wrap .detail-view').slideUp('slow');
		
	});
	
	$('.closeCart').click(function() {
		
		$('#cart_wrapper').slideUp();
		
	});
	
	$('#show_cart').click(function() {
		
		$('#cart_wrapper').slideToggle('slow');
		
	});
	
});

function include(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return true;
  }
}

function getpos(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return i;
  }
}

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
                                    echo '<li><a onclick="logOut(\'Logged_User\')" href="store.php">Log Out</a></li>';
                                     echo 'Logged in as : '. $_COOKIE['Logged_User'];
                                   
                                    
                                    
                                    
                                }
                                else
                                {
                                    echo 'Not Logged in';
                                }
                                
                                ?>
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
		    <div class="content-grids">
		    	
<div align="left" style="min-height:800px;">
	
	<div id="cart_wrapper" align="center">
	
		<form action="#" id="cart_form" name="cart_form">
		
			<div class="cart-info"> </div>
			
			<div class="cart-total">
			
				<b>Total Charges:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span><?php 
                $arrCart = $_SESSION['CART'];
                                
                    
                                    $new = 0;
                                    $Total = 0;
                                foreach ($arrCart as $key => $value) 
                                    {
                                    
                                    $id = $key;
                                    $price = $value;
                                  
                                   
                                
                                    
                                    if (!$id=='') 
                                        {
                                        
                                     
                                        $Total = $Total + $price;
                                    }
                                }
                                
                                echo 'R'.$Total;
            ?></span>
				
				
			</div>
			
			
		
		</form>
	</div>
	
	<div id="wrap" align="center">
		
		<a id="show_cart" href="javascript:void(0)">View Total on Cart Items</a>
		
		<ul>
                 
                    <?php 
                    
                    $product = new Product("", "", "", "", "", "");
                    
                    $result = $product->SelectAll();
                    
                     while($row = mysqli_fetch_array($result))
                            {
                         echo '<li id="'.$row['Product_ID'].'">
                            <a href="single.php?id='.$row['Product_ID'].'" ><img height="200px" weight="285px" class="items" src ="'.$row["Product_Location"].'"/></a>
				<br clear="all" />
				
				<div>'.$row['Product_Name'].'</div>
			</li>';
                            }
                            
                   
                    
                    
                    
                    ?>
			
			
			
			
			
				
			</div>
			
			<br clear="all" />
		</ul>
		<br clear="all" />
	</div>
	
		
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
			<p>&copy; 2017 Smart Store. All Rights Reserved | Design by  <a href="http://w3layouts.com/">W3Layouts</a></p>
		</div>
		</div>
		</div>
	</body>
</html>

