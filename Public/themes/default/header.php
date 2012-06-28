<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $this->pageTitle; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/themes/default/styles/style.css" />
        
        <!-- Scripts -->
        <?php
            if ( isset($this->js) ) {
                foreach ( $this->js as $js ) {
                    echo '<script type="text/javascript" src="'.URL.$js.'"></script>';
                }
            }
        
        ?>
    
    
    </head>
    
    <body>
    <?php Session::init(); ?>
        <header>
            Header is here
            <br />
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>about">About</a>
            
            <?php if( Session::get(loggedIn) == true ) { ?>
            <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
            <?php } else { ?>
            <a href="<?php echo URL; ?>login">Login</a>
            <?php } ?>
            
        </header>
        
        <div id="content">
    
        