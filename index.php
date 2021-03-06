<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktbuch</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@100&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Roboto Serif', sans-serif;
            background-color: #EAEDF8; 
            margin: 0;
        }
        .footer{
            padding: 100px;
            background-color: pink; 
            color: white;
            text-align: center;
        }
        .main{
            display: flex;
        }
        .menu{
            width: 20%;
            background-color: #746CF5;
            margin-right: 32px;
            padding-top: 10%;
            height: 100vh;
            padding-bottom: 0%;
            margin-bottom: 0%;
        }

        .menu a{
            display: block;
            text-decoration: none;
            color: white;
            padding:8px;
            display: flex;
            align-items: center;
        }

        .menu img{
            margin-right: 8px;
        }

        .menu a:hover{
            background-color: rgba(255, 255, 255, 0.1);
        }

        .content{
            height: 130vh;
            width:80%;
            margin-top: 150px;
            margin-right: 32px;
            background-color: white;
            border-radius: 8px;
            padding: 16px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .menubar{
            background-color: white;
            position: absolute;
            left: 0;
            right:0;
            top:0;
            height: 80px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
            padding-left: 50px;
            display: flex;
            justify-content: space-between;
        }

        .avatar{
            border-radius: 100%;
            background-color: yellowgreen;
            padding: 16px;
            width: 16px;
            height: 16px;
            display:flex;
            /*auf x-Achse positionieren*/ 
            justify-content:center;
            /** auf y-Achse positionieren */
            align-items: center;
            margin-right: 8px;

        }

        .myname{
            display: flex;
            margin-right: 50px;
            align-items: center;
        }

        .card{
            background-color: rgba(0, 0, 0, 0.05);
            margin-bottom: 16px;
            border-radius: 8px;
            padding: 8px;
            padding-left: 64px;
            position: relative;

        }
        .profilepicture{
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 2px solid white;
            position: absolute;
            left: 8px;
        }

        .phonebtn{
            border-style: none;
            background-color: rgba(0, 0, 0, 0.05);
            padding: 4px;
            color: #746CF5;
            text-decoration: none;
            border-radius: 4px;
            position: absolute;
            top: 0px;
            right: 0px;
            
        }

        .phonebtn:hover{
            background-color: rgba(0, 0, 0, 0.25);
        }

        .delete{
            border-style: none;
            background-color: rgba(0, 0, 0, 0.05);
            padding: 4px;
            color: #746CF5;
            text-decoration: none;
            border-radius: 4px;
            position: absolute;
            top: 47%;
            right: 0px;
            font-family: 'Roboto Serif', sans-serif;
            font-size: 15px;
        }

        .delete:hover{
            background-color: rgba(0, 0, 0, 0.25);
        }

        .back{
            backgroundcolor: #999900;
            padding: 4px;
            color: #746CF5;
            text-decoration: none;
            border-radius: 4px;
            position: absolute;
            top: 40%;
            left: 22%;
            border-style:none;
            font-family: 'Roboto Serif', sans-serif;
            font-size: 15px; 
        }

        .back:hover{
            background-color: rgba(0, 0, 0, 0.25);

        }

        @media only screen and (max-width: 768px) {
            [class="menu"] {
            width: 40%;
        }
        [class="menu"] {
            margin-top: 18%;
        }

        [class="menubar"] {
            width:100%;
            height: 20vh;

        }
        [class="myname"] {
            margin-left:35px;
        }

        [class="card"] {
            height: 20vh;
        }
        [class="content"] {
            height: 100%;
        }
        [class="headline"] {
            margin: 0%;
            padding: 4%;    
        }
        [class="avatar"] {
            margin-left: 30px;
        }
        [class="delete"] {
            margin-right:115px;
            margin-top: 40px;
        }
        [class="phonebtn"]{
            margin-right:170px;
            margin-top: 70px;
        }
    }

    </style>
</head>

<body>
    <div class="menubar">
        <h1 class="headline">My Contact Book</h1>
        <div class="myname">
            <div class="avatar">C</div>
            Carolin Wallisch
        </div>
    </div>
    <div class ="main">
    <div class="menu">
        <!-- Links der Seiten-->
        <a href ="index.php?page=start" ><img src="img/home.svg">Start</a>
        <a href ="index.php?page=contacts"><img src="img/book.svg">Kontakte</a>
        <a href ="index.php?page=legal"><img src="img/legal.svg">Impressum</a>
        <a href ="index.php?page=addcontact"><img src="img/add.svg">Kontakt hinzuf??gen</a>
        <a href ="index.php?page=deletecontact" display="none"></a>

        <!--<a href ="index.php?page=contacts&delete="><img src="img/add.svg">Kontakt hinzuf??gen</a>-->

    </div>
    <div class="content">
    <?php
    $headline = '';
    //Daten von Datenbank
    $servername = 'localhost';
    $user = 'root';
    $pw = '';
    $db = 'kontaktbuch';

    $con = new mysqli($servername, $user, $pw, $db);

    if($con->connect_error){
        die('Verbindung zur Datenbank fehlgeschlagen'.$con->connect_error);
    }


    //Name und Tel.nummer ??ber POST einlesen, zu Datenbank hinzuf??gen
    if(isset($_POST['firstname'])&&isset($_POST['phone'])&&isset($_POST['lastname'])){
        //keine unn??tigen Leerzeichen etc
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $phone = $_POST['phone'];
        
        $sql = "INSERT INTO user (firstname,lastname, phone) VALUES ('$firstname', '$lastname', '$phone')";
        //ob erfolgreich in Datenbank eingef??gt wurde
        if($con->multi_query($sql)===TRUE){
            echo 'Kontakt <b>'. $_POST['firstname'] .' '.$_POST['lastname'].'</b> wurde hinzugef??gt';
        }else{
            echo 'Einf??gen in Kontaktbuch fehlgeschlagen';
        }
     }

     
     $con -> close();

     //headline je nach Seite ??ndern
    if($_GET['page'] == 'contacts'){
        $headline = 'Deine Kontakte';
    }
    if($_GET['page'] == 'legal'){
        $headline = 'Impressum';
    }
    if($_GET['page'] == 'start'){
        $headline = 'Startseite';
    }
    if($_GET['page'] == 'addcontact'){
        $headline = 'Kontakt hinzuf??gen';
     }

    
    //Inhalt von page
    echo '<h1>' . $headline . '</h1>';

   //je nach Seite Inhalte ??ndern
    if($_GET['page'] == 'contacts'){
        $con = new mysqli($servername, $user, $pw, $db);
        if($con->connect_error){
            die('Verbindung zur Datenbank fehlgeschlagen'.$con->connect_error);
        }
        //in alphabetischer Reihenfolge ausgeben
        $sqlo = "SELECT * FROM user ORDER BY firstname ASC";
        $res = $con->query($sqlo);
        echo "
        <p>Auf dieser Seite hast du einen ??berblick ??ber deine <b>Kontakte</b></p>
        ";
        if($res->num_rows > 0){
            //Daten in assoziatives array, solange ausgeben, bis alles ausgegeben wurde
            while($i = $res->fetch_assoc()){
             //relevante Daten zwischenspeichern
            $firstname = $i["firstname"];
            $lastname = $i["lastname"];
            $phone = $i["phone"]; 
            $id = $i["ID"];
            //Vorname und Nachname zurechtschneiden
            $first = substr($firstname,0,1);
            $first = strtoupper($first);
            $rest = substr($firstname,1);
            $first2 = substr($lastname,0,1);
            $first2 = strtoupper($first2);
            $rest2 = substr($lastname,1);
            $name = $first.$rest. ' '.$first2.$rest2;

             //erstelle 'Karte' f??r jeden Kontakt
            echo "
            <div  class ='card'> 
            <img class='profilepicture' src = 'img/profile.svg'>  
            <b>$name</b><br><br>
               $phone<br>
            <!-- Nummer ist w??hlbar ??ber Klick-->
            <a class ='phonebtn' href='tel:$phone'>Anrufen</a>
            <!--Formular f??r L??schbutton, leitet zu einer Seite, wo Kontakt gel??scht wird-->
        <form action='?page=deletecontact' method='POST'>
                <!--key einbinden, um auf andere Seite zu ??bertragen-->
            <input type='hidden' name='index' value=$id>
            <input class= 'delete' type='submit' value='Kontakt l??schen'>
        </form>
            </div>";
        }
    }
    $con -> close();

    }else if ($_GET['page'] == 'legal'){
        echo "
            Hier kommt das Impressum hin
        ";
    }else if ($_GET['page'] == 'start'){
        echo 'Du bist auf der Startseite!';
    }else if($_GET['page'] == 'deletecontact'){
        //Seite nur auffindbar, wenn gebraucht
        if(!isset($_POST['index'])){
            exit('Seite so nicht aufrufbar!');
        }else{
        $id = $_POST['index'];
        $con = new mysqli($servername, $user, $pw, $db);
        if($con->connect_error){
            die('Verbindung zur Datenbank fehlgeschlagen'.$con->connect_error);
        }
        $sql3 = "DELETE FROM user WHERE ID='$id'";
        $res = $con->query($sql3);
        $con -> close();

        echo '
        <h1>Kontakt gel??scht</h1>
        <!--Button, um zur??ck zu den Kontakten zu kommen-->
        <form action="?page=contacts" method="POST">
        <input class="back" type="submit" name="btn" value="Zur??ck zu deinen Kontakten"> 
        </form>
        ';

    }
    }else if($_GET['page'] == 'addcontact'){

        echo "
        <div>
            Hier kannst du neue Kontakte hinzuf??gen
        </div>
        <form action='?page=contacts' method='POST'>
        <div>
            <input placeholder='Vornamen eingeben' name = 'firstname' pattern='[A-Za-z]{1,}[0-9]{0,10}' title='Namen d??rfen nur mit Buchstaben beginnen' required maxlength=255>
            <input placeholder='Nachnamen eingeben' name = 'lastname' pattern='[A-Za-z]{1,}[0-9]{0,10}' title='Namen d??rfen nur mit Buchstaben beginnen' required maxlength=255>

        </div>
        <div>
            <input placeholder='Telefonnummer eingeben' name='phone' required maxlength=15 pattern='[+]{0,1}[0-9]{9,15}' title='maximal 15 Zeichen, nur +-Zeichen und Zahlen m??glich'>
        </div>
            <button type = 'Submit'>Absenden</button>
        </form>
        ";
    }else{
        echo "Diese Seite existiert nicht";
    }

    
    ?>
    </div>
</div>

    <div class ="footer">
        (C) 2021 Developer GmbH
    </div>
    

</body>
</html>