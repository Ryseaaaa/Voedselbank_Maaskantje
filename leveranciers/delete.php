<form action="leveranciers.php?displaytype=processing" method="POST">
    Welke leverancier Wilt U Verwijderen:

    <select name="leverancier">
        <?php
        // sorry mika im stealing most of this cuz its late and i cant be fucked to find out everything sorry sorry
        include("database/dhb.php");

        $query = "SELECT * FROM `leverancier`";

        $result = $dhb -> query($query);

        //for each user make option
        foreach($result as $query => $leverancier){
            echo("<option value=");

            //for each user property
            foreach($leverancier as $property => $value){
                if($property == "LeverancierID"){
                    echo("\"".$value."\">");
                }
                if($property == "Bedrijfsnaam"){
                    echo($value."</option>");
                }
            }
        }
        ?>
    </select>
    <input type="submit" value="leverancier Verwijderen" name="type">
</form>