
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

    body {
        background-image: url('https://images.pexels.com/photos/34950/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #cccccc;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 86%;
        margin-top: 5%;

    }

    .card {
        background-color: #fffafa;
        padding: 1% 1.5% 1% 1.5%;
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

    input,select {
        display: block;
        margin: 2%;
        border: lawngreen solid 0.5px;
        font-size: 15px;
    }

    label,select {
        font-size: 15px;
        font-weight: 500;
        margin: 2%;
    }

    select {
        margin-top: 5%;
        padding: 5% 5%;
        width: 200px
    }
    .button {
        margin-top: 5%;
        padding: 5% 10%;
        border: none;
        background-color: lawngreen;
        border-radius: 5%;
        cursor: pointer;
    }
    table {
        border="5"; 
        margin-top: 15px;
    }
    td,th{
        padding: 5%;
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
        <h1>Choose the Route</h1><br>
        <form method="post">
            <select name="route" id="route" >  
                <option value="route 1">Station 1(Hyderabad)</option>  
                <option value="route 2">Station 2(Bangalore)</option>  
                <option value="route 3">Station 3(Chennai)</option>  
            </select><br>
            <input class="button" type="Submit" value="Submit"><br>

        </form><br>
        <table  cellspacing="5"; >
        <?php
        require_once "pdo.php";
        if (isset($_POST['route'])) {
             $route = $_POST['route'];
             $sql = $pdo->query("SELECT Train_Id FROM train WHERE train.Route_Id = (
             SELECT Route_Id FROM `route` WHERE Route_Name = '$route'); ");
              echo "<tr><th>";
              echo ('Train_id');
              echo ("</th><th>");
              echo ('From_Station');
              echo ("</th><th>");
              echo('To_Station');
              echo ("</th><th>");
              echo ('Departure');
              echo ("</th><th>");
              echo ('Arrival');
              echo ("</th></tr>\n");
            while ( $row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $temp = $row['Train_Id'];
                $sql2 = $pdo->query("SELECT * FROM display_status WHERE Train_id = '$temp'");
                while ($row2 = $sql2->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>";
                    echo ($row2['Train_id']);
                    echo ("</td><td>");
                    echo ($row2['From_Station']);
                    echo ("</td><td>");
                    echo($row2['To_Station']);
                    echo ("</td><td>");
                    echo ($row2['Departure']);
                    echo ("</td><td>");
                    echo ($row2['Arrival']);
                    echo("</td><td>");
                    echo('<button class= "buttton" type="button"><a href="https://localhost/miniProject/Booking.php?var='.$row2['Train_id'].'">Book</a></button>');
                    echo ("</td></tr>\n");
                }
        
            }
        } 
        ?>
        </table><br>
        <button class="button" type="button"><a href="login.php">Back</a></button><br>
        </div>
        </div>
    </body>
</html>