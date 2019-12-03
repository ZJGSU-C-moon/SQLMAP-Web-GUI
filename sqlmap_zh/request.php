
            <br />
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_request_delay">Time Delay Between HTTP Requests/HTTP请求间隔:</label>
                <select class="form-control" id="select_request_delay" name="delay">
                  <option value="0" selected="selected">No Delay/无</option>
                  <option value="1">1s</option>
                  <option value="5">5s</option>
                  <option value="8">8s</option>
                  <option value="10">10s</option>
                  <option value="12">12s</option>
                  <option value="15">15s</option>
                  <option value="20">20s</option>
                  <option value="25">25s</option>
                  <option value="30">30s</option>
                </select>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_user_agent_type">HTTP User-Agent String to Use/ 选择HTTP User-Agent:</label>
                <select class="form-control" id="select_user_agent_type" name="user_agent_type">
                  <option value="sqlmap" onClick="divHideAndSeek('display_user_agent_data_form', 1)">Default SQLMAP User-Agent</option>
                  <option value="mobile" onClick="divHideAndSeek('display_user_agent_data_form', 1)">Random Mobile Device User-Agent</option>
                  <option value="random" selected="selected" onClick="divHideAndSeek('display_user_agent_data_form', 1)">Random User-Agent</option>
                  <option value="custom" onClick="divHideAndSeek('display_user_agent_data_form', 0)">Custom User-Agent</option>
                </select>
              </div>
              <div class="col-md-1"></div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4"></div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div id="display_user_agent_data_form" align="central" style="display: none">
                  <br />
                  <label for="user_agent">Custom User-Agent String to Use/选择Custom User-Agent:</label>
                  <input type="text" class="form-control" id="user_agent" name="user_agent" placeholder="i.e. sqlmap/1.0-dev-xxxxxxx (http://sqlmap.org)">
                  <br />
                </div>
              <div class="col-md-1"></div>
              </div>
            </div><br /><br />


            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_request_timeout">HTTP Request Timeout/HTTP请求最长等待时间时间:</label>
                <select class="form-control" id="select_request_timeout" name="timeout">
                  <option value="15">15s</option>
                  <option value="30" selected="selected">30s</option>
                  <option value="60">60s</option>
                  <option value="90">90s</option>
                  <option value="120">120s</option>
                </select>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_host_support">HTTP Host Header String to Use/是否选择HTTP Host Header:</label>
                <select class="form-control" id="select_host_support" name="host_support">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_host_data_form', 1)">Disabled/否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_host_data_form', 0)">Enable/是</option>
                </select>
              </div>
              <div class="col-md-1"></div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4"></div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div id="display_host_data_form" align="central" style="display: none">
                  <br />
                  <label for="host_str">Custom Host Header String to Use/是否选择自定义Host Header:</label>
                  <input type="text" class="form-control" id="host_str" name="host" placeholder="i.e. custom.vhost.com">
                  <br />
                </div>
              </div>
              <div class="col-md-1"></div>
            </div><br /><br />


            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_request_retries">Number of Retries on HTTP Request Failure/选择HTTP请求失败时尝试次数:</label>
                <select class="form-control" id="select_request_retries" name="retries">
                  <option value="1">1</option>
                  <option value="3" selected="selected">3</option>
                  <option value="5">5</option>
                  <option value="8">8</option>
                  <option value="10">10</option>
                </select>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_cookie_support">HTTP Cookie String to Use/是否使用HTTP Cookie:</label>
                <select class="form-control" id="select_cookie_support" name="cookie_support">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_cookie_data_form', 1)">Disabled/否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_cookie_data_form', 0)">Enable Custom Cookie String/是  cookie值</option>
                </select>
              </div>
              <div class="col-md-1"></div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4"></div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div id="display_cookie_data_form" align="central" style="display: none">
                  <br />
                  <label for="cookie_str">Custom Cookie String to Use/使用自定义Cookie:</label>
                  <input type="text" class="form-control" id="cookie_str" name="cookie" placeholder="i.e. authenticated=true;">
                  <br />
                </div>
              </div>
              <div class="col-md-1"></div>
            </div><br /><br />


            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_auth_type">HTTP Authentication/是否HTTP 验证:</label>
                <select class="form-control" id="select_auth_type" name="auth_type">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_auth_data_form', 1)">Disabled/否</option>
                  <option value="Basic" onClick="divHideAndSeek('display_auth_data_form', 0)">Basic/基础验证</option>
                  <option value="Digest" onClick="divHideAndSeek('display_auth_data_form', 0)">Digest/</option>
                  <option value="NTLM" onClick="divHideAndSeek('display_auth_data_form', 0)">NTLM/身份验证</option>
                </select>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_referer_support">HTTP Referer String to Use/是否使用HTTP Referer:</label>
                <select class="form-control" id="select_referer_support" name="referer_support">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_referer_data_form', 1)">Disabled/否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_referer_data_form', 0)">Enable Custom Referer String/是 自定义Referer值</option>
                </select>
              </div>
              <div class="col-md-1"></div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4"></div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div id="display_referer_data_form" align="central" style="display: none">
                  <br />
                  <label for="referer_str">Custom Referer String to Use/自定义Referer值:</label>
                  <input type="text" class="form-control" id="referer_str" name="referer" placeholder="i.e. http://www.google.com?q=nothing%20see%20here">
                  <br />
                </div>
              </div>
              <div class="col-md-1"></div>
            </div><br /><br />


            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <div id="display_auth_data_form" align="central" style="display: none">
                  <label for="auth_username">HTTP Auth Username/HTTP 验证用户名:</label>
                  <input type="text" class="form-control" id="auth_username" name="auth_username" placeholder="i.e. admin"><br />
                  <label for="auth_password">HTTP Auth Password/HTTP 验证密码:</label>
                  <input type="text" class="form-control" id="auth_password" name="auth_password" placeholder="i.e. password">
                </div>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_header_support">Additional HTTP Header String to Use/是否HTTP Header 额外值:</label>
                <select class="form-control" id="select_header_support" name="header_support">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_header_data_form', 1)">Disabled/否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_header_data_form', 0)">Enable Custom Header String/是 自定义头值</option>
                </select>
              </div>
              <div class="col-md-1"></div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4"></div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div id="display_header_data_form" align="central" style="display: none">
                  <br />
                  <label for="cookie_str">Custom Header String to Use/自定义Header:</label>
                  <input type="text" class="form-control" id="header_str" name="headers" placeholder="i.e. Accept-Language: fr\r\nETag: 123">
                </div>
              </div>
              <div class="col-md-1"></div>
            </div><br />

