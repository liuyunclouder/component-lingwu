<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Jasmine Spec Runner</title>

<!--   <link rel="shortcut icon" type="image/png" href="../jasmine_favicon.png"> -->
  <?php 
      // $cur_path = dirname(__FILE__);
      $tool_path = "tool";
      $src_path = "$page/src";
      $spec_path = "$page/test";
   ?>

  <link rel="stylesheet" type="text/css" href="<?php echo $tool_path ?>/jasmine/jasmine.css">
  <script type="text/javascript" src="<?php echo $tool_path ?>/jasmine/jasmine.js"></script>
  <script type="text/javascript" src="<?php echo $tool_path ?>/jasmine/jasmine-html.js"></script>

  <!-- include spec files here... -->
  <script type="text/javascript" src="<?php echo $spec_path ?>/SpecHelper.js"></script>
  <script type="text/javascript" src="<?php echo $spec_path ?>/PlayerSpec.js"></script>

  <!-- include source files here... -->

  <?php 
      $test_path = dirname(__FILE__).'/../src';
      $handle = opendir($test_path);
      $scriptStr = '';

      while ($file = readdir($handle)) {
        if ($file != '.' && $file != '..') {
            $arr = explode('.', $file);
            if ($arr[1] == 'js') {
              $scriptStr .= "<script type=\"text/javascript\" src=\"$src_path/$file\"></script>";
            }
        }
      }
      echo $scriptStr;
   ?>



  <script type="text/javascript">
    (function() {
      var jasmineEnv = jasmine.getEnv();
      jasmineEnv.updateInterval = 1000;

      var trivialReporter = new jasmine.TrivialReporter();

      jasmineEnv.addReporter(trivialReporter);

      jasmineEnv.specFilter = function(spec) {
        return trivialReporter.specFilter(spec);
      };

      var currentWindowOnload = window.onload;

      window.onload = function() {
        if (currentWindowOnload) {
          currentWindowOnload();
        }
        execJasmine();
      };

      function execJasmine() {
        jasmineEnv.execute();
      }

    })();
  </script>

</head>

<body>

</body>
</html>
