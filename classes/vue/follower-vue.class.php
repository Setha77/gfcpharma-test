<?php

    require_once  (__DIR__.'../../model/follower.class.php');
   

class Followvue extends Follower {


    public function showFollowers(){
        $res = $this->selectFollowers();
        return $res;
    }
}
