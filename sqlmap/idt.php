
            <br />
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_request_prefix">Custom Injection Prefix:</label>
                <select class="form-control" id="select_request_prefix" name="request_prefix">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_prefix_data_form', 1)">Disabled</option>
                  <option value="enabled" onClick="divHideAndSeek('display_prefix_data_form', 0)">Enabled</option>
                </select>
                <div id="display_prefix_data_form" align="central" style="display: none">
                  <br />
                  <label for="request_prefix_str">Custom Injection Prefix String to Use:</label>
                  <input type="text" class="form-control" id="request_prefix_str" name="prefix" placeholder="i.e. ') ">
                  <br />
                </div><br />

                <label for="select_request_suffix">Custom Injection Suffix:</label>
                <select class="form-control" id="select_request_suffix" name="request_suffix">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_suffix_data_form', 1)">Disabled</option>
                  <option value="enabled" onClick="divHideAndSeek('display_suffix_data_form', 0)">Enabled</option>
                </select>
                <div id="display_suffix_data_form" align="central" style="display: none">
                  <br />
                  <label for="request_suffix_str">Custom Injection Suffix String to Use:</label>
                  <input type="text" class="form-control" id="request_suffix_str" name="suffix" placeholder="i.e. AND ('abc'='abc ">
                  <br />
                </div><br />

                <label for="select_request_invalidator">Select Method Used to Invalidate Query:</label>
                <select class="form-control" id="select_request_invalidator" name="request_invalidator">
                  <option value="default" selected="selected">Negate Value</option>
                  <option value="invalidBignum">Large Integer</option>
                  <option value="invalidLogical">Logical Operator</option>
                  <option value="invalidString">Random String</option>
                </select><br />

                <label for="select_request_casting">Payload Casting Mechanism:</label>
                <select class="form-control" id="select_request_casting" name="noCast">
                  <option value="" selected="selected">Enabled</option>
                  <option value="true">Disabled</option>
                </select><br />

                <label for="select_request_hex">Use of DBMS hex function(s) for data retrieval:</label>
                <select class="form-control" id="select_request_hex" name="hexConvert">
                  <option value="true">Enabled</option>
                  <option value="" selected="selected">Disabled</option>
                </select><br />

                <label for="select_request_hpp">Use of HTTP Parameter Pollution Method:</label>
                <select class="form-control" id="select_request_hpp" name="hpp">
                  <option value="true">Enabled</option>
                  <option value="" selected="selected">Disabled</option>
                </select><br />


                <div id="display_time_based_data_form" align="central" style="display: none">
                  <label for="select_timeSec">Seconds to Delay the DBMS Response for Time Based Atatck:</label>
                  <select class="form-control" id="select_timeSec" name="timeSec">
                    <option value="3"> 3 </option>
                    <option value="5" selected="selected"> 5 </option>
                    <option value="8"> 8 </option>
                    <option value="10"> 10 </option>
                    <option value="12"> 12 </option>
                    <option value="15"> 15 </option>
                    <option value="18"> 18 </option>
                    <option value="20"> 20 </option>
                    <option value="25"> 25 </option>
                  </select><br />
                </div>

                <div id="display_union_data_form" align="central" style="display: none">
                  <label for="select_union_col_range">Define Union Column Range:</label>
                  <select class="form-control" id="select_union_col_range" name="union_col_range">
                    <option value="" selected="selected" onClick="divHideAndSeek('display_union_col_range_data_form', 1)">Disabled</option>
                    <option value="enabled" onClick="divHideAndSeek('display_union_col_range_data_form', 0)">Enabled</option>
                  </select>
                  <div id="display_union_col_range_data_form" align="central" style="display: none">
                    <br />
                    <label for="union_col_min">Min Columns:</label>
                    <select class="form-control" id="union_col_min" name="union_col_min">
                      <option value="1" selected="selected"> 1 </option>
                      <?php
                        foreach(range(2, 999) as $number) {
                          echo "                    <option value=\"$number\"> $number </option>";
                        }
                      ?>
                    </select><br />
                    <label for="union_col_max">Max Columns:</label>
                    <select class="form-control" id="union_col_max" name="union_col_max">
                      <option value="2" selected="selected"> 2 </option>
                      <?php
                        foreach(range(3, 1000) as $number) {
                          echo "                    <option value=\"$number\"> $number </option>";
                        }
                      ?>
                    </select><br />
                  </div><br />

                  <label for="select_union_char_filter">Define Custom Char for Union Column Brute:</label>
                  <select class="form-control" id="select_union_char_filter" name="union_char_filter">
                    <option value="" selected="selected" onClick="divHideAndSeek('display_union_char_filter_data_form', 1)">Disabled</option>
                    <option value="enabled" onClick="divHideAndSeek('display_union_char_filter_data_form', 0)">Enabled</option>
                  </select>
                  <div id="display_union_char_filter_data_form" align="central" style="display: none">
                    <br />
                    <label for="union_char">Custom Char to Use:</label>
                    <input type="text" class="form-control" id="union_char" name="uChar" placeholder="i.e. 123 ">
                    <br />
                  </div><br />

                  <label for="select_union_from_filter">Define Table for FROM part of UNION:</label>
                  <select class="form-control" id="select_union_from_filter" name="union_from_filter">
                    <option value="" selected="selected" onClick="divHideAndSeek('display_union_from_filter_data_form', 1)">Disabled</option>
                    <option value="enabled" onClick="divHideAndSeek('display_union_from_filter_data_form', 0)">Enabled</option>
                  </select>
                  <div id="display_union_from_filter_data_form" align="central" style="display: none">
                    <br />
                    <label for="union_from">FROM Table to Use:</label>
                    <input type="text" class="form-control" id="union_from" name="uFrom" placeholder="i.e. users ">
                    <br />
                  </div><br />
                </div><br />






              </div>
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_technique">Select SQLi Method(s) to Test:</label>
                <select class="form-control" id="technique" name="tech[]" size="7" onchange="techCheck()" multiple>
                  <option value="A">Test ALL Methods!</option>
                  <option value="B" selected="selected">Boolean Based Blind</option>
                  <option value="E">Error Based</option>
                  <option value="Q">Inline Queries</option>
                  <option value="S">Stacked Queries</option>
                  <option value="T">Time Based Blind</option>
                  <option value="U">Union Based</option>
                </select><br />

                <div class="col-md-4">
                  <label for="select_scan_level">Scan Level:</label>
                  <select class="form-control" id="select_scan_level" name="level">
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3" selected="selected"> 3 </option>
                    <option value="4"> 4 </option>
                    <option value="5"> 5 </option>
                  </select><br />
                </div>
                <div class="col-md-4">
                  <label for="select_scan_risk">Scan Risk:</label>
                  <select class="form-control" id="select_risk" name="risk">
                    <option value="0"> None </option>
                    <option value="1"> Low </option>
                    <option value="2" selected="selected"> Med </option>
                    <option value="3"> Hi </option>
                  </select><br />
                </div>
                <div class="col-md-3">
                  <label for="select_thread_count">Threads:</label>
                  <select class="form-control" id="select_thread_count" name="threads">
                    <option value="1" selected="selected"> 1 </option>
                    <?php
                      foreach(range(2, 10) as $number) {
                        echo "                  <option value=\"$number\"> $number </option>";
                      }
                    ?>
                  </select><br />
                </div>

                <label for="select_dbms">Select Backend Database Type:</label>
                <select class="form-control" id="select_dbms" name="dbms">
                  <option value="" selected="selected">Unknown</option>
                  <option value="DB2">DB2</option>
                  <option value="Firebird">Firebird</option>
                  <option value="Microsoft Access">MS-Access</option>
                  <option value="Microsoft SQL Server">MS-SQL</option>
                  <option value="MySQL">MySQL</option>
                  <option value="Oracle">Oracle</option>
                  <option value="PostgreSQL">PostgreSQL</option>
                  <option value="SAP MaxDB">SAP MaxDB</option>
                  <option value="SQLite">SQLite</option>
                  <option value="Sybase">Sybase</option>
                </select><br />

                <label for="select_os">Select Backend OS Type:</label>
                <select class="form-control" id="select_os" name="os">
                  <option value="" selected="selected">Unknown</option>
                  <option value="Linux">Linux</option>
                  <option value="Windows">Windows</option>
                </select><br />

                <label for="select_tamper">Select Tamper Scripts to Use:</label>
                <select class="form-control" id="select_tamper" name="tamper[]" size="7" multiple>
                  <option value="" selected="selected" data-html="true" data-toggle="tooltip" data-placement="bottom" title="123">Do NOT Apply Any Tamper Scripts!</option>

                  <?php
                    include("./inc/config.php");
                    $tamperScripts = array_diff(glob(SQLMAP_BIN_PATH . "tamper/*.py"), array(".", "..", SQLMAP_BIN_PATH . "tamper/__init__.py"));
                    // $tamperScripts = array("apostrophemask.py","apostrophenullencode.py","appendnullbyte.py","base64encode.py");
                    $title_value['apostrophemask.py'] = "功能：将引号替换为utf-8，用于过滤单引号\r\n平台：ALLALL\r\n脚本使用前：tamper(\"1 AND '1'='1\")\r\n脚本使用后：1 AND %EF%BC%871%EF%BC%87=%EF%BC%871";
                    $title_value['base64encode.py'] = "功能：替换为base64编码\r\n平台：ALLALL\r\n脚本使用前：tamper(\"1' AND SLEEP(5)#\")\r\n脚本使用后：MScgQU5EIFNMRUVQKDUpIw==";
                    $title_value['multiplespaces.py'] = "功能：围绕sql关键字添加多个空格\r\n平台：ALL ALL\r\n脚本使用前：tamper('1 UNION SELECT foobar')\r\n脚本使用后：1 UNION SELECT foobar";
                    $title_value['space2plus.py'] = "功能：用加号替换空格\r\n平台：ALLALL\r\n脚本使用前：tamper('SELECT id FROM users')\r\n脚本使用后：SELECT+id+FROM+users";
                    $title_value['nonrecursivereplacement.py'] = "功能：作为双重查询语句，用双重语句替代预定义的sql关键字\r\n平台：ALL\r\n脚本使用前：tamper('1 UNION SELECT 2--')\r\n脚本使用后：1 UNIOUNIONN SELESELECTCT 2--";
                    $title_value['space2randomblank.py'] = "功能：将空格替换为其他有效字符\r\n平台：ALL\r\n脚本使用前：tamper('SELECT id FROM users')\r\n脚本使用后：SELECT%0Did%0DFROM%0Ausers";
                    $title_value['unionalltounion.py'] = "功能：将union allselect 替换为unionselect\r\n平台：ALL\r\n脚本使用前：tamper('-1 UNION ALL SELECT')\r\n脚本使用后：-1 UNION SELECT";
                    $title_value['.py'] = "功能：\r\n平台：ALL\r\n脚本使用前：\r\n脚本使用后：";
    
                    foreach($tamperScripts as $tscript) {
                      $ts = str_replace(SQLMAP_BIN_PATH . "tamper/", "", $tscript);
                      echo '<option value="tamper/' . $ts . '" data-html="true" data-toggle="tooltip" data-placement="bottom" title="'.$title_value[$ts].'">' . $ts . '</option>';
                    }
                  ?>

                </select><br />
              </div>
              <div class="col-md-1"></div>
            </div>

