<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=ucwords($statusMessage)?> &middot; <?=$getStuff['hostname']?> Status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/ladda.min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="js/jquery.keymapper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/spin.min.js"></script>
    <script src="js/ladda.min.js"></script>
    <script src="js/actions.js"></script>
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <h3 class="muted">Server Status for <?=$getStuff['hostname']?></h3>
      </div>
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>It's <span id="statusMessage"><?=ucfirst($statusMessage)?></span></h1>
        <div id="onlineHeader">
          <p class="lead" id="onlineMessage"><?=$onlineMessage?></p>
          <a class="btn btn-large btn-success" href="#" onClick="window.location.reload()"><?=$onlineReload?></a>
        </div>
        <div id="offlineHeader">
          <p class="lead" id="offlineMessage"><?=$offlineMessage?></p>
          <a class="btn btn-large btn-warning" href="#" onClick="window.location.reload()"><?=$offlineReload?></a>
        </div>
      </div>
      <hr>
      <?php if (in_array($real_client_ip, $trustedIP)) { ?>
      <div class="row-fluid">
        <div class="offset3 span6" style="text-align: center;">
          <button class="ladda-button btn btn-large btn-primary" data-style="expand-down" id="boot"><span class="ladda-label">Boot</span><span class="ladda-spinner"></span></button>
          <button class="ladda-button btn btn-large btn-warning" data-style="expand-down" id="reboot"><span class="ladda-label">Reboot</span><span class="ladda-spinner"></span></button> <button class="ladda-button btn btn-large btn-danger" data-style="expand-down" id="shutdown"><span class="ladda-label">Shutdown</span><span class="ladda-spinner"></span></button>
        </div>
      </div>
      <div class="row-fluid" id="actionResults">
        <div class="offset3 span6">
          <br />
          <div class="alert alert-block alert-info" id="bootResult">
            <h4 class="alert-heading">Boot Call Complete</h4>
            <p>VPS is booting. It should be up in a few seconds.</p>
          </div>
          <div class="alert alert-block alert-info" id="rebootResult">
            <h4 class="alert-heading">Reboot Call Complete</h4>
            <p>VPS is rebooting. It should only take a few seconds to complete.</p>
          </div>
          <div class="alert alert-block alert-info" id="shutdownResult">
            <h4 class="alert-heading">Shutdown Call Complete</h4>
            <p>VPS is shutting down. Just click the "Boot" button when you want to bring it back online</p>
          </div>
        </div>
      </div>
      <hr>
      <?php } ?>
      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span4">
          <h2>Disk <span class="percentage" id="diskPercent">(<?=$diskPercent?>%)</span></h2>
          <div class="progress progress-striped">
            <div class="bar" style="width: <?=$diskPercent?>%;" id="diskPercentBar"></div>
          </div>
          <p><span class="label label-inverse">Disk Total: <span id="totalDisk"><?=$totalDisk?></span></span></p>
          <p><span class="label label-inverse">Disk Used: <span id="usedDisk"><?=$usedDisk?></span></span></p>
          <p><span class="label label-inverse">Disk Available: <span id="availDisk"><?=$availDisk?></span></span></p>
        </div>
        <div class="span4">
          <h2 id="memPercentTitle">RAM <span class="percentage" id="memPercent">(<?=$memPercent?>%)</span> <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="SolusAPI reports RAM usage incorrectly. Just a heads-up.">*</a></h2>
          <div class="progress progress-info progress-striped">
            <div class="bar" style="width: <?=$memPercent?>%;" id="memPercentBar"></div>
          </div>
          <p><span class="label label-info">RAM Total: <span id="totalMem"><?=$totalMem?></span></span></p>
          <p><span class="label label-info">RAM Used: <span id="usedMem"><?=$usedMem?></span></span></p>
          <p><span class="label label-info">RAM Available: <span id="availMem"><?=$availMem?></span></span></p>
       </div>
        <div class="span4">
          <h2>Bandwidth <span class="percentage" id="bwPercent">(<?=$bwPercent?>%)</span></h2>
          <div class="progress progress-danger progress-striped">
            <div class="bar" style="width: <?=$bwPercent?>%;" id="bwPercentBar"></div>
          </div>
          <p><span class="label label-important">Bandwidth Total: <span id="totalBW"><?=$totalBW?></span></span></p>
          <p><span class="label label-important">Bandwidth Used: <span id="usedBW"><?=$usedBW?></span></span></p>
          <p><span class="label label-important">Bandwidth Available: <span id="availBW"><?=$availBW?></span></span></p>
        </div>
      </div>
      <hr>
      <div class="footer">
        <p>Made by <a href="http://www.longren.org/" target="_blank">Tyler Longren</a> with <a href="http://twitter.github.io/bootstrap/" target="_blank">Twitter Bootstrap</a> and <a href="http://news.bootswatch.com/post/50569764478/flatly-a-flat-theme-by-jenil-gogari" target="_blank">Flatly Bootswatch</a>.</p>
      </div>

    </div> <!-- /container -->
    <script type="text/javascript">
    var _gauges = _gauges || [];
    (function() {
      var t   = document.createElement('script');
      t.type  = 'text/javascript';
      t.async = true;
      t.id    = 'gauges-tracker';
      t.setAttribute('data-site-id', '51a50f86613f5d5819000047');
      t.src = '//secure.gaug.es/track.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(t, s);
    })();
    </script>
    <script type="text/javascript" src="http://include.reinvigorate.net/re_.js"></script>
    <script type="text/javascript">
      try {
        reinvigorate.track("49098-6x8odoxv4c");
      } catch(err) {}
    </script>
    <script type="text/javascript">
      $('body').keymapper({
        keys: 'r',
        callback: function() { window.location.reload(); }
      });
    </script>
    <?php if ($dynamicUpdates == true) { ?>
      <script src="js/updateInfo.js.php"></script>
    <?php } ?>
    <script type="text/javascript">
    $('#memPercentTitle').tooltip({
      selector: "a[data-toggle=tooltip]"
    })
    </script>
  </body>
</html>
