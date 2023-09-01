<?php

class Design{

    static public function header($title){
        return "
        <!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <title>$title</title>
            <link rel='stylesheet' href='./assets/css/main.css'>
        </head>
        <body>
        <nav>
        
        <div class='menu'>
            <header>
                <a href='index.php'>
                    <img src='assets/img/logo_forum.svg' alt='logo'>
                </a>
                <p>Mlab</p>
            </header>
            <div>
                <a href='index.php'>Accueil</a>
                <a href='client-index.php'>Client</a>
                <a href='product-create.php'>Ajouter un produit</a>
            </div>
        </div>
    </nav>
          
            <main>  
            <div class='sous-menu'>
                <h3>$title</h3> 
        ";
    }



 

    static public function footer(){
        return "
            </main>
            <footer class='footer'>

            </footer>
        </body>
        </html>
        
        
        ";
    }

}

?>