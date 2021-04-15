<?php 
function fileToArray($file, $remove) {
    if (file_exists($file)) {
        $fopen = fopen($file, "r");
        $fread = fread($fopen, filesize($file));
        $words = array_map('trim', explode($remove, $fread));
        return $words;
    } else {
        echo 'file does not exist';
    }
}

function linearSearch($array, $word) {
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $word) {
            return $array[$i];
        }
    }
    return false;
}

function binarySearch($array, $word) {
    $low = 0;
    $high = count($array) - 1;

    while ($low <= $high) {
        $middle = floor(($low + $high) / 2);

        if ($word == $array[$middle]) {
            return $array[$middle];
        } else if ($word < $array[$middle]) {
            $high = $middle - 1;
        } else {
            $low = $middle + 1;
        }  
    }
    return false;
}

function aliceLinear($dictionary, $book) {
    $absent = 0;
    $noDictionary = [];

    for ($i = 0; $i < count($book); $i++) {
        $result = linearSearch($dictionary, $book[$i]);
        if ($result == false) {
            $absent++;
            array_push($noDictionary, $book[$i]);
        }
    }
    echo $absent. " words are not in the dictionary.";
    return $noDictionary;
}

function aliceBinary($dictionary, $book) {
    $absent = 0;
    $noDictionary = [];
    for ($i = 0; $i < count($book); $i++) {
        $result = binarySearch($dictionary, $book[$i]);
        if ($result == false) {
            $absent++;
            array_push($noDictionary, $book[$i]);
        }
    }
    echo $absent. " words are not in the dictionary.";
    return $noDictionary;
}
?>