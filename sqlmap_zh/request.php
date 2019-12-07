
            <br />
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_request_delay">HTTP请求的时间间隔：</label>
                <select class="form-control" id="select_request_delay" name="delay">
                  <option value="0" selected="selected">没有延迟</option>
                  <option value="1">1秒</option>
                  <option value="5">5秒</option>
                  <option value="8">8秒</option>
                  <option value="10">10秒</option>
                  <option value="12">12秒</option>
                  <option value="15">15秒</option>
                  <option value="20">20秒</option>
                  <option value="25">25秒</option>
                  <option value="30">30秒</option>
                </select>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_user_agent_type">设置User-Agent：</label>
                <select class="form-control" id="select_user_agent_type" name="user_agent_type">
                  <option value="sqlmap" onClick="divHideAndSeek('display_user_agent_data_form', 1)">SQLMAP默认User-Agent</option>
                  <option value="mobile" onClick="divHideAndSeek('display_user_agent_data_form', 1)">使用随机移动设备User-Agent</option>
                  <option value="random" selected="selected" onClick="divHideAndSeek('display_user_agent_data_form', 1)">使用随机User-Agent</option>
                  <option value="custom" onClick="divHideAndSeek('display_user_agent_data_form', 0)">自定义User-Agent</option>
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
                  <label for="user_agent">自定义User-Agent：</label>
                  <input type="text" class="form-control" id="user_agent" name="user_agent" placeholder="i.e. sqlmap/1.0-dev-xxxxxxx (http://sqlmap.org)">
                  <br />
                </div>
              <div class="col-md-1"></div>
              </div>
            </div><br /><br />


            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_request_timeout">HTTP请求最长等待时间：</label>
                <select class="form-control" id="select_request_timeout" name="timeout">
                  <option value="15">15秒</option>
                  <option value="30" selected="selected">30秒</option>
                  <option value="60">60秒</option>
                  <option value="90">90秒</option>
                  <option value="120">120秒</option>
                </select>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_host_support">是否使用HTTP Host Header：</label>
                <select class="form-control" id="select_host_support" name="host_support">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_host_data_form', 1)">否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_host_data_form', 0)">是</option>
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
                  <label for="host_str">是否使用自定义Host Header：</label>
                  <input type="text" class="form-control" id="host_str" name="host" placeholder="i.e. custom.vhost.com">
                  <br />
                </div>
              </div>
              <div class="col-md-1"></div>
            </div><br /><br />


            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_request_retries">HTTP请求失败后最多尝试次数：</label>
                <select class="form-control" id="select_request_retries" name="retries">
                  <option value="1">1次</option>
                  <option value="3" selected="selected">3次</option>
                  <option value="5">5次</option>
                  <option value="8">8次</option>
                  <option value="10">10次</option>
                </select>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_cookie_support">是否使用Cookie：</label>
                <select class="form-control" id="select_cookie_support" name="cookie_support">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_cookie_data_form', 1)">否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_cookie_data_form', 0)">启用自定义Cookie值</option>
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
                  <label for="cookie_str">自定义Cookie：</label>
                  <input type="text" class="form-control" id="cookie_str" name="cookie" placeholder="i.e. authenticated=true;">
                  <br />
                </div>
              </div>
              <div class="col-md-1"></div>
            </div><br /><br />


            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="select_auth_type">是否进行HTTP验证：</label>
                <select class="form-control" id="select_auth_type" name="auth_type">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_auth_data_form', 1)">否</option>
                  <option value="Basic" onClick="divHideAndSeek('display_auth_data_form', 0)">基础验证</option>
                  <option value="Digest" onClick="divHideAndSeek('display_auth_data_form', 0)">Digest/</option>
                  <option value="NTLM" onClick="divHideAndSeek('display_auth_data_form', 0)">NTLM/身份验证</option>
                </select>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_referer_support">是否使用HTTP Referer：</label>
                <select class="form-control" id="select_referer_support" name="referer_support">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_referer_data_form', 1)">否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_referer_data_form', 0)">启用自定义Referer值</option>
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
                  <label for="referer_str">自定义Referer值：</label>
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
                  <label for="auth_username">用户名：</label>
                  <input type="text" class="form-control" id="auth_username" name="auth_username" placeholder="i.e. admin"><br />
                  <label for="auth_password">密码：</label>
                  <input type="text" class="form-control" id="auth_password" name="auth_password" placeholder="i.e. password">
                </div>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <label for="select_header_support">是否添加其他HTTP Header参数：</label>
                <select class="form-control" id="select_header_support" name="header_support">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_header_data_form', 1)">否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_header_data_form', 0)">启用自定义HTTP Header</option>
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
                  <label for="cookie_str">自定义Header：</label>
                  <input type="text" class="form-control" id="header_str" name="headers" placeholder="i.e. Accept-Language: fr\r\nETag: 123">
                </div>
              </div>
              <div class="col-md-1"></div>
            </div><br />

