<?php
require_once "pdo.php";
if (isset($_POST['username'])&& isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = $pdo->query("SELECT * FROM `customer` WHERE customer.Username = '$username' AND customer.Password = '$password'; ");
    while ( $row = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo "success\n";
        echo $row['Username'];
        echo $row['Password'];
        ?>
        <script type="text/javascript">
        window.location = "route.php";
      </script>
      <?php
    }
}
?>

<html>
    <head>
        <title></title>
    </head>
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family:courier,arial,helvetica;

    }

    body {
        background-image: url('https://images.pexels.com/photos/34950/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #cccccc;
    }

    p {
        font-size: 20px;
        font-weight: 500;
        color: #edf0f1;
        text-decoration: none;
    }

    header {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px 10%;
        background-color: rgba(0, 0, 0, 0.8);
    }

    hr {
        border: white solid 1px;
        width: 100%;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 86%;

    }

    .card {
        background-color: #fffafa;
        padding: 7% 3.5% 7% 3.5%;
        text-align: center;
        border-radius: 10px;
        box-shadow: 2px 2px 4px #000000;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    input {
        display: block;
        margin: 2%;
        border: lawngreen solid 0.5px;
        font-size: 25px;
    }

    label {
        font-size: 20px;
        font-weight: 500;
        margin: 2%;
    }

    .button {
        margin-top: 10%;
        padding: 5% 10%;
        border: none;
        background-color: lawngreen;
        border-radius: 5%;
        cursor: pointer;
    }
    a {
        text-decoration: none;
    }
</style>

<body>
    <header>
        <p>User Login</p>
    </header>
    <hr>
    <div class="container">
        <div class="card">
            <h1>Login</h1>
            <br><br>
            <form method="post">
                <label for="username">username</label>
                <input type="text" name="username" id="username">
                <label for="password">password</label>
                <input type="password" name="password" id="password">
                <input class="button" type="submit" value="Submit">
                <button class="button" type="button"><a href="home.html">Back</a></button>
            </form>
        </div>
    </div>



</body>

</html>