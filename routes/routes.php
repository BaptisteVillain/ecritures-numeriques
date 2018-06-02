<?php

Routes::map('rubriques/:term', function($params){
  
  Routes::load('taxonomy.php', $params, null, 200);
});