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

    public function insert()
    {
        $con = new Controller();
        $ins = $con->insert();
?>
        <form action="customers/add" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Name</label></td>
            <td><input class="form-control" type="text" name="name" value="" required /></td></tr>
            <td><label>E-mail</label></td>
            <td><input class="form-control" type="email" name="email" value="" required /></td></tr>
            <tr><td></td><td><input type="submit" name="enviar" value="Add Customer" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
        
<?php
    }

}
