<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <!-- sign up -->
    <div class="container" id="signUp" style="display: none;">
        <h1>Register</h1>
        <form action="register.php" method="post">
            <label for="fName">
                First Name
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
            </label>
            <label for="lName">
                Last Name
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            </label>
            <label for="email">
                Email
                <input type="email" name="email" id="email" placeholder="Email" required>
            </label>
            <label for="password">
                Password
                <input type="password" name="password" id="password" placeholder="Password" required>
            </label>
            <label class="gender">
                <input type="radio" value="male" name="gender" class="radio">
                Male
            </label>
            <label class="gender">
                <input type="radio" value="female" name="gender" class="radio">
                Female
            </label>
            <input type="submit" name="signUp" id="signUp" value="Sign Up" class="button">
        </form>
        <p class="or">
            ---------------------OR---------------------
        </p>
        <div class="icons">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-google"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>
        <div class="links">
            <p>Already Have Account ?</p>
            <button id="logInBtn">Log In</button>
        </div>
    </div>

    <!-- log in -->
    <div class="container" id="logIn">
        <h1>Log In</h1>
        <form action="register.php" method="post">
            <label for="email">
                Email
                <input type="email" name="email" id="email" placeholder="Email" required>
            </label>
            <label for="password">
                Password
                <input type="password" name="password" id="password" placeholder="Password" required>
            </label>
            <p class="recover">
                <a href="#">Recover Password</a>
            </p>
            <input type="submit" name="logIn" id="logIn" value="Log In" class="button">
        </form>
        <p class="or">
            ---------------------OR---------------------
        </p>
        <div class="icons">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-google"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>
        <div class="links">
            <p>Don't have account yet?</p>
            <button id="signUpBtn">Sign Up</button>
        </div>
    </div>
    <script src="main.js"></script>
</body>
</html>