<?php
echo "<h1>Who cares<h1/>";
if($_POST){
    if(isset($_POST['insert'])){
        insert();
    }elseif(isset($_POST['select'])){
        select();
    }
}

    function select()
    {
       echo "<h1>The select function is called.<h1/>";
    }
    function insert()
    {
       echo "The insert function is called.";
    }

?>