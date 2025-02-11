<?php


  try
  {
    $strConnection = 'mysql:host=localhost:3307;dbname=gestion_Cite';
    $pdo = new PDO($strConnection,'root','');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  }

   catch(PDOException $e)
  {
    $msg = 'Erreur PDO dans ' . $e->getMessage();
    die($msg);
  }



  