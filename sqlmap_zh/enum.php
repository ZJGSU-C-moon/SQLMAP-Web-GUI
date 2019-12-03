
            <br />
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <div id="display_enum_db_data_form" align="central">
                  <label for="enum_db">Database(s) to Dump or Enumerate/数据库下载或枚举:</label>
                  <input type="text" class="form-control" id="enum_db" name="db" placeholder="i.e. database,names,here ">
                  <br />
                </div>

                <div id="display_enum_table_data_form" align="central">
                  <br />
                  <label for="enum_table">Table(s) to Dump or Enumerate/数据表下载或枚举:</label>
                  <input type="text" class="form-control" id="enum_table" name="tbl" placeholder="i.e. table,names,here ">
                  <br />
                </div>

                <div id="display_enum_column_data_form" align="central">
                  <br />
                  <label for="enum_column">Column(s) to Dump or Enumerate/字段下载或枚举:</label>
                  <input type="text" class="form-control" id="enum_column" name="col" placeholder="i.e. juicy,columns,here ">
                  <br />
                </div>

                <div id="display_enum_not_column_data_form" align="central">
                  <br />
                  <label for="enum_exclude_column">Column(s) to Exclude or NOT Enumerate/不需要枚举或包含的字段名:</label>
                  <input type="text" class="form-control" id="enum_exclude_column" name="excludeCol" placeholder="i.e. useless,columns,here ">
                  <br />
                </div>

                <div id="display_enum_db_user_data_form" align="central">
                  <br />
                  <label for="enum_db_user">Specific Database User to Enumerate/具体数据库用户枚举:</label>
                  <input type="text" class="form-control" id="enum_db_user" name="user" placeholder="i.e. username ">
                  <br />
                </div>

                <div id="display_enum_where_data_form" align="central">
                  <br />
                  <label for="enum_where">Where Condition to Filter Dump Results/设置下载过滤条件:</label>
                  <input type="text" class="form-control" id="enum_where" name="dumpWhere" placeholder="i.e. group='admin' ">
                  <br />
                </div>

              </div>
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_enum_options">Select Enumeration Options to Enable/可用枚举选项:</label>
                <select class="form-control" id="enum_options" name="enum_options[]" size="19" onchange="enumCheck()" multiple>
                  <option value="getAll">Enumerate ALL the Things/枚举所有参数!</option>
                  <option value="getBanner" selected="selected">Version or Banner Info/DBMS版本号或者标识信息</option>
                  <option value="extensiveFp">Extensive DBMS Fingerprint/广泛DBMS版本指纹识别</option>
                  <option value="getHostname">Database Server Hostname/数据库服务器主机名</option>
                  <option value="getCurrentDb">Current Active Database/当前使用的数据库</option>
                  <option value="getDbs">All Available Databases/所有可用数据库</option>
                  <option value="getCurrentUser">Current Database User/数据库当前用户</option>
                  <option value="getUsers">All Database Users/所有数据库用户</option>
                  <option value="getSchema">Dump Database & Table Schema/下载数据库以及数据表模式</option>
                  <option value="isDba">Check if User Is DBA/检测当前用户是否是DBA</option>
                  <option value="getPasswordHashes">Dump Database User Passwords/下载数据库用户名及密码</option>
                  <option value="getPrivileges">Check Database User Privileges/查看数据库用户特权</option>
                  <option value="getRoles">Check Database User Roles/查看数据库用户角色</option>
                  <option value="getCount">Identify Count/</option>
                  <option value="getTables">Identify Tables/数据表识别</option>
                  <option value="getColumns">Identify Columns/字段识别</option>
                  <option value="search">Search for DB, Table or Column Name/检索数据库、数据表或字段名</option>
                  <option value="commonTables">Bruteforce Common Tables/暴力破解常用数据表</option>
                  <option value="commonColumns">Bruteforce Common Columns/暴力破解常用字段</option>
                  <option value="dumpTable">Dump Data/下载数据</option>
                  <option value="dumpAll">Dump All the Things!/下载所有数据</option>
                  <option value="excludeSysDbs">Exclude Default System Databases/不包括默认数据库</option>


                </select><br />
                <div class="col-md-1"></div>
                <div class="col-md-4">
                  <label for="select_row_start">Row Start:</label>
                  <select class="form-control" id="select_row_start" name="limitStart">
                    <option value="" selected="selected"> Disabled </option>
                    <?php
                      foreach(range(1, 1000) as $number) {
                        echo "                  <option value=\"$number\"> $number </option>";
                      }
                    ?>
                  </select><br />
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <label for="select_row_stop">Row Stop:</label>
                  <select class="form-control" id="select_row_stop" name="limitStop">
                    <option value="" selected="selected"> Disabled </option>
                    <?php
                      foreach(range(1, 1000) as $number) {
                        echo "                  <option value=\"$number\"> $number </option>";
                      }
                    ?>
                  </select><br />
                </div>
                <div class="col-md-1"></div>

                <div class="col-md-12">
                  <div id="display_enum_sql_query_data_form" align="central">
                    <br />
                    <label for="enum_sql_query">SQL Statement to Execute/SQL命令执行:</label>
                    <input type="text" class="form-control" id="enum_sql_query" name="enum_sql_query" placeholder="i.e. SELECT version() ">
                    <br />
                  </div>
                </div>
              </div>
              <div class="col-md-1"></div>
            </div>

