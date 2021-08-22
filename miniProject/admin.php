
<?php
    include_once "pdo.php";
    if (isset($_POST['updat'])) {
        echo("success");
        $comp_no = $_POST['updat'];
        $sql2 = $pdo->query("UPDATE `complaint` SET `Comp_Status`='Replied' WHERE complaint.Comp_Id = $comp_no ;");
    }
?>
<?php
    include_once "pdo.php";
    if (isset($_POST['card_update'])){
        echo("Card success");
        $card_update = $_POST['card_update'];
        $sql4 = $pdo->query("UPDATE `smartcard` SET `Card_Status`='Approved' WHERE Card_No = '$card_update';");
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
    a{
        text-decoration: none;
    }
</style>
    <body>
    <header>
        <p>Manage Admin</p>
    </header>
    <hr>
    <div class="container">
        <div class="card">
            <h1>Approval List</h1>
            <br><br>
        <form method="post" >
            <input class="button" type="Submit" name="complain_form" Value="View Complain Form"><br>
            <table cellspacing="15";>
                <?php
                    include_once "pdo.php";
                    if (isset($_POST['complain_form'])) {
                        $sql = $pdo->query("SELECT * FROM `complaint` WHERE Comp_Status = 'Not_Replied'");
                        echo "<tr><th>";
                        echo ('Comp_Id');
                        echo ("</th><th>");
                        echo ('Comp_Subject');
                        echo ("</th><th>");
                        echo('Comp_Desc');
                        echo ("</th><th>");
                        echo('Username');
                        echo ("</th><th>");
                        echo('Comp_Status');
                        echo ("</th></tr>\n");
                        while ( $row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr><td>";
                            echo ($row['Comp_Id']);
                            echo ("</td><td>");
                            echo ($row['Comp_Subject']);
                            echo ("</td><td>");
                            echo ($row['Comp_Desc']);
                            echo ("</td><td>");
                            echo ($row['Username']);
                            echo ("</td><td>");
                            echo($row['Comp_Status']);
                            echo ("</td><td>");
                            $temp = $row['Comp_Id'];
                            echo('<form method="post"><input type="hidden" id="updat" name="updat" value="'.$temp.'">');
                            echo('<input type="Submit" value="Mark Read"></form>');
                            echo ("</td></tr>\n");
                        }
                    }
                ?>
            </table>
        </form>
        <form method="post">
            <input class="button" type="Submit" name="smart_card" Value="Smart Card Requests">
            <table cellspacing="15";>
                <?php
                    include_once "pdo.php";
                    if (isset($_POST['smart_card'])) {
                        $sql3 = $pdo->query("SELECT * FROM `smartcard` WHERE smartcard.Card_Status = 'Pending'");
                        echo "<tr><th>";
                        echo ('Card_No');
                        echo ("</th><th>");
                        echo ('Balance');
                        echo ("</th><th>");
                        echo('Admin_Id');
                        echo ("</th><th>");
                        echo('Username');
                        echo ("</th><th>");
                        echo('Card_Status');
                        echo ("</th></tr>\n");
                        while ( $row2 = $sql3->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr><td>";
                            echo ($row2['Card_No']);
                            echo ("</td><td>");
                            echo ($row2['Balance']);
                            echo ("</td><td>");
                            echo ($row2['Admin_Id']);
                            echo ("</td><td>");
                            echo ($row2['Username']);
                            echo ("</td><td>");
                            echo($row2['Card_Status']);
                            echo ("</td><td>");
                            $temp2 = $row2['Card_No'];
                            echo('<form method="post"><input type="hidden" id="card_update" name="card_update" value="'.$temp2.'">');
                            echo('<input  type="Submit" value="Approve"></form>');
                            echo ("</td></tr>\n");
                        }
                    }
                ?>
            </table>
            <button class="button" type="button"><a href="adminLogin.php">Back</a></button>
        </form>
    </div>
    </div>
    </body>
</html>