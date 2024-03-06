<?php
$antalGgr = isset($_COOKIE["Skapa"]) ? $_COOKIE["Skapa"] : 0;
$disabledCreate = isset($_COOKIE["Skapa"]);
$disabledDestroy = !$disabledCreate;

if (isset($_POST["btnCreate"])) {
    setcookie("Skapa", $antalGgr, time() + 3600);
    echo "<p>Nu är kakan skapad</p>";
    $disabledCreate = true;
    $disabledDestroy = false;
}

if (isset($_POST["btnIncrease"])) {
    if (isset($_COOKIE["Skapa"])) {
        $antalGgr++;
        setcookie("Skapa", $antalGgr, time() + 3600);
        echo "<p>Nu har kakan ökat med ett</p>";
    } else {
        echo "<p>Skapa kakan först</p>";
    }
}

if (isset($_POST["btnDestroy"])) {
    setcookie("Skapa", "", time() - 3600);
    echo "<p>Nu är kakan förstörd</p>";
    $disabledCreate = false;
    $disabledDestroy = true;
}

if (isset($_POST["btnVisa"])) {
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
