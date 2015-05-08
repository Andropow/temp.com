<?php
require_once dirname(__FILE__).'/../controllers/carticles.php';

foreach ($varticle as $title => $article) {
     echo "<div class='article'><h1>" . $title . "</h1><div>" . $article . "</div></div>";
}
