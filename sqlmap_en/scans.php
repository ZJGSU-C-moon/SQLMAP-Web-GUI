<?php

  @set_time_limit(0);
  @session_start();
  $sess = session_id();
  if(!$sess) {
    header("Location: ./index.php");
  }

  include("../src/inc/config.php");
  include("../src/inc/SQLMAPClientAPI.class.php");

  include_once("./header.php"); 
  if((isset($_POST['url'])) && (trim($_POST['url']) != "") && (trim($_POST['token']) == $_SESSION['token'])) {
    if((isset($_POST['submit'])) && (trim($_POST['submit']) != "Start Scan")) {
      include("./mode.php");
    } else {
      include("./options.php");
    }

    /* 
      ##########################################################################

       OK we now have all of our configuration options set in variables
       Next we need to spin up a new scan task id, then we can send configuration
       Then we run scan
       Monitor Scan Status until finished
       Scan logs and display in textarea for user viewing
       Make info available for downloading on completion
       Destroy everything on end of session

      ##########################################################################
    */

    // For DEBUGGING:
    // View sqlmap requests in proxy:
    // $options_to_enable['proxy'] = 'http://127.0.0.1:8080';
    // This will allow all DB Error messages in reponses to display in our log view
    // $options_to_enable['parseErrors'] = 'true';

    $sqlmap = new SQLMAPClientAPI();
    $sqlmap->task_id = $sqlmap->generateNewTaskID();
    $scanID = trim($sqlmap->task_id);

    // Check to make sure the API communication is working, otherwise bail
    if((isset($scanID)) && (trim($scanID) != "")) {
      if((isset($_POST['level'])) && ((int) $_POST['level'] > 0) && ((int) $_POST['level'] < 6)) {
        $sqlmap->setOptionValue($scanID, 'level', (int) $_POST['level'], true);
      }
      if((isset($_POST['risk'])) && ((int) $_POST['risk'] > 0) && ((int) $_POST['risk'] < 4)) {
        $sqlmap->setOptionValue($scanID, 'risk', (int) $_POST['risk'], true);
      }
      foreach($options_to_enable as $key => $value) {
        $sqlmap->setOptionValue($scanID, $key, $value);
      }
      $sqlmap->startScan($scanID);                              // Launch Scan
      $status = $sqlmap->checkScanStatus($scanID);              // Check Scan Status
      echo '<br /><br />';
      echo '<div class="scan_info" id="scan_info" align="center" style="width">';  // Info div we can use to fill during scan waiting
      echo 'Running SQLMAP Scan on Target, hang tight....<br /><br /><br />';      // Message
      echo '<div class="loading"></div>';                                          // Our Spinner...
      echo '</div>';
      echo str_repeat(' ', 1024*64);
      flush();
      sleep(1);

      while($status['status'] == "running") {
        sleep(5); // Low down check speed
        $status = $sqlmap->checkScanStatus($scanID);            // Continue Checking Scan Status Till Done or Killed
        if(($status['status'] == "terminated") || ($status['status'] == "not running")) { 
          break;                                                // Break on completion or being killed
        }
      }
      echo '<script language="javascript">document.getElementById("scan_info").innerHTML="";</script>';

      $scanData = $sqlmap->getScanData($scanID);                // Grab Scan Data on Completion
      $logData = $sqlmap->reviewScanLogFull($scanID);           // Get the Full Scan Log to Present in Textarea
?>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="form-group">
            <br /><br />
            <label for="results_textarea">SQLMAP Scan Summary for ScanID: <?php echo $scanID; ?></label>

            <?php include("./result.php"); ?>

            <div id="display_scan_info_textarea" align="central" style="display: none">
              <br /><br />
              <label for="scan_info_textarea">Scan Log</label>
              <textarea class="form-control" id="scan_info_textarea" rows="20">
              <?php
                echo "\n";
                foreach($logData as $logEntry) {
                  if( (preg_match("#fetched random HTTP User-Agent header from file|the local file#", $logEntry['message']))
                  || (trim($logEntry['message']) == "")) {
                    continue;  // A few Full Path Disclosures we dont need to show users, so we will just skip these lines....
                  }
                  // Sort log message type, color code them in the future perhaps....
                  if($logEntry['level'] == "INFO") { 
                    echo "[INFO] [" . $logEntry['time'] . "] " . htmlentities($logEntry['message'], ENT_QUOTES, 'UTF-8') . "\n";
                  } else if($logEntry['level'] == "WARNING") { 
                    echo "[WARNING] [" . $logEntry['time'] . "] " . htmlentities($logEntry['message'], ENT_QUOTES, 'UTF-8') . "\n";
                  } else { 
                    echo "[OTHER] [" . $logEntry['time'] . "] " . htmlentities($logEntry['message'], ENT_QUOTES, 'UTF-8') . "\n";
                  }
                }
                echo "\n";
              ?>
              </textarea>
              <input type="submit" class="btn" name="submit" onClick="divHideAndSeek('display_scan_info_textarea', 1);" value="Hide Scan Log"/>
            </div>

            <?php
              /* DELETE THIS LATER, ONLY FOR DEBUGGING */
              if(sizeof($scanData['data']) > 0) {
                echo '<div id="display_scan_data_textarea" align="central" style="display: none">';
                echo '  <br /><br />';
                echo '  <label for="scan_data_textarea">Scan Data</label>';
                echo '  <textarea class="form-control" id="scan_data_textarea" rows="20">';
                        print_r($scanData['data']);
                        echo "\n########################################################################\n";
                        echo "[*] API Scan Configuration Settings:\n";
                        print_r($sqlmap->listOptions($scanID));
                echo '  </textarea>';
                echo '<input type="submit" class="btn" name="submit" onClick="divHideAndSeek(\'display_scan_data_textarea\', 1);" value="Hide Scan Log"/>';
                echo '</div>';
              }
            ?>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>

    <?php  } else { // No API, Can't Do Anything.... ?>
      <div class="epic_fail" align="center">
        <p style="font-size:26px">Halt - Epic Failure!</p><br />
        <p style="font-size:20px">
          Failed to Connect to SQLMAP API!<br /><br />
        </p>
        <p style="font-size:16px">
          Check to make sure the API Server is running and try again.....
          Redirecting back to form....<br />
        </p>
      </div>
      <script>setTimeout('redirectHome()', 5000);</script>
    <?php  } ?>

  <?php  } else { // Else we Reject Form Data Received! ?>

    <div class="epic_fail" align="center">
      <p style="font-size:26px">Halt - Epic Failure!</p><br />
      <p style="font-size:20px">
        Missing target URL or an invalid form token was provided!<br /><br />
      </p>
      <p style="font-size:16px">
        Redirecting back to form so you can try again....<br />
      </p>
    </div>
    <script>setTimeout('redirectHome()', 5000);</script>

  <?php  }

  include_once("./footer.php");

  if((isset($scanID)) && (trim($scanID) != "")) {
    $sqlmap->deleteTaskID($scanID); // Delete Scan Task

    // Cleanup Payload Files from any File Write Activities...
    if((isset($_POST['file_privs'])) && (trim($_POST['file_privs']) == "w") && (trim($_POST['dFile']) != "")) {
      $items = glob(TMP_PATH . "backdoor.**");
      foreach($items as $item) {
        @unlink($item);
      }
      $items = glob(TMP_PATH . "stager.**");
      foreach($items as $item) {
        @unlink($item);
      }
    }
  }

?>
