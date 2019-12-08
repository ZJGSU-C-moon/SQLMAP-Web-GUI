<?php
 if (sizeof($scanData['data']) > 0) {                       // Scan Data, present to user as nice as we can :)
     echo '<div class="textbook" id="results_summary_data_textarea" rows="20">';
     $displayed=false;
     $dt = new DateTime();
     echo "[" . $dt->format('Y-m-d H:i:s') . "] SQLMAP API Scan Initiated<br>";
     $scanResultsStrCopy = "[" . $dt->format('Y-m-d H:i:s') . "] SQLMAP Web Edition<br>";
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
                   echo "[*] Target URL: <strong>" . htmlentities($options_to_enable['url'], ENT_QUOTES, 'UTF-8') . "</strong><br>";
                   $scanResultsStrCopy .= "[*] Target URL: " . $options_to_enable['url'] . "<br>";
                   if (isset($options_to_enable['data'])) {
                       echo "[*] Data: " . htmlentities($options_to_enable['data'], ENT_QUOTES, 'UTF-8') . "<br>";
                       $scanResultsStrCopy .= "[*] Data: " . $options_to_enable['data'] . "<br>";
                   }
                   echo "<br>[*] Scan Summary: <br>";
                   $scanResultsStrCopy .= "<br>[*] Scan Summary: <br>";
               }
               $displayed=true;
               if ((isset($dataEntry['value'][0]['place'])) && (trim($dataEntry['value'][0]['place']) != "")) {
                   echo "&emsp;[*] Injection Place: <strong>" . htmlentities(trim($dataEntry['value'][0]['place']), ENT_QUOTES, 'UTF-8') . "</strong><br>";
                   $scanResultsStrCopy .= "&emsp;[*] Injection Place: " . trim($dataEntry['value'][0]['place']) . "<br>";
               }
               if ((isset($dataEntry['value'][0]['parameter'])) && (trim($dataEntry['value'][0]['parameter']) != "")) {
                   echo "&emsp;[*] Vuln Parameter: <strong>" . htmlentities(trim($dataEntry['value'][0]['parameter']), ENT_QUOTES, 'UTF-8') . "</strong><br>";
                   $scanResultsStrCopy .= "&emsp;[*] Vuln Parameter: " . trim($dataEntry['value'][0]['parameter']) . "<br>";
               }
               if ((isset($dataEntry['value'][0]['prefix'])) && (trim($dataEntry['value'][0]['prefix']) != "")) {
                   echo "&emsp;[*] Injection Prefix: " . htmlentities(trim($dataEntry['value'][0]['prefix']), ENT_QUOTES, 'UTF-8') . "<br>";
                   $scanResultsStrCopy .= "&emsp;[*] Injection Prefix: " . trim($dataEntry['value'][0]['prefix']) . "<br>";
               }
               if ((isset($dataEntry['value'][0]['suffix'])) && (trim($dataEntry['value'][0]['suffix']) != "")) {
                   echo "&emsp;[*] Injection Suffix: " . htmlentities(trim($dataEntry['value'][0]['suffix']), ENT_QUOTES, 'UTF-8') . "<br>";
                   $scanResultsStrCopy .= "&emsp;[*] Injection Suffix: " . trim($dataEntry['value'][0]['suffix']) . "<br>";
               }
               if ((isset($dataEntry['value'][0]['os'])) && (trim($dataEntry['value'][0]['os']) != "")) {
                   echo "&emsp;[*] OS: " . htmlentities(trim($dataEntry['value'][0]['os']), ENT_QUOTES, 'UTF-8') . "<br>";
                   $scanResultsStrCopy .= "&emsp;[*] OS: " . trim($dataEntry['value'][0]['os']) . "<br>";
               }
               if ((isset($dataEntry['value'][0]['dbms'])) && (trim($dataEntry['value'][0]['dbms']) != "")) {
                   echo "&emsp;[*] DBMS: <strong>" . htmlentities(trim($dataEntry['value'][0]['dbms']), ENT_QUOTES, 'UTF-8') . "</strong><br>";
                   $scanResultsStrCopy .= "&emsp;[*] DBMS: " . trim($dataEntry['value'][0]['dbms']) . "<br>";
               }
               if ((isset($dataEntry['value'][0]['dbms_version'])) && (trim($dataEntry['value'][0]['dbms_version']) != "")) {
                   echo "&emsp;[*] DBMS Version: " . htmlentities(trim($dataEntry['value'][0]['dbms_version']), ENT_QUOTES, 'UTF-8') . "<br>";
                   $scanResultsStrCopy .= "&emsp;[*] DBMS Version: " . trim($dataEntry['value'][0]['dbms_version']) . "<br>";
               }
               if (sizeof($dataEntry['value'][0]['data']) > 0) {
                   echo "&emsp;[*] SQL Injection Technique(s): <br>";
                   $scanResultsStrCopy .= "&emsp;[*] SQL Injection Technique(s): <br>";
                   foreach ($dataEntry['value'][0]['data'] as $entry) {
                       if ((isset($entry['title'])) && (trim($entry['title']) != "")) {
                           echo "&emsp;&emsp;[+] <strong>" . htmlentities(trim($entry['title']), ENT_QUOTES, 'UTF-8') . "</strong><br>";
                           if (!preg_match("#UNION#i", $entry['title'])) {
                               echo "&emsp;&emsp;[+] Payload Vector: " . htmlentities(trim($entry['vector']), ENT_QUOTES, 'UTF-8') . "<br>";
                               $scanResultsStrCopy .= "&emsp;&emsp;[+] Payload Vector: " . trim($entry['vector']) . "<br>";
                           }
                           echo "&emsp;&emsp;[+] Payload Example: <span class='emphasize'>" . htmlentities(trim($entry['payload']), ENT_QUOTES, 'UTF-8') . "</span><br>";
                           $scanResultsStrCopy .= "&emsp;&emsp;[+] Payload Example: " . trim($entry['payload']) . "<br>";
                       }
                   }
               }
               echo "<br>";
               $scanResultsStrCopy .= "<br>";
           }
           break;

         case "2": // Exhaustive DBMS Fingerprinting
           if ($dataEntry['status'] == 1) {
               echo "[*] DBMS Extensive Fingerprint:<br>&emsp;[*] <strong>" . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "</strong><br>";
               $scanResultsStrCopy .= "[*] DBMS Extensive Fingerprint:<br>&emsp;[*] " . $dataEntry['value'] . "<br>";
           }
           break;

         case "3": // Banner or Version Info
           if ($dataEntry['status'] == 1) {
               echo "[*] Database Banner: <strong>" . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "</strong><br>";
               $scanResultsStrCopy .= "[*] Database Banner: " . $dataEntry['value'] . "<br>";
           }
           break;

         case "4": // Current DB User
           if ($dataEntry['status'] == 1) {
               echo "[*] Current DB User: <strong>" . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "</strong><br>";
               $scanResultsStrCopy .= "[*] Current DB User: " . $dataEntry['value'] . "<br>";
           }
           break;

         case "5": // Current DB
           if ($dataEntry['status'] == 1) {
               echo "[*] Current DB: <strong>" . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "</strong><br>";
               $scanResultsStrCopy .= "[*] Current DB: " . $dataEntry['value'] . "<br>";
           }
           break;

         case "6": // Hostname
           if ($dataEntry['status'] == 1) {
               echo "[*] Hostname: <strong>" . htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "</strong><br>";
               $scanResultsStrCopy .= "[*] Hostname: " . $dataEntry['value'] . "<br>";
           }
           break;

         case "7": // Is Current User DBA - Boolean
           if ($dataEntry['value'] == 1) {
               echo "[*] Is DBA: <strong>TRUE</strong><br>";
               $scanResultsStrCopy .= "[*] Is DBA: TRUE<br>";
           } else {
               echo "[*] Is DBA: <strong>FALSE</strong><br>";
               $scanResultsStrCopy .= "[*] Is DBA: FALSE<br>";
           }
           break;

         case "8": // All DB Users
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] Database User Accounts: <br>";
               $scanResultsStrCopy .= "[*] Database User Accounts: <br>";
               foreach ($dataEntry['value'] as $usr) {
                   echo "&emsp;[+] <strong>" . htmlentities($usr, ENT_QUOTES, 'UTF-8') . "</strong><br>";
                   $scanResultsStrCopy .= "&emsp;[+] " . $usr . "<br>";
               }
           }
           break;

         case "9": // All DB User Passwords
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] DB User Passwords: <br>";
               $scanResultsStrCopy .= "[*] DB User Passwords: <br>";
               foreach ($dataEntry['value'] as $usr => $passwd) {
                   echo "&emsp;[*] DB User: <strong>" . htmlentities($usr, ENT_QUOTES, 'UTF-8') . "</strong><br>";
                   $scanResultsStrCopy .= "&emsp;[*] DB User: " . $usr . "<br>";
                   foreach ($passwd as $pass) {
                       echo "&emsp;&emsp;[+] <strong>" . htmlentities($pass, ENT_QUOTES, 'UTF-8') . "</strong><br>";
                       $scanResultsStrCopy .= "&emsp;&emsp;[+] " . $pass . "<br>";
                   }
               }
           }
           break;

         case "10": // DB User Privileges
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] DB User Privileges: <br>";
               $scanResultsStrCopy .= "[*] DB User Privileges: <br>";
               foreach ($dataEntry['value'] as $usr => $privs) {
                   echo "&emsp;[*] DB User: <strong>" . htmlentities($usr, ENT_QUOTES, 'UTF-8') . "</strong><br>";
                   $scanResultsStrCopy .= "&emsp;[*] DB User: " . $usr . "<br>";
                   echo "&emsp;&emsp;[*] Privileges: <br>";
                   $scanResultsStrCopy .= "&emsp;&emsp;[*] Privileges: <br>";
                   foreach ($privs as $priv) {
                       echo "&emsp;&emsp;&emsp;[+] " . htmlentities($priv, ENT_QUOTES, 'UTF-8') . "<br>";
                       $scanResultsStrCopy .= "&emsp;&emsp;&emsp;[+] " . $priv . "<br>";
                   }
               }
           }
           break;

         case "11": // DB User Roles
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] DB User Roles: <br>";
               $scanResultsStrCopy .= "[*] DB User Roles: <br>";
               foreach ($dataEntry['value'] as $usr => $roles) {
                   echo "&emsp;[*] DB User: <strong>" . htmlentities($usr, ENT_QUOTES, 'UTF-8') . "</strong><br>";
                   $scanResultsStrCopy .= "&emsp;[*] DB User: " . $usr . "<br>";
                   echo "&emsp;&emsp;[*] Roles: <br>";
                   $scanResultsStrCopy .= "&emsp;&emsp;[*] Roles: <br>";
                   foreach ($roles as $role) {
                       echo "&emsp;&emsp;&emsp;[+] " . htmlentities($role, ENT_QUOTES, 'UTF-8') . "<br>";
                       $scanResultsStrCopy .= "&emsp;&emsp;&emsp;[+] " . $role . "<br>";
                   }
               }
           }
           break;

         case "12": // Available Databases
           if (sizeof($dataEntry['value']) > 0) {
               echo "[*] Available Database(s): <br>";
               $scanResultsStrCopy .= "[*] Available Database(s): <br>";
               foreach ($dataEntry['value'] as $avlbldb) {
                   echo "&emsp;[+] <strong>" . htmlentities($avlbldb, ENT_QUOTES, 'UTF-8') . "</strong><br>";
                   $scanResultsStrCopy .= "&emsp;[+] " . $avlbldb . "<br>";
               }
           }
           break;

         case "13": // Tables by Database
           if (sizeof($dataEntry['value']) > 0) {
               if ((isset($options_to_enable['search'])) && (isset($options_to_enable['tbl']))) {
                   echo "[*] Table Search Term: " . htmlentities($options_to_enable['tbl'], ENT_QUOTES, 'UTF-8') . " <br>";
                   $scanResultsStrCopy .= "&emsp;[*] Table Search Term: " . $options_to_enable['tbl'] . " <br>";
               } else {
                   echo "<br>[*] Table Dump: <br>";
                   echo "[*] Tables by Database: <br>";
                   $scanResultsStrCopy .= "<br>[*] Table Dump: <br>[*] Tables by Database: <br>";
               }
               foreach ($dataEntry['value'] as $dbName => $tbls) {
                   if (is_assoc($tbls)) {  // Search by Table Name
                       echo "&emsp;[*] DB Table Found In: " . htmlentities($dbName, ENT_QUOTES, 'UTF-8') . " <br>";
                       echo "&emsp;[*] Table(s): <br>";
                       $scanResultsStrCopy .= "&emsp;[*] DB Table Found In: " . $dbName . " <br>";
                       $scanResultsStrCopy .= "&emsp;[*] Table(s): <br>";
                       foreach ($tbls as $tbl) {
                           echo "&emsp;&emsp;&emsp;[+] " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . "<br>";
                           $scanResultsStrCopy .= "&emsp;&emsp;&emsp;[+] " . $tbl . "<br>";
                       }
                   } else {               // Normal Column Data Dump
                       echo "&emsp;[*] DB: " . htmlentities($dbName, ENT_QUOTES, 'UTF-8') . " <br>";
                       echo "&emsp;&emsp;[*] Tables: <br>";
                       $scanResultsStrCopy .= "&emsp;[*] DB: " . $dbName . " <br>";
                       $scanResultsStrCopy .= "&emsp;&emsp;[*] Tables: <br>";
                       foreach ($tbls as $tbl) {
                           echo "&emsp;&emsp;&emsp;[+] " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . "<br>";
                           $scanResultsStrCopy .= "&emsp;&emsp;&emsp;[+] " . $tbl . "<br>";
                       }
                   }
               }
           }
           break;

         case "14": // Columns, by Table, by Database
           if ((isset($options_to_enable['search'])) && (isset($options_to_enable['col']))) {
               echo "[*] Column Search Term: " . htmlentities($options_to_enable['col'], ENT_QUOTES, 'UTF-8') . " <br>";
               $scanResultsStrCopy .= "&emsp;[*] Column Search Term: " . $options_to_enable['col'] . " <br>";
           } else {
               echo "<br>[*] Column Dump: <br>";
               $scanResultsStrCopy .= "<br>[*] Column Dump: <br>";
           }
           foreach ($dataEntry['value'] as $dbName => $tbls) {
               foreach ($tbls as $tbl => $cols) {
                   if (is_assoc($cols)) {  // Normal Column Data Dump
                       echo "&emsp;[*] DB: " . htmlentities($dbName, ENT_QUOTES, 'UTF-8') . " <br>";
                       $scanResultsStrCopy .= "&emsp;[*] DB: " . $dbName . " <br>";
                       echo "&emsp;[*] Table: " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . " <br>";
                       $scanResultsStrCopy .= "&emsp;[*] Table: " . $tbl . " <br>";
                       echo "&emsp;&emsp;[*] Columns: <br>";
                       $scanResultsStrCopy .= "&emsp;&emsp;[*] Columns: <br>";
                       foreach ($cols as $col => $col_type) {
                           echo "&emsp;&emsp;&emsp;[+] " . htmlentities($col, ENT_QUOTES, 'UTF-8') . ", " . htmlentities($col_type, ENT_QUOTES, 'UTF-8') . "<br>";
                           $scanResultsStrCopy .= "&emsp;&emsp;&emsp;[+] " . $col . ", " . $col_type . "<br>";
                       }
                   } else {               // Column Search, NOT a Column Data Dump Request
                       echo "&emsp;[*] DB Found In: " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . " <br>";
                       $scanResultsStrCopy .= "&emsp;[*] DB Found In: " . $tbl . " <br>";
                       echo "&emsp;&emsp;[*] Table(s): <br>";
                       $scanResultsStrCopy .= "&emsp;&emsp;[*] Table(s): <br>";
                       foreach ($cols as $col) {
                           echo "&emsp;&emsp;&emsp;[+] " . htmlentities($col, ENT_QUOTES, 'UTF-8') . "<br>";
                           $scanResultsStrCopy .= "&emsp;&emsp;&emsp;[+] " . $col . "<br>";
                       }
                   }
               }
           }
           break;

         case "15": // Full Schema (All Databases) & Associated Table & Column Mappings
           if (sizeof($dataEntry['value']) > 0) {
               echo "<br>[*] Available Schema & Table Mappings: <br>";
               $scanResultsStrCopy .= "<br>[*] Available Schema & Table Mappings: <br>";
               foreach ($dataEntry['value'] as $dbName => $dbInfo) {
                   echo "&emsp;[*] DB: " . htmlentities($dbName, ENT_QUOTES, 'UTF-8') . " <br>";
                   $scanResultsStrCopy .= "&emsp;[*] DB: " . $dbName . " <br>";
                   foreach ($dbInfo as $tbl => $tblInfo) {
                       echo "&emsp;&emsp;[*] Table: " . htmlentities($tbl, ENT_QUOTES, 'UTF-8') . " <br>";
                       $scanResultsStrCopy .= "&emsp;&emsp;[*] Table: " . $tbl . " <br>";
                       echo "&emsp;&emsp;&emsp;[*] Columns: <br>";
                       $scanResultsStrCopy .= "&emsp;&emsp;&emsp;[*] Columns: <br>";
                       foreach ($tblInfo as $col => $col_type) {
                           echo "&emsp;&emsp;&emsp;&emsp;[+] " . htmlentities($col, ENT_QUOTES, 'UTF-8') . ", " . htmlentities($col_type, ENT_QUOTES, 'UTF-8') . "<br>";
                           $scanResultsStrCopy .= "&emsp;&emsp;&emsp;&emsp;[+] " . $col . ", " . $col_type . "<br>";
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
                   echo "<br>";
               }
               echo "[*] DB Data Dump: <br>";
               $scanResultsStrCopy .= "[*] DB Data Dump: <br>";
               echo "&emsp;[*] DB: " . htmlentities($dataEntry['value']['__infos__']['db'], ENT_QUOTES, 'UTF-8') . " <br>";
               $scanResultsStrCopy .= "&emsp;[*] DB: " . $dataEntry['value']['__infos__']['db'] . " <br>";
               echo "&emsp;[*] Table: " . htmlentities($dataEntry['value']['__infos__']['table'], ENT_QUOTES, 'UTF-8') . " <br>";
               $scanResultsStrCopy .= "&emsp;[*] Table: " . $dataEntry['value']['__infos__']['table'] . " <br>";
               echo "&emsp;[*] Row Count: " . $dataEntry['value']['__infos__']['count'] . " <br>";
               $scanResultsStrCopy .= "&emsp;[*] Row Count: " . $dataEntry['value']['__infos__']['count'] . " <br>";
               $colFormat = "";
               foreach ($dataEntry['value'] as $colName => $colInfo) {
                   if ($colName == "__infos__") {
                       continue;
                   }
                   $colFormat .= $colName . ", ";
               }
               echo "&emsp;&emsp;[*] Column Data: " . htmlentities(preg_replace("#, $#", "", $colFormat), ENT_QUOTES, 'UTF-8') . "<br>";
               $scanResultsStrCopy .= "&emsp;&emsp;[*] Column Data: " . preg_replace("#, $#", "", $colFormat) . "<br>";
               for ($i=0; $i < $dataEntry['value']['__infos__']['count']; $i++) {
                   $lineDump = "";
                   foreach ($dataEntry['value'] as $colName => $colInfo) {
                       $lineDump .= $colInfo['values'][$i] . ", ";
                   }
                   echo "&emsp;&emsp;&emsp;[+] " . htmlentities(preg_replace("#, $#", "", $lineDump), ENT_QUOTES, 'UTF-8') . "<br>";
                   $scanResultsStrCopy .= "&emsp;&emsp;&emsp;[+] " . preg_replace("#, $#", "", $lineDump) . "<br>";
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
                               echo "<br>[*] File Content for: " . htmlentities($options_to_enable['rFile'], ENT_QUOTES, 'UTF-8') . " <br>";
                               $scanResultsStrCopy .= "<br>[*] File Content for: " . $options_to_enable['rFile'] . " <br>";
                               $fh = fopen($localFile, "rb");
                               while (!feof($fh)) {
                                   $line = fgets($fh);
                                   echo htmlentities($line, ENT_QUOTES, 'UTF-8');
                                   $scanResultsStrCopy .= $line;
                               }
                               fclose($fh);
                               echo "<br>";
                               $scanResultsStrCopy .= "<br>";
                           } else {
                               echo "<br>[*] Non-ASCII File Content for: " . htmlentities($options_to_enable['rFile'], ENT_QUOTES, 'UTF-8') . " <br>";
                               $scanResultsStrCopy .= "<br>[*] Non-ASCII File Content for: " . $options_to_enable['rFile'] . " <br>";
                               echo "<br>&emsp;[*] Unable to display as a result...<br>";
                               $scanResultsStrCopy .= "<br>&emsp;[*] Unable to display as a result...<br>";
                           }
                       }
                   } else {
                       $localFile = explode(" ", $localFilePath)[0];
                       echo "<br>[x] Problem Reading File Content for: " . htmlentities($options_to_enable['rFile'], ENT_QUOTES, 'UTF-8') . " <br>";
                       $scanResultsStrCopy .= "<br>[x] Problem Reading File Content for: " . $options_to_enable['rFile'] . " <br>";
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
               echo "[*] OS Command: " . htmlentities($options_to_enable['osCmd'], ENT_QUOTES, 'UTF-8') . "<br>";
               $scanResultsStrCopy .= "[*] OS Command: " . $options_to_enable['osCmd'] . "<br>";
               if (is_array($dataEntry['value'])) {
                   echo htmlentities($dataEntry['value'][0], ENT_QUOTES, 'UTF-8') . "<br><br>";
                   $scanResultsStrCopy .= $dataEntry['value'][0] . "<br><br>";
               } else {
                   echo htmlentities($dataEntry['value'], ENT_QUOTES, 'UTF-8') . "<br><br>";
                   $scanResultsStrCopy .= $dataEntry['value'] . "<br><br>";
               }
           }
           break;

         case "24":
           // Windows Registry Read
           if ($dataEntry['status'] == 1) {
               echo "<br>[*] Result from Reading Windows Registry: <br>";
               $scanResultsStrCopy .= "<br>[*] Result from Reading Windows Registry: <br>";
               echo "&emsp;[*] Registry Key: " . htmlentities($options_to_enable['regKey'], ENT_QUOTES, 'UTF-8') . "<br>";
               $scanResultsStrCopy .= "&emsp;[*] Registry Key: " . $options_to_enable['regKey'] . "<br>";
               echo "&emsp;&emsp;[*] Key Value: " . htmlentities($options_to_enable['regVal'], ENT_QUOTES, 'UTF-8') . "<br>";
               $scanResultsStrCopy .= "&emsp;&emsp;[*] Key Value: " . $options_to_enable['regVal'] . "<br>";
               echo "&emsp;&emsp;[*] Key Type: " . htmlentities($options_to_enable['regType'], ENT_QUOTES, 'UTF-8') . "<br>";
               $scanResultsStrCopy .= "&emsp;&emsp;[*] Key Type: " . $options_to_enable['regType'] . "<br>";
               if (is_array($dataEntry['value'])) {
                   echo "&emsp;&emsp;[*] Key Data Returned: " . htmlentities(str_replace($options_to_enable['regVal'] . "    " . $options_to_enable['regType'] . "    ", "", $dataEntry['value'][0]), ENT_QUOTES, 'UTF-8') . "<br>";
                   $scanResultsStrCopy .= "&emsp;&emsp;[*] Key Data Returned: " . str_replace($options_to_enable['regVal'] . "    " . $options_to_enable['regType'] . "    ", "", $dataEntry['value'][0]) . "<br>";
               } else {
                   echo "&emsp;&emsp;[*] Key Data Returned: " . htmlentities(str_replace($options_to_enable['regVal'] . "    " . $options_to_enable['regType'] . "    ", "", $dataEntry['value']), ENT_QUOTES, 'UTF-8') . "<br>";
                   $scanResultsStrCopy .= "&emsp;&emsp;[*] Key Data Returned: " . str_replace($options_to_enable['regVal'] . "    " . $options_to_enable['regType'] . "    ", "", $dataEntry['value']) . "<br>";
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
         echo "<br>[*] Manual verification required for file write:<br>&emsp;[*] Payload: " . htmlentities($options_to_enable['wFile'], ENT_QUOTES, 'UTF-8') . "<br>&emsp;[*] File Destination: " . htmlentities($options_to_enable['dFile'], ENT_QUOTES, 'UTF-8') . "<br>";
         $scanResultsStrCopy .= "<br>[*] Manual verification required for file write:<br>&emsp;[*] Payload: " . $options_to_enable['wFile'] . "<br>&emsp;[*] File Destination: " . $options_to_enable['dFile'] . "<br>";
     }
     if ((isset($options_to_enable['regAdd'])) && ($options_to_enable['regAdd'] == 'true')) {
         echo "<br>[Warning] Registry Add Option has NO Verification Step<br>";
         echo "&emsp;[*] Re-Scan with Registry Read Options Set to Validate Registry Change<br>";
         $scanResultsStrCopy .= "<br>[Warning] Registry Add Option has NO Verification Step<br>&emsp;[*] Re-Scan with Registry Read Options Set to Validate Registry Change<br>";
     }
     // Save our results info to our own logfile, since API seems to detach log somehow....
     @mkdir(TMP_PATH);
     @mkdir(TMP_PATH .  $host_str);
     $log = TMP_PATH .  $host_str . "/api_scan.log";
     $fh = fopen($log, "a+");
     fwrite($fh, $scanResultsStrCopy);
     fclose($fh);
     chmod($log, 0644);

     echo '</div><br />';
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
     echo '<div class="textbook" id="results_errors_textarea" rows="20">';
     print_r($scanData['error']);
     echo '</div>';
 }
