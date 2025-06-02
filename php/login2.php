<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <script src="../js/login.js"></script>
    <div id="main">
        <div id="ins_logo">Login</div>
        <div id="content">
            <form action="logincheck.php" method="post">
                <div id="validate">
                    Username or Password is incorrect
                </div>
                <div id="un">
                    <div class="un1">
                        <label for="username">User ID</label>
                    </div>
                    <div class="un2">
                        <input type="text"  name="username" id="username">
                    </div>
                    
                </div>
                <div id="pas">
                    <div id="pass1"> 
                        <label for="password">Password</label>
                    </div>
                    <div id="pass2">
                        <input type="password" id="password" name="password">
                        <button type="button" id="eye" onclick="visible()">
                            <img src="../img/eye.png" alt="Show/Hide" title="Show" id="toggle-icon">
                        </button>
                    </div>
                </div>
                <div id="fg">
                    <a href="../php/useridcheck.php">Forget Password?</a>
                </div>
                <div id="sub">
                    <button id="log"><input type="submit" value="Login"></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>