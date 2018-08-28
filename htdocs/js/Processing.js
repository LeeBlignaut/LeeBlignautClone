


function logOut(cookie_name)
{
    x = confirm('Are you sure you want to log out?');
    
    
    if (x==true)
    {
  cookie_date = new Date ( );  
  cookie_date.setTime (cookie_date.getTime() - 1);
  document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
    }
    
    
} 


