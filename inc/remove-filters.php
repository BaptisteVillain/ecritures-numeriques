<?php

remove_filter('the_content', 'wpautop');
remove_filter( 'the_excerpt', 'wpautop');
remove_filter('term_description','wpautop');
