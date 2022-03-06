<?php

namespace App;

class View
{
    public function __construct()
    {
        $con = new Controller();
        $rets = $con->rows();

        print '<table>';
        print '<tr><td><b>ID</td><td><b>Name</td><td><b>E-mail</td></td>';
        foreach($rets as $ret){
            print '<tr><td>'.$ret[0].'</td><td>'.$ret[1].'</td><td>'.$ret[2].'</td></td>';
        }
        print '</table>';
    }
}
