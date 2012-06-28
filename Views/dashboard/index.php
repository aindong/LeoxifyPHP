Dashboard... Welcome user

<br />
<form id="randomInsert" action="<?php echo URL; ?>dashboard/create" method="post">
    <input type="text" name="text" />
    <input type="submit" />
</form>

<br />
<hr />

    <?php
        foreach( $this->foo as $value) {
            echo $value['id'] . " => " . $value['text']."<br/>";
        }
        
    ?>