<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="sheet.css">

<script type="text/javascript">

function SetStatus(text)
{
    document.getElementById("dataresult").innerHTML = text;
}

function PostData(data, url)
{
    $.ajax({
        type:"post",
        url: url,
        data: data,
        cache: false,
        success: function(result)
        {
            SetStatus(result);
        }
    });
}

$(document).ready(function(){
    $("#login").click(function(){
        var user = $("#user").val();
        var pass = $("#pass").val();
        var formData = "user=" + user + "&pass=" + pass + "&new=0";
        var pageURL = "mysql.php";
        if(user == '' || pass == '')
        {
            SetStatus("Invalid form information.");
        }
        else
        {
            PostData(formData, pageURL)
        }
        return false;
    });
    $("#new").click(function(){
        var user = $("#user").val();
        var pass = $("#pass").val();
        var formData = "user=" + user + "&pass=" + pass + "&new=1";
        var pageURL = "mysql.php";
        if(user == '' || pass == '')
        {
            SetStatus("Invalid form information.");
        }
        else
        {
            PostData(formData, pageURL)
        }
        return false;
    });
});
</script>
<title>User Portal</title>
<body>
<center><br><br>
<p class="titleText">PHP, MySQL, CSS, and Javascript all in one example!</p>
<table><tr><td>
<center>
<form>
    <input type="text" name="user" id="user" class="fInput" placeholder="User Name"><br>
    <input type="password" name="pass" id="pass" class="fInput" placeholder="Password"><br>
    <input type="submit" id="login" value="Log In" class="sendBtn">
    <input type="submit" id="new" value="New User" class="sendBtn">
</form>

</td></tr></table>

<p class="dataresult" id="dataresult">asd</p>
</body>