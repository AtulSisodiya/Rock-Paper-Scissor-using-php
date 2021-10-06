<?php
function mod($a, $n)
{
    return ($a % $n) + ($a < 0 ? $n : 0);
}

function check($computer, $human)
{
    $result = mod($computer - $human, 3);
    if ($result == 2) {
        return "You Win";
    } elseif ($result == 1) {
        return "You Lose";
    } else {
        return "Tie";
    }
}

    $host = $_SERVER['HTTP_HOST'];
    $root = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $url = "http://$host$root"; 

if (!isset($_GET["name"]) || strlen($_GET["name"]) < 1) {
    die("Name parameter missing");
}

if (isset($_POST["logout"])) {
    header("Location: $url/index.php");
    die();
}
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Atul Sisodiya</title>
</head>
<body style="font-family: Helvetica">
    <h1>Rock Paper Scissors</h1>
    <p>Welcome: <?php echo htmlentities($_GET["name"])?></p>
    <form method="post">
        <select name="human">
            <option value="-1">Select</option>
            <option value="0">Rock</option>
            <option value="1">Paper</option>
            <option value="2">Scissors</option>
            <option value="3">Test</option>
        </select>
        <input type="submit" name="play" value="Play">
        <input type="submit" name="logout" value="Logout">
    </form>
<?php
    echo "<pre>";
    $names = array('0' => "Rock", '1' => "Paper", '2' => "Scissors");
if (isset($_POST["human"]) && $_POST["human"] != -1 && is_numeric($_POST["human"])) {
    if ($_POST["human"] != 3) {
        $h = $_POST['human'];
        $c = rand(0, 2);
        echo "Your Play=". $names[$h] .
        " Computer Play=" . $names[$c] .
        " Result=" . check($c, $h);
    } else {
        for ($c=0; $c<3; $c++) {
            for ($h=0; $h<3; $h++) {
                $r = check($c, $h);
                print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
            }

        }
    }
} else {
        print "Please select a strategy and press Play.";
}
    echo "</pre>";
?>
</body>
</html>

<!-- Add more player--!>
