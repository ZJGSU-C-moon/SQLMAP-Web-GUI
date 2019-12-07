
            <br />
            <div class="row">
              <div class="col-md-6">
                <label for="url">目标网站：</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="http://site.com/vuln.php?id=1">
              </div>
              <div class="col-md-2">
                <label for="select_method">HTTP请求方式：</label>
                <select class="form-control" id="select_method" name="method">
                  <option value="GET" selected="selected" onClick="divHideAndSeek('display_post_data_form', 1)">GET（默认）</option>
                  <option value="OPTIONS" onClick="divHideAndSeek('display_post_data_form', 1)">OPTIONS</option>
                  <option value="HEAD" onClick="divHideAndSeek('display_post_data_form', 1)">HEAD</option>
                  <option value="POST" onClick="divHideAndSeek('display_post_data_form', 0)">POST</option>
                  <option value="PUT" onClick="divHideAndSeek('display_post_data_form', 0)">PUT</option>
                </select><br />
              </div>
              <div class="col-md-3">
                <label for="select_method">删除现有会话信息：</label>
                <select class="form-control" id="select_method" name="flushSession">
                  <option value="n" selected="selected">否</option>
                  <option value="y">是</option>
                </select><br />
              </div>
              <div class="col-md-1"></div>
            </div>

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div id="display_post_data_form" align="central" style="display: none">
                  <label for="post_data">请求数据:</label>
                  <input type="text" class="form-control" id="post_data" name="data" placeholder="i.e. username=foo&password=bar&submit=Submit">
                </div><br />
              </div>
              <div class="col-md-3"></div>
            </div>


            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-2">
                <label class="radio-inline">
                  <input type="radio" name="identifier" value="marker" onClick="divHideAndSeek('display_identifier_data_form', 1); divHideAndSeek('display_skip_data_form', 1);">* 对标记参数注入
                </label>
              </div>
              <div class="col-md-3">
                <label class="radio-inline">
                  <input type="radio" name="identifier" value="parameter" onClick="divHideAndSeek('display_identifier_data_form', 0); divHideAndSeek('display_skip_data_form', 1);">已知可被利用的参数
                </label>
              </div>
              <div class="col-md-3">
                <label class="radio-inline">
                  <input type="radio" name="identifier" checked="checked" value="fuzz" onClick="divHideAndSeek('display_identifier_data_form', 1); divHideAndSeek('display_skip_data_form', 0);">未知任何参数，爆破所有参数
                </label>
              </div>
              <div class="col-md-3">
                <label class="radio-inline">
                  <input type="radio" name="identifier" value="forms" onClick="divHideAndSeek('display_identifier_data_form', 1); divHideAndSeek('display_skip_data_form', 0);">未知任何参数，爆破页面所有表单
                </label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-5">
                <br /><br />
                <div id="display_identifier_data_form" align="central" style="display: none">
                  <label for="testParameter">选择可被利用的参数名：</label>
                  <input type="text" class="form-control" id="testParameter" name="testParameter" placeholder="i.e. paramName">
                  <br />
                </div>
                <div id="display_skip_data_form" align="central" style="display: block">
                  <label for="vuln_param">选择跳过的参数名：</label>
                  <input type="text" class="form-control" id="skip_param" name="skip" placeholder="i.e. paramName,to,skip">
                  <br />
                </div>
              </div>
              <div class="col-md-4"></div>
            </div>



