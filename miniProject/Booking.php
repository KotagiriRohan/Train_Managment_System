<?php
include_once "pdo.php";
    $train_id = $_GET['var'];
    echo $train_id;
    $flag = 0;
    if (isset($_POST['cardno']) && isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $card_no = $_POST['cardno'];
        $sql = $pdo->query("SELECT * FROM `customer` WHERE customer.Username = '$username' AND customer.Password = '$password'; ");
        while ( $row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $flag = 1;
        }
        if ($flag == 1) {
            $sql2 = $pdo->query("SELECT Balance FROM `smartcard` WHERE Card_No = '$card_no';");
            while($row2 = $sql2->fetch(PDO::FETCH_ASSOC)) {
                if ($row2['Balance'] > 10) {
                    echo "Booking success";
                    $sql3 = "INSERT INTO `booking`(`Train_Id`, `Username`, `booking_status`) VALUES (:train_id,:username,'complete');";
                    $stmt = $pdo->prepare($sql3);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':train_id', $train_id);
                    $stmt->execute();
                    $famount = $row2['Balance'] - 10;
                    $sql4 = $pdo->query("UPDATE `smartcard` SET `Balance`='$famount' WHERE Card_No = '$card_no'; ");
                    echo '<script type="text/javascript"> alert("Booking Successful");</script>';
                }
                else {
                    echo '<script type="text/javascript"> alert("Booking Failed Low Balance");</script>';
                }
            }
        }
        
    }
?>

<html>
    <head>
        <title>

        </title>
    </head>
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;

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
        padding: 1.5% 4.5% 3% 4.5%;
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
        margin: 0.5%;
        border: lawngreen solid 0.5px;
        font-size: 25px;
    }

    label {
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
    a{
        text-decoration: none;
    }
</style>
    <body>
    <header>
        <p>Booking Train_Id <?php echo $train_id ;?></p>
    </header>
    <hr>
    <div class="container">
        <div class="card">
            <h1>Booking</h1>
        <form method="post">
            <label for="card_no">Card_No</label>
            <input type="text" id="card_no" name="cardno">
            <label for="username">username</label>
            <input type="text" name="username" id="username">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
            <input class="button" type="submit" value="Submit">
            <button class="button" type="button"><a href="route.php">Back</a></button>
        </form>
        </div>
    </div>
    </body>
</html>
