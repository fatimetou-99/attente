<?php

class admin{
    static function isloggedA(){
        if(isset($_SESSION['admin']) && isset($_SESSION['admin']['login']) && isset($_SESSION['admin']['pwd']) ){
           extract($_SESSION['admin']);


            return true;
            }

    else{
        return false;
    }

}
}
?>