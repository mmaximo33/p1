<?php
//http://coursesweb.net/php-mysql/recursive-function-create-multi-level-menu-php_cs

// recursive function to create multilevel menu list, $parentId 0 is the Root
function multilevelMenu($parentId, $ctgLists, $ctgData) {
  $html = '';       // stores and returns the html code with Menu lists

  // if parent item with child IDs in ctgLists
  if(isset($ctgLists[$parentId])) {
    $html = '<ul>';      // open UL

    // traverses the array with child IDs of current parent, and adds them in LI tags, with their data from $ctgData
    foreach ($ctgLists[$parentId] as $childId) {
      // define CSS class in anchors, useful to be used in CSS style to design the menu
      if($parentId == 0) $clsa = ' class="firsrli"';       // class for anchors in main /first categories
      else if(isset($ctgLists[$childId])) $clsa = ' class="litems"';       // class for anchors in lists with childs
      else $clsa = '';

      // open LI
      $html .= '<li><a href="'. $ctgData[$childId]['lurl'] .'" title="'. $ctgData[$childId]['lname'] .'"'. $clsa .'>'. $ctgData[$childId]['lname'] .'</a>';

      $html .= multilevelMenu($childId, $ctgLists, $ctgData);     // re-calls the function to find parent with child-items recursively

      $html .= '</li>';      // close LI
    }
    $html .= '</ul>';       // close UL
  }

  return $html;
}

// array with parents and their childs
$ctgLists = array (
  0 => array (1, 33),
  1 => array (2, 15, 28, 31, 32),
  2 => array (3, 7, 12),
  3 => array (4, 5, 6),
  7 => array (8, 10, 11),
  8 => array (9),
  12 => array (13, 14),
  15 => array (16, 21, 22, 23, 27),
  16 => array (17, 18, 19, 20),
  23 => array (24, 25, 26),
  28 => array (29, 30),
  33 => array (34),
  34 => array (35, 38, 46),
  35 => array (36, 37),
  38 => array (39, 43),
  39 => array (40, 41, 42),
  43 => array (44, 45)
);

