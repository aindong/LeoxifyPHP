<?php
    class View {
        function __construct() {
            //echo "This is the view class";
        }
        
        /**
         * insert
         * @param string $name The name of your view
         * @param string $noInclude Include the theme or not?
         */
        public function render($name, $noInclude = false) {
            
            //check if noinclude is true
            if ( $noInclude == true ) {
                require_once "Views/" . $name . ".php";
            }else {
                require_once "public/themes/" . THEME . "/header.php";
                require_once "Views/" . $name . ".php";
                require_once "public/themes/" . THEME . "/footer.php";
            }
            
        }
    }
?>