<?php

    require '../Libs/Form.php';
    
        if (isset($_REQUEST['run'])) {
        
        try {
            $form = new Form();
        
            $form         ->post('name')
                          ->val('minlength', 2)
                          
                          ->post('age')
                          ->val('minlength', 2)
                          ->val('digit')
                          
                          ->post('gender')
                          
                          ->post('email')
                          ->val('email');
            
            //print_r($form) . "<br/>";
            $form   ->submit();
            
            echo "The form passed";
            $data = $form->fetch();
            
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
?>

<form method="post" action="?run">
    Name : <input type="text" name="name" /> <br />
    Age : <input type="text" name="age" /> <br />
    Email : <input type="text" name="email" /> <br />
    <select name="gender">
        <option value="M" selected="selected">Male</option>
        <option value="F">Female</option>
    </select> <br />
    <input type="submit" />
</form>