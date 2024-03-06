<?php
$antalGgr = isset($_COOKIE["Skapa"]) ? $_COOKIE["Skapa"] : 0; //Kollar om kakan finns, finns den inte får antalGgr värdet 0 annars tilldelas kakan antalGgr
$disabledCreate = isset($_COOKIE["Skapa"]); //Kollar om skapa finns, finns kakan så blir det true och annars false
$disabledDestroy = !$disabledCreate; // Blir destroy true blir create false och vice verse. 

if (isset($_POST["btnCreate"])) { //Skapar kakan och gör Create otillgänglig men Destroy tillgänglig
    setcookie("Skapa", $antalGgr, time() + 3600);
    echo "<p>Nu är kakan skapad</p>";
    $disabledCreate = true;
    $disabledDestroy = false;
}

if (isset($_POST["btnIncrease"])) { //Ökar kakan med ett om den finns, finns den inte skrivs "Skapa kaka först" ut. 
    if (isset($_COOKIE["Skapa"])) {
        $antalGgr++;
        setcookie("Skapa", $antalGgr, time() + 3600);
        echo "<p>Nu har kakan ökat med ett</p>";
    } else {
        echo "<p>Skapa kakan först</p>";
    }
}

if (isset($_POST["btnDestroy"])) {//Förstör kakan samt gör Create tillgänglig och destroy otillgänglig 
    setcookie("Skapa", "", time() - 3600);
    echo "<p>Nu är kakan förstörd</p>";
    $disabledCreate = false;
    $disabledDestroy = true;
}

if (isset($_POST["btnVisa"])) { //Visar kakans värde, finns inte kakan skrivs texten ut
    if (isset($_COOKIE["Skapa"])) {
        echo "<p>Kakans värde: $antalGgr</p>";
    } else {
        echo "<p>Finns ingen kaka</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie Test</title>
    <style>
        body {
            background-color: antiquewhite;
            text-align: center;
            padding-top: 10%;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <div>
        <article>
            <header>
                <h1>Kakor</h1>
            </header> 
            <article>
                <div class="minDiv">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <input type="submit" name="btnCreate" value="Skapa" <?php if($disabledCreate) echo "disabled"; ?> />
                        <input type="submit" name="btnDestroy" value="Förstöra" <?php if($disabledDestroy) echo "disabled"; ?> />
                        <input type="submit" name="btnIncrease" value="Öka" />
                        <input type="submit" name="btnVisa" value="Visa kakans värde" />
                    </form>
                </div>
            </article>
        </article>
    </div>
</body>
</html>

