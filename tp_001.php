<?php
//$personnes = [
//    1 => ['name' => 'Khalid', 'age' => 25],
//    2 => ['name' => 'Amel', 'age' => 4],
//    3 => ['name' => 'Noam', 'age' => 1],
//    4 => ['name' => 'Julio', 'age' => 21]
//];
//echo '<h3>Plus de 18 ans :</h3>';
//foreach ($personnes as $p){
//    if ($p['age'] > 18){
//        echo '<p>' . $p['name'] . ' a plus de 18 ans. </p>';
//    }
//}
//echo '<h3>Somme des ages des mineurs :</h3>';
//$sum = 0;
//foreach ($personnes as $p){
//    if ($p['age'] < 18){
//        $sum = $sum + $p['age'];
//    }
//}
//echo '<p>La somme des ages est de ' . $sum . '</p>' ;

$cars = [
    "peugeot" => [
        ["make" => "5008" , "year" => 2015 , "doors" => 5 ],
        ["make" => "3008" , "year" => 2009 , "doors" => 5 ],
        ["make" => "108" , "year" => 2015 , "doors" => 3 ],
        ["make" => "208" , "year" => 2015 , "doors" => 2 ],
        ["make" => "106" , "year" => 1999 , "doors" => 3 ]
    ],
    "renault" => [
        ["make" => "Megane" , "year" => 2015 , "doors" => 5 ],
        ["make" => "Scénic" , "year" => 2009 , "doors" => 5 ],
        ["make" => "Clio" , "year" => 2015 , "doors" => 3 ],
        ["make" => "R5" , "year" => 1980 , "doors" => 3 ]
    ]
];

echo '<h3>1/</h3>';
$string = '<p>Les Peugeot qui ont 5 portes sont : <br>';
$tp = [] ;
foreach ($cars["peugeot"] as $peugeot){
    if ($peugeot["doors"] === 5 ){
        $tp[] = $s ='la Peugeot ' . $peugeot["make"] . " de " . $peugeot["year"] ; ;
    }
}
$tpString = implode(" | " , $tp);
$string .= $tpString . "</p>";
echo $string ;

echo '<h3>2/</h3>';
$string = "<p>Les Renaults d'avant 2010 sont : </p><ul>" ;
foreach ($cars["renault"] as $renault){
    if ($renault["year"] < 2010 ){
        $s ='la Renault ' . $renault["make"] . " , de " . $renault["year"] ;
        $string .= "<li>" . $s .'</li>';
    }
}
$string .= '</ul>';
echo $string;

echo '<h3>3/</h3>';
$newCar = ["make" => "2008" , "year" => 2022 , "doors" => 4 ];
//array_push( $cars["peugeot"] , $newCar );
$cars["peugeot"][] = $newCar;
var_dump($cars["peugeot"]);

echo '<h3>4/</h3>';
$tab = $cars["peugeot"] ;
foreach ( $cars["peugeot"] as $key => $value ){
    if ($value["year"] < 2010 ){
        array_splice( $tab , $key , 1 );
        echo "<p> - " . $value["make"] . " de " . $value["year"] . " a été supprimé !</p>";
    }
}
$cars["peugeot"] = $tab ;
var_dump($cars["peugeot"]);
