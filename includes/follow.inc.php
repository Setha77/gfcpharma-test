<?php

if(isset($_POST["follow"]))
{
    $email = htmlspecialchars($_POST["email"]);
    
    include_once "../classes/dbh.class.php";
    include_once "../classes/model/follower.class.php";
    include_once "../classes/controller/follower-contr.class.php";
    $follower =new Followercontr($email);

    
    $follower->createFollower();

    
    header("location: ../index.php?follow=true");  

}
if(isset($_POST["unfollow"]))
{
    $email = htmlspecialchars($_POST["email"]);
    
    include_once "../classes/controller/follower-contr.class.php";

    $follower =new Followercontr($email);

    
    $follower->removeFollower();

    
    header("location: ../index.php?follow=true");  

}
else{
    header("location: ../index.php");
}