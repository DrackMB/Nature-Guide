<!DOCTYPE html>
<html>
    <head>
        <title>Projet PHP - Estiam</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?=PATH_CSS?>/style.css">
        <link rel="stylesheet" href="<?=PATH_CSS?>/style2.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--enable mobile device-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--bootstrap css-->
        <link href="<?= PATH_CSS ?>/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <section>     
         <?php 
         //On appelle la vue
         include_once 'Views/'.$pageName;
         ?>  
        </section>
   
        <footer></footer>
    </body>
    <script src="<?= PATH_JS ?>/AJAX.js"></script>
    <script src="<?= PATH_JS ?>/popUP.js"></script>


</html>   