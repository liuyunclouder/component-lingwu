<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Jasmine Spec Runner</title>

<!--   <link rel="shortcut icon" type="image/png" href="../jasmine_favicon.png"> -->
  <?php 
      // $cur_path = dirname(__FILE__);
      $tool_path = $cur_path.'../../tool';
      $src_path = $cur_path.'../src';
   ?>

  <link rel="stylesheet" type="text/css" href="../../jasmine.css">
  <script type="text/javascript" src="../../jasmine.js"></script>
  <script type="text/javascript" src="../../jasmine-html.js"></script>

  <!-- include spec files here... -->
  <script type="text/javascript" src="spec/SpecHelper.js"></script>
  <script type="text/javascript" src="spec/PlayerSpec.js"></script>

  <!-- include source files here... -->
  <script type="text/javascript" src="<?php echo $src_path ?>/Player.js"></script>
  <script type="text/javascript" src="<?php echo $src_path ?>/Song.js"></script>

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
