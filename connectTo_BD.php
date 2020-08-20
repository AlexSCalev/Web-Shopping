<?php
  $hostName="localhost";
  $userAccses="root";
  $password="";
  $datebaseName="web_shopping";
  $link = mysqli_connect($hostName,$userAccses,
  $password,$datebaseName) or die("Ошибка ".mysqli_error($link));
?>