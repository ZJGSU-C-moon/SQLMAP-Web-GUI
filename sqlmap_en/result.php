<?php
 if (sizeof($scanData['data']) > 0) {                       // Scan Data, present to user as nice as we can :)
     echo '<textarea class="form-control" id="results_summary_data_textarea" rows="20">';
     $displayed=false;
     $dt = new DateTime();
     echo "[" . $dt->format('Y-m-d H:i:s') . "] SQLMAP API Scan Initiated\n";
     $scanResultsStrCopy = "[" . $dt->format('Y-m-d H:i:s') . "] SQLMAP Web Edition\n";
     foreach ($scanData['data'] as $dataEntry) {
         if ($dataEntry['status'] == 1) {
             switch ($dataEntry['type']) {
         case "0":
          // TBD
          $scanResultsStrCopy .= "";
          break;
         case "1": // Injection Details (Vuln Parameter, Injection Type, Base Payload, etc)
           if (($dataEntry['status'] == 1) && (sizeof($dataEntry['value']) > 0)) {
               if (!$displayed) {
                   echo "[*] Target URL: " . htmlentities($options_to_enable['url'], ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "[*] Target URL: " . $options_to_enable['url'] . "\n";
                   if (isset($options_to_enable['data'])) {
                       echo "[*] Data: " . htmlentities($options_to_enable['data'], ENT_QUOTES, 'UTF-8') . "\n";
                       $scanResultsStrCopy .= "[*] Data: " . $options_to_enable['data'] . "\n";
                   }
                   echo "\n[*] Scan Summary: \n";
                   $scanResultsStrCopy .= "\n[*] Scan Summary: \n";
               }
               $displayed=true;
               if ((isset($dataEntry['value'][0]['place'])) && (trim($dataEntry['value'][0]['place']) != "")) {
                   echo "   [*] Injection Place: " . htmlentities(trim($dataEntry['value'][0]['place']), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] Injection Place: " . trim($dataEntry['value'][0]['place']) . "\n";
               }
               if ((isset($dataEntry['value'][0]['parameter'])) && (trim($dataEntry['value'][0]['parameter']) != "")) {
                   echo "   [*] Vuln Parameter: " . htmlentities(trim($dataEntry['value'][0]['parameter']), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] Vuln Parameter: " . trim($dataEntry['value'][0]['parameter']) . "\n";
               }
               if ((isset($dataEntry['value'][0]['prefix'])) && (trim($dataEntry['value'][0]['prefix']) != "")) {
                   echo "   [*] Injection Prefix: " . htmlentities(trim($dataEntry['value'][0]['prefix']), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] Injection Prefix: " . trim($dataEntry['value'][0]['prefix']) . "\n";
               }
               if ((isset($dataEntry['value'][0]['suffix'])) && (trim($dataEntry['value'][0]['suffix']) != "")) {
                   echo "   [*] Injection Suffix: " . htmlentities(trim($dataEntry['value'][0]['suffix']), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] Injection Suffix: " . trim($dataEntry['value'][0]['suffix']) . "\n";
               }
               if ((isset($dataEntry['value'][0]['os'])) && (trim($dataEntry['value'][0]['os']) != "")) {
                   echo "   [*] OS: " . htmlentities(trim($dataEntry['value'][0]['os']), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] OS: " . trim($dataEntry['value'][0]['os']) . "\n";
               }
               if ((isset($dataEntry['value'][0]['dbms'])) && (trim($dataEntry['value'][0]['dbms']) != "")) {
                   echo "   [*] DBMS: " . htmlentities(trim($dataEntry['value'][0]['dbms']), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] DBMS: " . trim($dataEntry['value'][0]['dbms']) . "\n";
               }
               if ((isset($dataEntry['value'][0]['dbms_version'])) && (trim($dataEntry['value'][0]['dbms_version']) != "")) {
                   echo "   [*] DBMS Version: " . htmlentities(trim($dataEntry['value'][0]['dbms_version']), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] DBMS Version: " . trim($dataEntry['value'][0]['dbms_version']) . "\n";
               }
               if (sizeof($dataEntry['value'][0]['data']) > 0) {
                   echo "   [*] SQL Injection Technique(s): \n";
                   $scanResultsStrCopy .= "   [*] SQL Injection Technique(s): \n";
                   foreach ($dataEntry['value'][0]['data'] as $entry) {
                       if ((isset($entry['title'])) && (trim($entry['title']) != "")) {
                           echo "      [+] " . htmlentities(trim($entry['title']), ENT_QUOTES, 'UTF-8') . "\n";
                           if (!preg_match("#UNION#i", $entry['title'])) {
                               echo "      [+] Payload Vector: " . htmlentities(trim($entry['vector']), ENT_QUOTES, 'UTF-8') . "\n";
                               $scanResultsStrCopy .= "      [+] Payload Vector: " . trim($entry['vector']) . "\n";
                           }
                           echo "      [+] Payload Example: " . htmlentities(trim($entry['payload']), ENT_QUOTES, 'UTF-8') . "\n";
                           $scanResultsStrCopy .= "      [+] Payload Example: " . trim($entry['payload']) . "\n";
                       }
                   }
               }
               echo "\n";
               $scanResultsStrCopy .= "\n";
           }
           break;

         case "2": // Exhaustive DBMS Fingerprinting
           if ($dataEntry['status'] == 1) {
               echo "[*] DBMS Extensive Fingerprint:\n   [*] " . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "[*] DBMS Extensive Fingerprint:\n   [*] " . $dataEntry['value'] . "\n";
           }
           break;

         case "3": // Banner or Version Info
           if ($dataEntry['status'] == 1) {
               echo "[*] Database Banner: " . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "[*] Database Banner: " . $dataEntry['value'] . "\n";
           }
           break;

         case "4": // Current DB User
           if ($dataEntry['status'] == 1) {
               echo "[*] Current DB User: " . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "[*] Current DB User: " . $dataEntry['value'] . "\n";
           }
           break;

         case "5": // Current DB
           if ($dataEntry['status'] == 1) {
               echo "[*] Current DB: " . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "[*] Current DB: " . $dataEntry['value'] . "\n";
           }
           break;

         case "6": // Hostname
           if ($dataEntry['status'] == 1) {
               echo "[*] Hostname: " . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "[*] Hostname: " . $dataEntry['value'] . "\n";
           }
           break;

         case "7": // Is Current User DBA - Boolean
           if ($dataEntry['value'] == 1) {
               echo "[*] Is DBA: TRUE\n";
               $scanResultsStrCopy .= "[*] Is DBA: TRUE\n";
           } else {
               echo "[*] Is DBA: FALSE\n";
               $scanResultsStrCopy .= "[*] Is DBA: FALSE\n";
           }
           break;

         case "8": // All DB Users
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] Database User Accounts: \n";
               $scanResultsStrCopy .= "[*] Database User Accounts: \n";
               foreach ($dataEntry['value'] as $usr) {
                   echo "   [+] " . htmlentities($usr, ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [+] " . $usr . "\n";
               }
           }
           break;

         case "9": // All DB User Passwords
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] DB User Passwords: \n";
               $scanResultsStrCopy .= "[*] DB User Passwords: \n";
               foreach ($dataEntry['value'] as $usr => $passwd) {
                   echo "   [*] DB User: " . htmlentities($usr, ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] DB User: " . $usr . "\n";
                   foreach ($passwd as $pass) {
                       echo "      [+] " . htmlentities($pass, ENT_QUOTES, 'UTF-8') . "\n";
                       $scanResultsStrCopy .= "      [+] " . $pass . "\n";
                   }
               }
           }
           break;

         case "10": // DB User Privileges
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] DB User Privileges: \n";
               $scanResultsStrCopy .= "[*] DB User Privileges: \n";
               foreach ($dataEntry['value'] as $usr => $privs) {
                   echo "   [*] DB User: " . htmlentities($usr, ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] DB User: " . $usr . "\n";
                   echo "      [*] Privileges: \n";
                   $scanResultsStrCopy .= "      [*] Privileges: \n";
                   foreach ($privs as $priv) {
                       echo "         [+] " . htmlentities($priv, ENT_QUOTES, 'UTF-8') . "\n";
                       $scanResultsStrCopy .= "         [+] " . $priv . "\n";
                   }
               }
           }
           break;

         case "11": // DB User Roles
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] DB User Roles: \n";
               $scanResultsStrCopy .= "[*] DB User Roles: \n";
               foreach ($dataEntry['value'] as $usr => $roles) {
                   echo "   [*] DB User: " . htmlentities($usr, ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [*] DB User: " . $usr . "\n";
                   echo "      [*] Roles: \n";
                   $scanResultsStrCopy .= "      [*] Roles: \n";
                   foreach ($roles as $role) {
                       echo "         [+] " . htmlentities($role, ENT_QUOTES, 'UTF-8') . "\n";
                       $scanResultsStrCopy .= "         [+] " . $role . "\n";
                   }
               }
           }
           break;

         case "12": // Available Databases
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] Available Database(s): \n";
               $scanResultsStrCopy .= "[*] Available Database(s): \n";
               foreach ($dataEntry['value'] as $avlbldb) {
                   echo "   [+] " . htmlentities($avlbldb, ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "   [+] " . $avlbldb . "\n";
               }
           }
           break;

         case "13": // Tables by Database
           if (sizeof($dataEntry['value']) > 0) {
               if ((isset($options_to_enable['search'])) && (isset($options_to_enable['tbl']))) {
                   echo "[*] Table Search Term: " . htmlentities($options_to_enable['tbl'], ENT_QUOTES, 'UTF-8') . " \n";
                   $scanResultsStrCopy .= "   [*] Table Search Term: " . $options_to_enable['tbl'] . " \n";
               } else {
                   echo "\n[*] Table Dump: \n";
                   echo "[*] Tables by Database: \n";
                   $scanResultsStrCopy .= "\n[*] Table Dump: \n[*] Tables by Database: \n";
               }
               foreach ($dataEntry['value'] as $dbName => $tbls) {
                   if (is_assoc($tbls)) {  // Search by Table Name
                       echo "   [*] DB Table Found In: " . htmlentities($dbName, ENT_QUOTES, 'UTF-8') . " \n";
                       echo "   [*] Table(s): \n";
                       $scanResultsStrCopy .= "   [*] DB Table Found In: " . $dbName . " \n";
                       $scanResultsStrCopy .= "   [*] Table(s): \n";
                       foreach ($tbls as $tbl) {
                           echo "         [+] " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . "\n";
                           $scanResultsStrCopy .= "         [+] " . $tbl . "\n";
                       }
                   } else {               // Normal Column Data Dump
                       echo "   [*] DB: " . htmlentities($dbName, ENT_QUOTES, 'UTF-8') . " \n";
                       echo "      [*] Tables: \n";
                       $scanResultsStrCopy .= "   [*] DB: " . $dbName . " \n";
                       $scanResultsStrCopy .= "      [*] Tables: \n";
                       foreach ($tbls as $tbl) {
                           echo "         [+] " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . "\n";
                           $scanResultsStrCopy .= "         [+] " . $tbl . "\n";
                       }
                   }
               }
           }
           break;

         case "14": // Columns, by Table, by Database
           if ((isset($options_to_enable['search'])) && (isset($options_to_enable['col']))) {
               echo "[*] Column Search Term: " . htmlentities($options_to_enable['col'], ENT_QUOTES, 'UTF-8') . " \n";
               $scanResultsStrCopy .= "   [*] Column Search Term: " . $options_to_enable['col'] . " \n";
           } else {
               echo "\n[*] Column Dump: \n";
               $scanResultsStrCopy .= "\n[*] Column Dump: \n";
           }
           foreach ($dataEntry['value'] as $dbName => $tbls) {
               foreach ($tbls as $tbl => $cols) {
                   if (is_assoc($cols)) {  // Normal Column Data Dump
                       echo "   [*] DB: " . htmlentities($dbName, ENT_QUOTES, 'UTF-8') . " \n";
                       $scanResultsStrCopy .= "   [*] DB: " . $dbName . " \n";
                       echo "   [*] Table: " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . " \n";
                       $scanResultsStrCopy .= "   [*] Table: " . $tbl . " \n";
                       echo "      [*] Columns: \n";
                       $scanResultsStrCopy .= "      [*] Columns: \n";
                       foreach ($cols as $col => $col_type) {
                           echo "         [+] " . htmlentities($col, ENT_QUOTES, 'UTF-8') . ", " . htmlentities($col_type, ENT_QUOTES, 'UTF-8') . "\n";
                           $scanResultsStrCopy .= "         [+] " . $col . ", " . $col_type . "\n";
                       }
                   } else {               // Column Search, NOT a Column Data Dump Request
                       echo "   [*] DB Found In: " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . " \n";
                       $scanResultsStrCopy .= "   [*] DB Found In: " . $tbl . " \n";
                       echo "      [*] Table(s): \n";
                       $scanResultsStrCopy .= "      [*] Table(s): \n";
                       foreach ($cols as $col) {
                           echo "         [+] " . htmlentities($col, ENT_QUOTES, 'UTF-8') . "\n";
                           $scanResultsStrCopy .= "         [+] " . $col . "\n";
                       }
                   }
               }
           }
           break;

         case "15": // Full Schema (All Databases) & Associated Table & Column Mappings
           if (sizeof($dataEntry['value']) > 0) {
               echo "\n[*] Available Schema & Table Mappings: \n";
               $scanResultsStrCopy .= "\n[*] Available Schema & Table Mappings: \n";
               foreach ($dataEntry['value'] as $dbName => $dbInfo) {
                   echo "   [*] DB: " . htmlentities($dbName, ENT_QUOTES, 'UTF-8') . " \n";
                   $scanResultsStrCopy .= "   [*] DB: " . $dbName . " \n";
                   foreach ($dbInfo as $tbl => $tblInfo) {
                       echo "      [*] Table: " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . " \n";
                       $scanResultsStrCopy .= "      [*] Table: " . $tbl . " \n";
                       echo "         [*] Columns: \n";
                       $scanResultsStrCopy .= "         [*] Columns: \n";
                       foreach ($tblInfo as $col => $col_type) {
                           echo "            [+] " . htmlentities($col, ENT_QUOTES, 'UTF-8') . ", " . htmlentities($col_type, ENT_QUOTES, 'UTF-8') . "\n";
                           $scanResultsStrCopy .= "            [+] " . $col . ", " . $col_type . "\n";
                       }
                   }
               }
           }
           break;

         case "16":
           ;

           // no break
         case "17": // DB Data Dump Results
           if ((sizeof($dataEntry['value']) > 0) && (sizeof($dataEntry['value']['__infos__']) > 0)) {
               if (!$displayed) {
                   echo "\n";
               }
               echo "[*] DB Data Dump: \n";
               $scanResultsStrCopy .= "[*] DB Data Dump: \n";
               echo "   [*] DB: " . htmlentities($dataEntry['value']['__infos__']['db'], ENT_QUOTES, 'UTF-8') . " \n";
               $scanResultsStrCopy .= "   [*] DB: " . $dataEntry['value']['__infos__']['db'] . " \n";
               echo "   [*] Table: " . htmlentities($dataEntry['value']['__infos__']['table'], ENT_QUOTES, 'UTF-8') . " \n";
               $scanResultsStrCopy .= "   [*] Table: " . $dataEntry['value']['__infos__']['table'] . " \n";
               echo "   [*] Row Count: " . $dataEntry['value']['__infos__']['count'] . " \n";
               $scanResultsStrCopy .= "   [*] Row Count: " . $dataEntry['value']['__infos__']['count'] . " \n";
               $colFormat = "";
               foreach ($dataEntry['value'] as $colName => $colInfo) {
                   if ($colName == "__infos__") {
                       continue;
                   }
                   $colFormat .= $colName . ", ";
               }
               echo "      [*] Column Data: " . htmlentities(preg_replace("#, $#", "", $colFormat), ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "      [*] Column Data: " . preg_replace("#, $#", "", $colFormat) . "\n";
               for ($i=0; $i < $dataEntry['value']['__infos__']['count']; $i++) {
                   $lineDump = "";
                   foreach ($dataEntry['value'] as $colName => $colInfo) {
                       $lineDump .= $colInfo['values'][$i] . ", ";
                   }
                   echo "         [+] " . htmlentities(preg_replace("#, $#", "", $lineDump), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "         [+] " . preg_replace("#, $#", "", $lineDump) . "\n";
               }
           }
           break;

         case "18":
           // TBD
           $scanResultsStrCopy .= "";
           break;

         case "19":
           // TBD
           $scanResultsStrCopy .= "";
           break;

         case "20":
           // TBD
           $scanResultsStrCopy .= "";
           break;

         case "21":
           // File Read Results
           if (($dataEntry['status'] == 1) && (sizeof($dataEntry['value']) > 0)) {
               foreach ($dataEntry['value'] as $localFilePath) {
                   if (preg_match("#\(same file\)#", $localFilePath)) {
                       $localFile = explode(" ", $localFilePath)[0];
                       if ((file_exists($localFile)) && (is_readable($localFile))) {
                           if (is_ascii($localFile)) {
                               echo "\n[*] File Content for: " . htmlentities($options_to_enable['rFile'], ENT_QUOTES, 'UTF-8') . " \n";
                               $scanResultsStrCopy .= "\n[*] File Content for: " . $options_to_enable['rFile'] . " \n";
                               $fh = fopen($localFile, "rb");
                               while (!feof($fh)) {
                                   $line = fgets($fh);
                                   echo htmlentities($line, ENT_QUOTES, 'UTF-8');
                                   $scanResultsStrCopy .= $line;
                               }
                               fclose($fh);
                               echo "\n";
                               $scanResultsStrCopy .= "\n";
                           } else {
                               echo "\n[*] Non-ASCII File Content for: " . htmlentities($options_to_enable['rFile'], ENT_QUOTES, 'UTF-8') . " \n";
                               $scanResultsStrCopy .= "\n[*] Non-ASCII File Content for: " . $options_to_enable['rFile'] . " \n";
                               echo "\n   [*] Unable to display as a result...\n";
                               $scanResultsStrCopy .= "\n   [*] Unable to display as a result...\n";
                           }
                       }
                   } else {
                       $localFile = explode(" ", $localFilePath)[0];
                       echo "\n[x] Problem Reading File Content for: " . htmlentities($options_to_enable['rFile'], ENT_QUOTES, 'UTF-8') . " \n";
                       $scanResultsStrCopy .= "\n[x] Problem Reading File Content for: " . $options_to_enable['rFile'] . " \n";
                   }
               }
           }
           break;

         case "22":
           // TBD
           $scanResultsStrCopy .= "";
           break;

         case "23":
           // osCmd Results
           if ($dataEntry['status'] == 1) {
               echo "[*] OS Command: " . htmlentities($options_to_enable['osCmd'], ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "[*] OS Command: " . $options_to_enable['osCmd'] . "\n";
               if (is_array($dataEntry['value'])) {
                   echo htmlentities($dataEntry['value'][0], ENT_QUOTES, 'UTF-8') . "\n\n";
                   $scanResultsStrCopy .= $dataEntry['value'][0] . "\n\n";
               } else {
                   echo htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "\n\n";
                   $scanResultsStrCopy .= $dataEntry['value'] . "\n\n";
               }
           }
           break;

         case "24":
           // Windows Registry Read
           if ($dataEntry['status'] == 1) {
               echo "\n[*] Result from Reading Windows Registry: \n";
               $scanResultsStrCopy .= "\n[*] Result from Reading Windows Registry: \n";
               echo "   [*] Registry Key: " . htmlentities($options_to_enable['regKey'], ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "   [*] Registry Key: " . $options_to_enable['regKey'] . "\n";
               echo "      [*] Key Value: " . htmlentities($options_to_enable['regVal'], ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "      [*] Key Value: " . $options_to_enable['regVal'] . "\n";
               echo "      [*] Key Type: " . htmlentities($options_to_enable['regType'], ENT_QUOTES, 'UTF-8') . "\n";
               $scanResultsStrCopy .= "      [*] Key Type: " . $options_to_enable['regType'] . "\n";
               if (is_array($dataEntry['value'])) {
                   echo "      [*] Key Data Returned: " . htmlentities(str_replace($options_to_enable['regVal'] . "    " . $options_to_enable['regType'] . "    ", "", $dataEntry['value'][0]), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "      [*] Key Data Returned: " . str_replace($options_to_enable['regVal'] . "    " . $options_to_enable['regType'] . "    ", "", $dataEntry['value'][0]) . "\n";
               } else {
                   echo "      [*] Key Data Returned: " . htmlentities(str_replace($options_to_enable['regVal'] . "    " . $options_to_enable['regType'] . "    ", "", $dataEntry['value']), ENT_QUOTES, 'UTF-8') . "\n";
                   $scanResultsStrCopy .= "      [*] Key Data Returned: " . str_replace($options_to_enable['regVal'] . "    " . $options_to_enable['regType'] . "    ", "", $dataEntry['value']) . "\n";
               }
           }
           break;

         default:
           // Unknown Result Option...
           $scanResultsStrCopy .= "";
           break;
       }
         }
     }
     if ((isset($_POST['file_privs'])) && (trim($_POST['file_privs']) == "w") && (trim($_POST['dFile']) != "")) {
         echo "\n[*] Manual verification required for file write:\n   [*] Payload: " . htmlentities($options_to_enable['wFile'], ENT_QUOTES, 'UTF-8') . "\n   [*] File Destination: " . htmlentities($options_to_enable['dFile'], ENT_QUOTES, 'UTF-8') . "\n";
         $scanResultsStrCopy .= "\n[*] Manual verification required for file write:\n   [*] Payload: " . $options_to_enable['wFile'] . "\n   [*] File Destination: " . $options_to_enable['dFile'] . "\n";
     }
     if ((isset($options_to_enable['regAdd'])) && ($options_to_enable['regAdd'] == 'true')) {
         echo "\n[Warning] Registry Add Option has NO Verification Step\n";
         echo "   [*] Re-Scan with Registry Read Options Set to Validate Registry Change\n";
         $scanResultsStrCopy .= "\n[Warning] Registry Add Option has NO Verification Step\n   [*] Re-Scan with Registry Read Options Set to Validate Registry Change\n";
     }
     // Save our results info to our own logfile, since API seems to detach log somehow....
     @mkdir(TMP_PATH);
     @mkdir(TMP_PATH .  $host_str);
     $log = TMP_PATH .  $host_str . "/api_scan.log";
     $fh = fopen($log, "a+");
     fwrite($fh, $scanResultsStrCopy);
     fclose($fh);
     chmod($log, 0644);

     echo '</textarea><br />';
     echo '<div class="col-md-4">';
     echo '<input type="submit" class="btn" name="submit" onClick="divHideAndSeek(\'display_scan_info_textarea\', 0);" value="View Scan Log"/>';
     echo '</div>';
     echo '<div class="col-md-4">';
     echo '<input type="submit" class="btn" name="submit" onClick="downloadScanResults(\'' . htmlentities($host_str, ENT_QUOTES, 'UTF-8') . '\');" value="Download Scan Results"/>';
     echo '</div>';
     echo '<div class="col-md-4">';
     echo '<input type="submit" class="btn" name="submit" onClick="divHideAndSeek(\'display_scan_data_textarea\', 0);" value="View Scan Data"/>';
     echo '</div>';
     echo "<br /><br />";
 }
 /* ? REMOVE THIS SCAN ERROR DATA WHEN FINISHED ? */
 if (sizeof($scanData['error']) > 0) {                      // Scan Error Messages - Can we parse this to create warning or error messages? Suggestions to tailor form?
     echo "<br /><br />";
     echo '<label for="results_errors_textarea">Error Messages Encountered</label>';
     echo '<textarea class="form-control" id="results_errors_textarea" rows="20">';
     print_r($scanData['error']);
     echo '</textarea>';
 }