// array with link data
$ctgData = array (
  0 => array (
    'lname' => 'Root',
    'lurl' => '#',
  ),
  1 => array (
    'lname' => 'CoursesWeb.net',
    'lurl' => 'http://coursesweb.net/',
  ),
  2 => array (
    'lname' => 'JavaScript Courses',
    'lurl' => 'http://coursesweb.net/javascript/',
  ),
  3 => array (
    'lname' => 'Tutorials',
    'lurl' => 'http://coursesweb.net/javascript/tutorials_t',
  ),
  4 => array (
    'lname' => 'setTimeout - setInterva',
    'lurl' => 'http://coursesweb.net/javascript/settimeout-setinterval_t',
  ),
  5 => array (
    'lname' => 'Dynamic variables',
    'lurl' => 'http://coursesweb.net/javascript/dynamic-variables-javascript_t',
  ),
  6 => array (
    'lname' => 'Validate radio - checkbox',
    'lurl' => 'http://coursesweb.net/javascript/validate-radio-checkbox-buttons_t',
  ),
  7 => array (
    'lname' => 'jQuery Course',
    'lurl' => 'http://coursesweb.net/jquery/jquery-course',
  ),
  8 => array (
    'lname' => 'jQuery Basics',
    'lurl' => 'http://coursesweb.net/jquery/jquery-basics',
  ),
  9 => array (
    'lname' => 'Selecting HTML elements',
    'lurl' => 'http://coursesweb.net/jquery/jquery-basics#selelm',
  ),
  10 => array (
    'lname' => 'jQuery ajax()',
    'lurl' => 'http://coursesweb.net/jquery/jquery-ajax',
  ),
  11 => array (
    'lname' => 'slideDown - SlideUp',
    'lurl' => 'http://coursesweb.net/jquery/slidedown-slideup',
  ),
  12 => array (
    'lname' => 'JS Scripts',
    'lurl' => 'http://coursesweb.net/javascript/javascript-scripts_s2',
  ),
  13 => array (
    'lname' => 'JS Trivia Game',
    'lurl' => 'http://coursesweb.net/javascript/trivia-game-script_s2',
  ),
  14 => array (
    'lname' => 'Scroll to Top Page Button',
    'lurl' => 'http://coursesweb.net/javascript/trivia-game-script_s2',
  ),
  15 => array (
    'lname' => 'PHP-MySQL Course',
    'lurl' => 'http://coursesweb.net/php-mysql/',
  ),
  16 => array (
    'lname' => 'Lessons',
    'lurl' => 'http://coursesweb.net/php-mysql/lessons',
  ),
  17 => array (
    'lname' => 'PHP Strings',
    'lurl' => 'http://coursesweb.net/php-mysql/strings',
  ),
  18 => array (
    'lname' => 'Constants',
    'lurl' => 'http://coursesweb.net/php-mysql/constants',
  ),
  19 => array (
    'lname' => 'Arrays',
    'lurl' => 'http://coursesweb.net/php-mysql/arrays',
  ),
  20 => array (
    'lname' => 'PHP PDO',
    'lurl' => 'http://coursesweb.net/php-mysql/pdo-introduction-connection-database',
  ),
  21 => array (
    'lname' => 'Tutorials',
    'lurl' => 'http://coursesweb.net/php-mysql/tutorials_t',
  ),
  22 => array (
    'lname' => 'Uploading multiple files',
    'lurl' => 'http://coursesweb.net/php-mysql/uploading-multiple-files_t',
  ),
  23 => array (
    'lname' => 'Common PHP Errors',
    'lurl' => 'http://coursesweb.net/php-mysql/common-php-errors-solution_t',
  ),
  24 => array (
    'lname' => 'Unespected /',
    'lurl' => 'http://coursesweb.net/php-mysql/common-php-errors-solution_t#perr1_0',
  ),
  25 => array (
    'lname' => 'headers already sent',
    'lurl' => 'http://coursesweb.net/php-mysql/common-php-errors-solution_t#perr12_11',
  ),
  26 => array (
    'lname' => 'Undefined variable',
    'lurl' => 'http://coursesweb.net/php-mysql/common-php-errors-solution_t#perr13_12',
  ),
  27 => array (
    'lname' => 'Code Snippets',
    'lurl' => 'http://coursesweb.net/php-mysql/common-php-errors-solution_t#perr13_12',
  ),
  28 => array (
    'lname' => 'Ajax Lessons',
    'lurl' => 'http://coursesweb.net/ajax/',
  ),
  29 => array (
    'lname' => 'Tutorials',
    'lurl' => 'http://coursesweb.net/ajax/tutorials_t',
  ),
  30 => array (
    'lname' => 'Download Resources',
    'lurl' => 'http://coursesweb.net/ajax/download_l2',
  ),
  31 => array (
    'lname' => 'HTML Course',
    'lurl' => 'http://coursesweb.net/html/',
  ),
  32 => array (
    'lname' => 'CSS Course',
    'lurl' => 'http://coursesweb.net/css/',
  ),
  33 => array (
    'lname' => 'MarPlo.net',
    'lurl' => 'http://www.marplo.net/',
  ),
  34 => array (
    'lname' => 'JavaScript',
    'lurl' => 'http://www.marplo.net/javascript/',
  ),
  35 => array (
    'lname' => 'JS Lessons',
    'lurl' => 'http://www.marplo.net/javascript/lectii-js',
  ),
  36 => array (
    'lname' => 'Syntax',
    'lurl' => 'http://www.marplo.net/javascript/sintaxajs.html',
  ),
  37 => array (
    'lname' => 'Functions',
    'lurl' => 'http://www.marplo.net/javascript/functii1.html',
  ),
  38 => array (
    'lname' => 'jQuery',
    'lurl' => 'http://www.marplo.net/javascript/curs-jquery-tutoriale-js',
  ),
  39 => array (
    'lname' => 'jQuery CSS',
    'lurl' => 'http://www.marplo.net/javascript/jquery-css-js',
  ),
  40 => array (
    'lname' => 'CSS Properties',
    'lurl' => 'http://www.marplo.net/javascript/jquery-css-js#setcss',
  ),
  41 => array (
    'lname' => 'Add / Delete Classes',
    'lurl' => 'http://www.marplo.net/javascript/jquery-css-js#arclass',
  ),
  42 => array (
    'lname' => 'Check Classes',
    'lurl' => 'http://www.marplo.net/javascript/jquery-css-js#ceclass',
  ),
  43 => array (
    'lname' => 'fadeIn - fadeOut',
    'lurl' => 'http://www.marplo.net/javascript/jquery-fadein-fadeout-js',
  ),
  44 => array (
    'lname' => 'fadeIn - fadeOut',
    'lurl' => 'http://www.marplo.net/javascript/jquery-fadein-fadeout-js',
  ),
  45 => array (
    'lname' => 'fadeTo',
    'lurl' => 'http://www.marplo.net/javascript/jquery-fadein-fadeout-js#fadeto',
  ),
  46 => array (
    'lname' => 'JS Tutorials',
    'lurl' => 'http://www.marplo.net/javascript/tutoriale-js',
  )
);

echo '<div id="m_menu">'. multilevelMenu(0, $ctgLists, $ctgData) .'</div>';     // outputs html with menu lists
?>