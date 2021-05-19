@php
    /**
    * Exercicio 1
    */
    $array = [];

    /**
    * Exercicio 2
    */
    $array = [1,3,2,4,5,7,6];

    /**
    * Exercicio 3
    */
    echo $array[2];

    /**
    * Exercicio 4
    */
    $arrayToString = implode(',', $array);

    echo "<br></br>";

    echo $arrayToString;

    /**
    * Exercicio 5
    */
    $stringToArray = explode(',', $arrayToString);

     echo "<br></br>";

    print_r($stringToArray);

    /**
    * Exercicio 6
    */
    $arrayContains = in_array(14, $stringToArray);

     echo "<br></br>";

    if(!$arrayContains) {
        echo "Não contem 14";
    }

    /**
    * Exercicio 7
    */
    $remover = [];

    foreach($array as $index => $numero) {
        if ($index >= 1 && $array[$index] < $array[$index - 1]) {
           array_push($remover, $array[$index]);
        }
    }

    echo "<br></br>";

    $array = array_diff($array, $remover);

    print_r($array);

    /**
    * Exercicio 8
    */
    unset($array[count($array)]);

    echo "<br></br>";

    print_r($array);

    echo "<br></br>";

    /**
    * Exercicio 9
    */
    echo count($array);

    echo "<br></br>";

    /**
    * Exercicio 10
    */
    $array = array_reverse($array);

    print_r($array);
@endphp