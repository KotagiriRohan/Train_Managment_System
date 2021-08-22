<?php
require_once "pdo.php";
if (isset($_POST['username'])&& isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {
    $sql = "INSERT INTO customer (Username, Fname, Lname, Address, Phone_No, Password)
             VALUES (:username, :firstname, :lastname, :address, :phone_no, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':firstname', $_POST['firstname']);
    $stmt->bindParam(':lastname', $_POST['lastname']);
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':phone_no', $_POST['MobileNo']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->execute();
    $sql2 = "INSERT INTO `smartcard`(`Card_No`, `Balance`, `Username`, `Admin_Id`)
             VALUES (:card_no,:balance,:username,'1')";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':username', $_POST['username']);
    $stmt2->bindParam(':balance', $_POST['amount']);
    $stmt2->bindParam(':card_no', $_POST['card_no']);
    $stmt2->execute();
    echo '<script type="text/javascript"> alert("Sign Up Successful");</script>';
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



    header {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px 10%;
        background-color: rgba(0, 0, 0, 0.8);
        border-top: white solid 2px;
    }

    p {
        font-size: 20px;
        font-weight: 500;
        color: #edf0f1;
        text-decoration: none;
    }

    hr {
        border: white solid 1px;
        width: 100%;
    }

    .container {
        margin-top: 5%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;

    }

    .card {
        background-color: #fffafa;
        padding: 1.5% 4.5% 1.5% 4.5%;
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

    input,textarea {
        display: block;
        margin: 0.5%;
        border: lawngreen solid 0.5px;
        font-size: 25px;
    }

    label,textarea {
        font-size: 20px;
        font-weight: 500;
        margin: 0.5%;
    }

    .button {
        margin-top: 5%;
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
        <p>SignUp Request</p>
    </header>
    <hr>
    <div class="container">
        <div class="card">
            <h1>SignUp</h1>
            <br><br>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <label for="firstname">First Name: &ThickSpace;</label>
                <input type="text" name="firstname" id="firstname">
                <label for="lastname">&ThickSpace;&ThickSpace; Last Name: &ThickSpace;</label>
                <input type="text" name="lastname" id="lastname"> <br>
                <label for="address">Address:</label>
                <textarea name="address" id="address" rows="4" ></textarea>
                <label for="MobileNo">MobileNo: </label>
                <input type="text" name="MobileNo" id="MobileNo"> <br>
                <label for="card_no">Card No:</label>
                <input type="text" name="card_no" id="card_no">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount">
                <input class="button" type="submit" value="Submit">
                <button class="button" type="button"><a href="home.html">Back</a></button>
                
            </form>
        </div>
    </div>

</body>

</html>