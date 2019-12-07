
            <br />
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_request_prefix">Custom Injection Prefix/自定义注入前缀:</label>
                <select class="form-control" id="select_request_prefix" name="request_prefix">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_prefix_data_form', 1)">Disabled/无效</option>
                  <option value="enabled" onClick="divHideAndSeek('display_prefix_data_form', 0)">Enabled/有效</option>
                </select>
                <div id="display_prefix_data_form" align="central" style="display: none">
                  <br />
                  <label for="request_prefix_str">Custom Injection Prefix String to Use/要使用的自定义注入前缀字串:</label>
                  <input type="text" class="form-control" id="request_prefix_str" name="prefix" placeholder="i.e. ') ">
                  <br />
                </div><br />

                <label for="select_request_suffix">Custom Injection Suffix/自定义注入后缀:</label>
                <select class="form-control" id="select_request_suffix" name="request_suffix">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_suffix_data_form', 1)">Disabled/无效</option>
                  <option value="enabled" onClick="divHideAndSeek('display_suffix_data_form', 0)">Enabled/有效</option>
                </select>
                <div id="display_suffix_data_form" align="central" style="display: none">
                  <br />
                  <label for="request_suffix_str">Custom Injection Suffix String to Use/要使用的自定义注入后缀字串:</label>
                  <input type="text" class="form-control" id="request_suffix_str" name="suffix" placeholder="i.e. AND ('abc'='abc ">
                  <br />
                </div><br />

                <label for="select_request_invalidator">Select Method Used to Invalidate Query/选择用于查询无效的方法:</label>
                <select class="form-control" id="select_request_invalidator" name="request_invalidator">
                  <option value="default" selected="selected">Negate Value/相反数</option>
                  <option value="invalidBignum">Large Integer/大整数</option>
                  <option value="invalidLogical">Logical Operator/逻辑运算符</option>
                  <option value="invalidString">Random String/随机字符</option>
                </select><br />

                <label for="select_request_casting">Payload Casting Mechanism/payload转换机制:</label>
                <select class="form-control" id="select_request_casting" name="noCast">
                  <option value="" selected="selected">Enabled/有效</option>
                  <option value="true">Disabled/无效</option>
                </select><br />

                <label for="select_request_hex">Use of DBMS hex function(s) for data retrieval/是否16进制显示DBMS数据查询结果:</label>
                <select class="form-control" id="select_request_hex" name="hexConvert">
                  <option value="true">Enabled/是</option>
                  <option value="" selected="selected">Disabled/否</option>
                </select><br />

                <label for="select_request_hpp">Use of HTTP Parameter Pollution Method/是否使用HTTP参数污染方法:</label>
                <select class="form-control" id="select_request_hpp" name="hpp">
                  <option value="true">Enabled/是</option>
                  <option value="" selected="selected">Disabled/否</option>
                </select><br />


                <div id="display_time_based_data_form" align="central" style="display: none">
                  <label for="select_timeSec">Seconds to Delay the DBMS Response for Time Based Atatck/延迟基于时间攻击的DBMS响应的秒数:</label>
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
                  <label for="select_union_col_range">Define Union Column Range/是否定义联合列数范围:</label>
                  <select class="form-control" id="select_union_col_range" name="union_col_range">
                    <option value="" selected="selected" onClick="divHideAndSeek('display_union_col_range_data_form', 1)">Disabled/是</option>
                    <option value="enabled" onClick="divHideAndSeek('display_union_col_range_data_form', 0)">Enabled/否</option>
                  </select>
                  <div id="display_union_col_range_data_form" align="central" style="display: none">
                    <br />
                    <label for="union_col_min">Min Columns/最少列数:</label>
                    <select class="form-control" id="union_col_min" name="union_col_min">
                      <option value="1" selected="selected"> 1 </option>
                      <?php
                        foreach(range(2, 999) as $number) {
                          echo "                    <option value=\"$number\"> $number </option>";
                        }
                      ?>
                    </select><br />
                    <label for="union_col_max">Max Columns/最多列数:</label>
                    <select class="form-control" id="union_col_max" name="union_col_max">
                      <option value="2" selected="selected"> 2 </option>
                      <?php
                        foreach(range(3, 1000) as $number) {
                          echo "                    <option value=\"$number\"> $number </option>";
                        }
                      ?>
                    </select><br />
                  </div><br />

                  <label for="select_union_char_filter">Define Custom Char for Union Column Brute/是否自定义爆破联合列名字符串:</label>
                  <select class="form-control" id="select_union_char_filter" name="union_char_filter">
                    <option value="" selected="selected" onClick="divHideAndSeek('display_union_char_filter_data_form', 1)">Disabled/是</option>
                    <option value="enabled" onClick="divHideAndSeek('display_union_char_filter_data_form', 0)">Enable/否</option>
                  </select>
                  <div id="display_union_char_filter_data_form" align="central" style="display: none">
                    <br />
                    <label for="union_char">Custom Char to Use/选择自定义字符串:</label>
                    <input type="text" class="form-control" id="union_char" name="uChar" placeholder="i.e. 123 ">
                    <br />
                  </div><br />

                  <label for="select_union_from_filter">Define Table for FROM part of UNION:</label>
                  <select class="form-control" id="select_union_from_filter" name="union_from_filter">
                    <option value="" selected="selected" onClick="divHideAndSeek('display_union_from_filter_data_form', 1)">Disabled</option>
                    <option value="enabled" onClick="divHideAndSeek('display_union_from_filter_data_form', 0)">Enable</option>
                  </select>
                  <div id="display_union_from_filter_data_form" align="central" style="display: none">
                    <br />
                    <label for="union_from">FROM Table to Use/选择表:</label>
                    <input type="text" class="form-control" id="union_from" name="uFrom" placeholder="i.e. users ">
                    <br />
                  </div><br />
                </div><br />






              </div>
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_technique">选择测试SQL注入的方法:</label>
                <select class="form-control" id="technique" name="tech[]" size="7" onchange="techCheck()" multiple>
                  <option value="A">测试所有项！</option>
                  <option value="B" selected="selected">基于布尔型盲注</option>
                  <option value="E">报错注入/</option>
                  <option value="Q">内联视图</option>
                  <option value="S">堆叠查询</option>
                  <option value="T">基于时间型盲注</option>
                  <option value="U">基础联合注入</option>
                </select><br />

                <div class="col-md-4">
                  <label for="select_scan_level">扫描等级：</label>
                  <select class="form-control" id="select_scan_level" name="level">
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3" selected="selected"> 3 </option>
                    <option value="4"> 4 </option>
                    <option value="5"> 5 </option>
                  </select><br />
                </div>
                <div class="col-md-4">
                  <label for="select_scan_risk">扫描风险：</label>
                  <select class="form-control" id="select_risk" name="risk">
                    <option value="0"> 无 </option>
                    <option value="1"> 低 </option>
                    <option value="2" selected="selected"> 中 </option>
                    <option value="3"> 高 </option>
                  </select><br />
                </div>
                <div class="col-md-3">
                  <label for="select_thread_count">线程：</label>
                  <select class="form-control" id="select_thread_count" name="threads">
                    <option value="1" selected="selected"> 1 </option>
                    <?php
                      foreach(range(2, 10) as $number) {
                        echo "                  <option value=\"$number\"> $number </option>";
                      }
                    ?>
                  </select><br />
                </div>

                <label for="select_dbms">选择后端数据库类型：</label>
                <select class="form-control" id="select_dbms" name="dbms">
                  <option value="" selected="selected">未知</option>
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

                <label for="select_os">选择后端操作系统：</label>
                <select class="form-control" id="select_os" name="os">
                  <option value="" selected="selected">未知</option>
                  <option value="Linux">Linux</option>
                  <option value="Windows">Windows</option>
                </select><br />

                <label for="select_tamper">选择tamper脚本：</label>
                <select class="form-control" id="select_tamper" name="tamper[]" size="7" multiple>
                  <option value="" selected="selected">不使用任何tamper脚本!</option>

                  <?php
                    include("../src/inc/config.php");
                    $tamperScripts = array_diff(glob(SQLMAP_BIN_PATH . "tamper/*.py"), array(".", "..", SQLMAP_BIN_PATH . "tamper/__init__.py"));
                    include("./tamper.php");
                    foreach($tamperScripts as $tscript) {
                      $ts = str_replace(SQLMAP_BIN_PATH . "tamper/", "", $tscript);
                      echo '<option value="tamper/' . $ts . '" data-html="true" data-toggle="tooltip" data-placement="bottom" title="'.$title_value[$ts].'">' . $ts . '</option>';
                    }
                  ?>

                </select><br />
              </div>
              <div class="col-md-1"></div>
            </div>

