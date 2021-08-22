

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
        padding: 3% 3.5% 3% 3.5%;
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
    table {
        border="5"; 
        margin-top: 30px;
    }
    td,tr,th{
        margin: 5%;
        padding: 5%;
    }
    a{
        text-decoration: none;
    }
</style>

<body>
    <header>
        <p>My Bookings</p>
    </header>
    <hr>
    <div class="container">
        <div class="card">
            <h1>My Bookings</h1>
            <br><br>
            <form method="post">
                <label for="username">username</label>
                <input type="text" name="username" id="username">
                <input class="button" type="submit" value="Submit">
            </form>
            <table cellspacing="15";>
            <?php
                require_once "pdo.php";
                if (isset($_POST['username'])) {
                    $username = $_POST['username'];
                    $sql = $pdo->query("SELECT * FROM `booking` WHERE booking.Username = '$username' ");
                    echo "<tr><th>";
                    echo ('Train_Id');
                    echo ("</th><th>");
                    echo ('Username');
                    echo ("</th><th>");
                    echo('booking_status');
                    echo ("</th></tr>\n");
                    while ( $row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr><td>";
                        echo ($row['Train_Id']);
                        echo ("</td><td>");
                        echo ($row['Username']);
                        echo ("</td><td>");
                        echo($row['booking_status']);
                        echo ("</td></tr>\n");
                    }
                }
            ?>
            </table>
            <button class="button" type="button"><a href="home.html">Back</a></button>
        </div>
    </div>



</body>

</html>