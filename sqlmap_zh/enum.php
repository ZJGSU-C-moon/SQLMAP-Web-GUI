
            <br />
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <div id="display_enum_db_data_form" align="central">
                  <label for="enum_db">数据库获取或爆破：</label>
                  <input type="text" class="form-control" id="enum_db" name="db" placeholder="i.e. database,names,here ">
                  <br />
                </div>

                <div id="display_enum_table_data_form" align="central">
                  <br />
                  <label for="enum_table">数据表获取或爆破：</label>
                  <input type="text" class="form-control" id="enum_table" name="tbl" placeholder="i.e. table,names,here ">
                  <br />
                </div>

                <div id="display_enum_column_data_form" align="central">
                  <br />
                  <label for="enum_column">字段获取或爆破：</label>
                  <input type="text" class="form-control" id="enum_column" name="col" placeholder="i.e. juicy,columns,here ">
                  <br />
                </div>

                <div id="display_enum_not_column_data_form" align="central">
                  <br />
                  <label for="enum_exclude_column">不需要爆破的字段名：</label>
                  <input type="text" class="form-control" id="enum_exclude_column" name="excludeCol" placeholder="i.e. useless,columns,here ">
                  <br />
                </div>

                <div id="display_enum_db_user_data_form" align="central">
                  <br />
                  <label for="enum_db_user">需要爆破的数据库用户：</label>
                  <input type="text" class="form-control" id="enum_db_user" name="user" placeholder="i.e. username ">
                  <br />
                </div>

                <div id="display_enum_where_data_form" align="central">
                  <br />
                  <label for="enum_where">设置获取数据的过滤条件：</label>
                  <input type="text" class="form-control" id="enum_where" name="dumpWhere" placeholder="i.e. group='admin' ">
                  <br />
                </div>

              </div>
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_enum_options">可用爆破选项：</label>
                <select class="form-control" id="enum_options" name="enum_options[]" size="19" onchange="enumCheck()" multiple>
                  <option value="getAll">获取所有信息！</option>
                  <option value="getBanner" selected="selected">DBMS版本号或者标识信息</option>
                  <option value="extensiveFp">DBMS版本识别指纹</option>
                  <option value="getHostname">数据库服务器主机名</option>
                  <option value="getCurrentDb">当前使用的数据库</option>
                  <option value="getDbs">所有可用数据库</option>
                  <option value="getCurrentUser">当前数据库用户</option>
                  <option value="getUsers">所有数据库用户</option>
                  <option value="getSchema">获取数据库以及数据表</option>
                  <option value="isDba">检测当前用户是否是DBA</option>
                  <option value="getPasswordHashes">获取数据库用户名及密码</option>
                  <option value="getPrivileges">查看数据库用户特权</option>
                  <option value="getRoles">查看数据库用户角色</option>
                  <option value="getCount">检测字段数</option>
                  <option value="getTables">检测数据表</option>
                  <option value="getColumns">检测字段</option>
                  <option value="search">搜索数据库、数据表或字段名</option>
                  <option value="commonTables">暴力破解常用数据表</option>
                  <option value="commonColumns">暴力破解常用字段</option>
                  <option value="dumpTable">获取字段数据</option>
                  <option value="dumpAll">获取所有数据！</option>
                  <option value="excludeSysDbs">不需要默认数据库信息</option>


                </select><br />
                <div class="col-md-1"></div>
                <div class="col-md-4">
                  <label for="select_row_start">Row Start：</label>
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
                  <label for="select_row_stop">Row Stop：</label>
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
                    <label for="enum_sql_query">SQL命令执行：</label>
                    <input type="text" class="form-control" id="enum_sql_query" name="enum_sql_query" placeholder="i.e. SELECT version() ">
                    <br />
                  </div>
                </div>
              </div>
              <div class="col-md-1"></div>
            </div>

