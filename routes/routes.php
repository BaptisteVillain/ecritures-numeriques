<?php

Routes::map('rubriques/:term', function($params){
  
  Routes::load('taxonomy.php', $params, null, 200);
});

Routes::map('publications/:term', function($params){
  
  Routes::load('./templates-pages/template-publications.php', $params, null, 200);
});