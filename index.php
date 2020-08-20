<?php 
    include "index.html";
    include "dateProved.php";
    include "connectTo_BD.php";
    if(!empty($_POST)){
        // call Chec function - Remote Function
        if(!empty(chechPostElements())){
            $countes = count(fillterCards(chechPostElements(),MakeCardObject($link)));
          echo "<script>createRow('$countes');</script>";
          foreach(fillterCards(chechPostElements(),MakeCardObject($link)) as $card){
              $arrayTransfer = array();
              $arrayTransfer[] = $card->getId();
              $arrayTransfer[] = $card->getImg_link();
              $arrayTransfer[] = $card->getName_car();
              $arrayTransfer[] = $card->getPrice_car();
            echo "<script>
            createCard('$arrayTransfer[0]','$arrayTransfer[1]','$arrayTransfer[2]','$arrayTransfer[3]');
            </script>";
          }
        }else{
            empty_fillter($link);
        }
        
    }else{
        // call empty function draw for default
        empty_fillter($link);
    }
?>