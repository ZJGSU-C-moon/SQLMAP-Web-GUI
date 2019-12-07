
            <br />
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <label for="select_comaprison_text_only">是否比较纯文本页面：</label>
                <select class="form-control" id="select_comaprison_text_only" name="textOnly">
                  <option value="" selected="selected">是</option>
                  <option value="enabled">否</option>
                </select><br />

                <label for="select_comaprison_title_only">是否仅比较标题：</label>
                <select class="form-control" id="select_comaprison_title_only" name="titles">
                  <option value="" selected="selected">否</option>
                  <option value="enabled">是</option>
                </select><br />

                <label for="select_comaprison_code">是否匹配HTTP状态码：</label>
                <select class="form-control" id="select_comaprison_code" name="comaprison_code">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_comaprison_code_data_form', 1)">否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_comaprison_code_data_form', 0)">是</option>
                </select>
                <div id="display_comaprison_code_data_form" align="central" style="display: none">
                  <br />
                  <label for="request_comaprison_code">设置进行匹配的HTTP状态代码：</label>
                  <select class="form-control" id="request_comaprison_code" name="request_comaprison_code">
                    <option value="100"> 100 </option>
                    <option value="101"> 101 </option>
                    <option value="200" selected="selected"> 200 </option>
                    <option value="201"> 201 </option>
                    <option value="202"> 202 </option>
                    <option value="203"> 203 </option>
                    <option value="204"> 204 </option>
                    <option value="205"> 205 </option>
                    <option value="206"> 206 </option>
                    <option value="300"> 300 </option>
                    <option value="301"> 301 </option>
                    <option value="302"> 302 </option>
                    <option value="303"> 303 </option>
                    <option value="304"> 304 </option>
                    <option value="305"> 305 </option>
                    <option value="306"> 306 </option>
                    <option value="307"> 307 </option>
                    <option value="400"> 400 </option>
                    <option value="401"> 401 </option>
                    <option value="402"> 402 </option>
                    <option value="403"> 403 </option>
                    <option value="404"> 404 </option>
                    <option value="405"> 405 </option>
                    <option value="406"> 406 </option>
                    <option value="407"> 407 </option>
                    <option value="408"> 408 </option>
                    <option value="409"> 409 </option>
                    <option value="410"> 410 </option>
                    <option value="411"> 411 </option>
                    <option value="412"> 412 </option>
                    <option value="413"> 413 </option>
                    <option value="414"> 414 </option>
                    <option value="415"> 415 </option>
                    <option value="416"> 416 </option>
                    <option value="417"> 417 </option>
                    <option value="500"> 500 </option>
                    <option value="501"> 501 </option>
                    <option value="502"> 502 </option>
                    <option value="503"> 503 </option>
                    <option value="504"> 504 </option>
                    <option value="505"> 505 </option>
                  </select>
                  <br />
                </div><br />
              </div>
              <div class="col-md-2"></div>
              <div class="col-md-5">
                <label for="select_comaprison_str">是否自定义设置正确情况下字符串：</label>
                <select class="form-control" id="select_comaprison_str" name="comaprison_str">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_comaprison_str_data_form', 1)">是</option>
                  <option value="enabled" onClick="divHideAndSeek('display_comaprison_str_data_form', 0)">否</option>
                </select>
                <div id="display_comaprison_str_data_form" align="central" style="display: none">
                  <br />
                  <label for="request_comaprison_str">设置正确时进行匹配的字符串：</label>
                  <input type="text" class="form-control" id="request_comaprison_str" name="request_comaprison_str" placeholder="i.e. string present on original and True pages, but NOT on False ">
                </div><br />

                <label for="select_comaprison_not_str">是否自定义设置错误情况下字符串：</label>
                <select class="form-control" id="select_comaprison_not_str" name="comaprison_not_str">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_comaprison_not_str_data_form', 1)">否</option>
                  <option value="enabled" onClick="divHideAndSeek('display_comaprison_not_str_data_form', 0)">是</option>
                </select>
                <div id="display_comaprison_not_str_data_form" align="central" style="display: none">
                  <br />
                  <label for="request_comaprison_not_str">设置错误时进行匹配的字符串：</label>
                  <input type="text" class="form-control" id="request_comaprison_not_str" name="request_comaprison_not_str" placeholder="i.e. string NOT present on original or True pages, but is on False ">
                </div><br />

                <label for="select_comaprison_regex">是否自定义正确情况下字符串的正则表达式：</label>
                <select class="form-control" id="select_comaprison_regex" name="comaprison_regex">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_comaprison_regex_data_form', 1)">是</option>
                  <option value="enabled" onClick="divHideAndSeek('display_comaprison_regex_data_form', 0)">否</option>
                </select>
                <div id="display_comaprison_regex_data_form" align="central" style="display: none">
                  <br />
                  <label for="request_comaprison_regex_str">设置正确时进行匹配的字符串的正则表达式：</label>
                  <input type="text" class="form-control" id="request_comaprison_regex_str" name="request_comaprison_regex_str" placeholder="i.e. pattern to match on original and true pages, not on false ">
                </div><br />


              </div>
              <div class="col-md-1"></div>
            </div>

