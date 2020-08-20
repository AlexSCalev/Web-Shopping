
<?php 

class Card{
    public $id;
    public $img_link;
    public $name_car;
    public $price_car;
    public $state_car;
    public $year_car;
    // Construtors
    public function __construct($id,$img_link,$name_car,$price_car,$state_car,$year_car)
    {
        $this->id=$id;
        $this->img_link=$img_link;
        $this->name_car=$name_car;
        $this->price_car=$price_car;
        $this->state_car=$state_car;
        $this->year_car=$year_car;
    }    
    // geters value
    public function getId(){
        return $this->id;
    }
    public function getImg_link(){
        return $this->img_link;
    }
    public function getName_car(){
        return $this->name_car;
    }
    public function getPrice_car(){
        return $this->price_car;
    }
    public function getState_car(){
        return $this->state_car;
    }
    public function getYear_car(){
        return $this->year_car;
    }
}

// Make Cheker post elemenets
function chechPostElements(){
    $cardsFillter=array();
    foreach($_POST as $key => $value){
        if(strlen($value) != 0 && $value != "Select Car" && $value != "Year"){
         $cardsFillter[$key]=$value;
        }
    }
    return $cardsFillter;
}
// Maker Cards Objects
function MakeCardObject($link){
    $arrayCards = array();
    $qeury="SELECT * FROM cards_dates";
    $result=mysqli_query($link,$qeury);
    $countes=mysqli_num_rows($result);
    for($i=0;$i<$countes;$i++){
    $row = mysqli_fetch_row($result);
    $tempObject = new Card($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
    $arrayCards[] = $tempObject;
    }
    return  $arrayCards;
}
// Fillter for neccesar output dates . It return object array;
function compareCard($keyStep,$valueStep,$card){
    $coincides=false;
    if($keyStep == "startPrice"){
        if($valueStep <= $card->getPrice_car()){
            $coincides=true;
        }
    }
    if($keyStep == "endPrice"){
        if($valueStep >= $card->getPrice_car()){
            $coincides=true;
        }
    }
    if($keyStep == "car-model"){
        if($valueStep == $card->getName_car()){
            $coincides = true;
        }
    }
    if($keyStep == "used"){
        if($valueStep == $card->getState_car()){
            $coincides = true;
        }
    }
    if($keyStep == "car-year"){
        if($valueStep == $card->getYear_car()){
            $coincides = true;
        }
    }
    return $coincides;
}
function fillterCards($arraySteps,$arrayCards){
    $clearArray = array();
    $countCoencide = 0;
    // finish work this function
    foreach($arrayCards as $object){
        foreach($arraySteps as $key => $value){
            if(compareCard($key,$value,$object)){
                $countCoencide++;
            }
        }
        if($countCoencide == count($arraySteps)){
            array_push($clearArray,$object);
        }
        $countCoencide = 0;
    }
    return $clearArray;
}
// default date output and if user nothing don`t select
function empty_fillter($link){
    $qeury="SELECT * FROM cards_dates";
    $result=mysqli_query($link,$qeury);
    $countes=mysqli_num_rows($result);
    echo "<script>createRow('$countes');</script>";
    for($i=0;$i<$countes;$i++){
    $row = mysqli_fetch_row($result);
        echo "
        <script>
        createCard('$row[0]','$row[1]','$row[2]','$row[3]');
        </script>";
        }
    }
?>