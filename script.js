var settingsmenu = document.getElementById('logout');
var display=0;

function settingsMenuToggle() 
{
    if (display ==1)
    {
        div.style.display ='block';
        display=0;
    }
    else
    {
        settingsmenu.style.display='none';
        settingsmenu = 1;
    }
}

function redirectLogin() {
    document.getElementById("loginForm").action = "newsfeed.php";
}
