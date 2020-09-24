<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styl9.css">
        <title>Dane o zwierzętach</title>
    </head>
    <body>
        <section id="baner">
            <h1>ATLAS ZWIERZĄT</h1>
        </section>
        <section id="formularz">
            <h2>Gromady</h2>
            <ol>
                <li>Ryby</li>
                <li>Płazy</li>
                <li>Gady</li>
                <li>Ptaki</li>
                <li>Ssaki</li>
            </ol>
            <form action="index.php" method="post">
                <span>Wybierz gromadę</span>
                <input type="number" name="zwierze">
                <input type="submit" value="Wyświetl">
            </form>
        </section>
        <section id="lewy">
            <img alt="dzikie zwierzęta" src="zwierzeta.jpg">
        </section>
        <section id="srodkowy">
            <?php
                $connect = mysqli_connect('localhost', 'root', '', 'baza');

                if(isset($_POST['zwierze'])){
                    $zwierze = $_POST['zwierze'];

                        if($zwierze == 1){
                            echo "<h2>"."RYBY"."</h2>";
                        }else if($zwierze == 2){
                            echo "<h2>P�?AZY</h2>";
                        }else if($zwierze == 3){
                            echo "<h2>GADY</h2>";
                        }else if($zwierze == 4){
                            echo "<h2>PTAKI</h2>";
                        }else if($zwierze == 5){
                            echo "<h2>SSAKI</h2>";
                        }
                }

                $sql = "SELECT gatunek, wystepowanie FROM `zwierzeta` WHERE Gromady_id = $zwierze";
                $query = mysqli_query($connect, $sql);

                 while ($linia=mysqli_fetch_assoc($query)){
                    echo "<p>".$linia['gatunek']." ".$linia['wystepowanie']."</p>";
                }
                
                mysqli_close($connect);
            ?>
        </section>
        <section id="prawy">
            <h2>Wszystkie zwierzęta w bazie</h2>
            <?php           
                $connect = mysqli_connect('localhost', 'root', '', 'baza');
                $sql = "SELECT zwierzeta.id, zwierzeta.gatunek, gromady.nazwa FROM `zwierzeta` JOIN `gromady` ON zwierzeta.Gromady_id = gromady.id";
                $query = mysqli_query($connect, $sql);

                while ($wiersz = mysqli_fetch_assoc($query)) {
                    echo '<p>'.$wiersz["id"] . '. ' .  $wiersz["gatunek"] . ' ' . $wiersz["nazwa"].'</p>';
                }

                mysqli_close($connect);
               ?>
              </section>
        <section id="stopka">
            <a href="http://atlas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzętach</a>
            <p>autor Atlasu zwierząt: 01234567890</p>
        </section> 
    </body>   
</html>