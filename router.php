<?php
 if(isset($_GET['page'])){
     switch (htmlspecialchars($_GET['page'])){
         case 'visi':
             include ('templates/'.activeTemplate.'/pages/all_films.page.php');
             break;
         case 'zanrai':
             include ('templates/'.activeTemplate.'/pages/all-genre.page.php');
             break;
         case 'paieska':
             include ('templates/'.activeTemplate.'/pages/search.page.php');
             break;
         case 'naujas-filmas':
             include ('templates/'.activeTemplate.'/pages/add_movie.page.php');
             break;
         case 'filmu-valdymas':
             include ('templates/'.activeTemplate.'/pages/all_films_management.page.php');
             break;
         case 'filmu-redagavimas':
             include ('templates/'.activeTemplate.'/pages/update_film.page.php');
             break;
         case 'filmu-salinimas':
             include ('templates/'.activeTemplate.'/pages/delete_film.page.php');
             break;
         default:
     }
 } else {
     include ('templates/'.activeTemplate.'/pages/home.page.php');
 }