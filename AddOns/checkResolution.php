<script>
    jQuery(function($){
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
  
    $(window).resize(function() {
      if(windowWidth != $(window).width() || windowHeight != $(window).height()) {
        location.reload();
        return;
      }
    });
  });
</script>
<?php
$window_width = "<script type='text/javascript'>document.write(window.innerWidth);</script>";
$_SESSION['screen_width'] = $window_width;
?>
<?php 
if ($window_width == 555) { 
    // do something
    return true;
} else {
    return false;
}