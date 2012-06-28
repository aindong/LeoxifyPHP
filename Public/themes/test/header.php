<!DOCTYPE>
<html>
<head>
    <title><?php echo $this->pageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>Public/themes/test/style/style.css" />
</head>

<body>
<div id="main-wrapper">

    <header>
        <h1>LeoxifyPHP Framework</h1>
    </header>

	<nav>
		<ul>
			<li><a href="<?php echo URL; ?>index">Home</a></li>
			<li><a href="<?php echo URL; ?>about">About</a></li>
			
			<?php if( Session::get(loggedIn) == true ) { ?>
            		<li><a href="<?php echo URL; ?>dashboard/logout">Logout</a></li>
            	<?php } else { ?>
            		<li><a href="<?php echo URL; ?>login">Login</a></li>
            	<?php } ?>

		</ul>
	</nav>

    <div id="main-content">

	<div id="content">
    