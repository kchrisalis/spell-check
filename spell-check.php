<?php
include('functions.php');

// checking if file exists before running commands
$dictionaryFile = fileToArray("dictionary.txt", "\n");
$aliceFile = fileToArray("AliceInWonderLand.txt", " ");
$noDictionary = [];
// $message = "";

if (isset($_POST)) {
    // Single Word Check
    if (isset($_POST['single'])) {
        // Linear Check
        if ($_POST['single'] == 'linear' && !empty($_POST['singleWord'])) {
            $linear = linearSearch($dictionaryFile, $_POST['singleWord']);
            if ($linear == false) {
                $message = "Unable to find word in dictionary.";
            } else {
                $message = "'$linear' is in the dictionary.";
            }
        // Binary Check
        } else  if ($_POST['single'] == 'binary' && !empty($_POST['singleWord'])) {
            $binary = binarySearch($dictionaryFile, $_POST['singleWord']);
            if ($binary == false) {
                $message = "Not here.";
            } else {
                $message = "'$binary' showed up.";
            }
        // Empty Field
        } else {
            $message = "Please enter a value.";
        }

    // Alice in Wonderland Check
    } else if (isset($_POST['alice'])) {
        if ($_POST['alice'] == 'linear') {
           $message = print_r(aliceLinear($dictionaryFile, $aliceFile));
        } else if ($_POST['alice'] == 'binary') {
            $message = print_r(aliceBinary($dictionaryFile, $aliceFile));
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Spell Check</title>
</head>

<body>

    <h1>Single Word Check</h1>
    <form action="spell-check.php" method="POST">
        <input type="text" name="singleWord">
        <select name="single">
            <option value="linear">Linear Search</option>
            <option value="binary">Binary Search</option>
        </select>
        <input type="submit" value="Check">
        
        <p><?php if (isset($_POST['single'])) {
            echo $message;
            } ?></p>
    </form>

    <br>
    <hr>

    <h1>Alice In Wonderland Check</h1>
    <form action="spell-check.php" method="POST">
        <select name="alice">
            <option value="linear">Linear Search</option>
            <option value="binary">Binary Search</option>
        </select>

        <input type="submit" value="Spell Check">
        <p><p><?php if (isset($_POST['alice'])) {
            echo $message;
            } ?></p></p>
    </form>


</body>

</html>