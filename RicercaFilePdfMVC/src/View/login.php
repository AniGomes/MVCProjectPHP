<?php $this->layout('layout', ['title' => 'Login']) ?>

<?php
if (!empty($error)) { 
    echo $this->e($error); 
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>

<br><br>
<h2 style="text-align:center;">Login Page </h2><br>

<body>
    <form action="/login" method="post" >
        <div class="login">
            <input name="email" type="text" placeholder="Email" id="username" required="required">
            <input name="password" type="password" placeholder="Password" id="password" required="required">
            <input name="btnLogar" type="submit" value="Invia">
        </div>
        <div class="shadow"></div>
    </form>
    </div>
</body>

</html>