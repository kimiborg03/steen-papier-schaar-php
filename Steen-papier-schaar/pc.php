<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Steen, Papier, Schaar!</title>
</head>

<body>
    <h1>Steen, papier, schaar</h1>
    <?php
    $keuze1 = isset($_GET['keuze1']) ? $_GET['keuze1'] : '';
    $keuze2 = isset($_GET['keuze2']) ? $_GET['keuze2'] : '';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['keuze1']) && !empty($_GET['keuze1'])) {
            $keuze1 = $_GET['keuze1'];
        } else {
            echo '<form action="" method="get">
                <label for="keuze1">Speler 1:</label>
                <button type="submit" name="keuze1" value="steen"><img src="rock.png" style="width: 350px;"></button>
                <button type="submit" name="keuze1" value="papier"><img src="paper.png" style="width: 350px;"></button>
                <button type="submit" name="keuze1" value="schaar"><img src="scissors.png" style="width: 350px;"></button>
            </form>';
        }

        if (isset($_GET['keuze2']) && !empty($_GET['keuze2'])) {
            $keuze2 = $_GET['keuze2'];
        } else {
            $options = ['steen', 'papier', 'schaar'];
            $keuze2 = $options[array_rand($options)];
        }
    }
    ?>

    <?php
    if (!empty($keuze1) && !empty($keuze2)) {
        echo '<h3>Computer koos ' . $keuze2 . '</h3>';

        if ($keuze1 == $keuze2) {
            echo '<h2>Gelijkspel!</h2>';
        } else {
            if ($keuze1 == 'steen' && $keuze2 == 'schaar') {
                echo '<h2>De winnaar is speler 1</h2>';
            } elseif ($keuze2 == 'steen' && $keuze1 == 'schaar') {
                echo '<h2>De winnaar is speler 2</h2>';
            } elseif ($keuze1 == 'schaar' && $keuze2 == 'papier') {
                echo '<h2>De winnaar is speler 1</h2>';
            } elseif ($keuze2 == 'schaar' && $keuze1 == 'papier') {
                echo '<h2>De winnaar is speler 2</h2>';
            } elseif ($keuze1 == 'papier' && $keuze2 == 'steen') {
                echo '<h2>De winnaar is speler 1</h2>';
            } elseif ($keuze1 == 'steen' && $keuze2 == 'papier') {
                echo '<h2>De winnaar is speler 2</h2>';
            }
        }
    }
    if (isset($_GET['reset'])) {
        $keuze1 = '';
        $keuze2 = '';
    }
    echo '<form action="" method="get">
            <button type="submit" name="reset" id="reset">Reset Game</button>
        </form>';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['redirect_to_index'])) {
        header("Location: index.php");
        exit();
    }
    echo
    '<form action="index.php" method="post">
        <button type="submit" name="redirect_to_index">Naar menu</button>
    </form>';
    ?>
</body>

</html>