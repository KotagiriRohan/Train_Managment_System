<?php
include_once "pdo.php";
if (isset($_POST['username']) && isset($_POST['comp_sub']) && isset($_POST['comp_desc'])) {
    $sql = "INSERT INTO `complaint`(`Comp_Subject`, `Comp_Desc`,`Username`) 
            VALUES (:comp_sub,:comp_desc,:username)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':comp_sub',$_POST['comp_sub']);
    $stmt->bindValue(':comp_desc',$_POST['comp_desc']);
    $stmt->bindValue(':username',$_POST['username']);
    $stmt->execute();
    echo '<script type="text/javascript"> alert("Complaint sent  Successfully");</script>';
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
        padding: 3% 4.5% 3% 4.5%;
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
        <p>Complaint Page</p>
    </header>
    <hr>
    <div class="container">
        <div class="card">
            <h1>Complaint</h1>
            <br><br>
    <form method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <label for="comp_sub">Complaint Subject:</label>
                <input type="text" name="comp_sub" id="comp_sub">
                <label for="comp_desc">Complaint Description:</label>
                <textarea name="comp_desc" id="comp_desc" rows="10S" ></textarea>
                <input class="button" type="submit" value="Submit">
                <button class="button" type="button"><a href="home.html">Back</a></button>
            </form>
            </div>
            </div>
    </body>
</html>