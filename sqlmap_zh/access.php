
            <br />
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <label for="select_file_privs">文件系统选择：</label>
                <select class="form-control" id="file_privs" name="file_privs">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_file_read_data_form', 1); divHideAndSeek('display_file_write_data_form', 1);">无</option>
                  <option value="r" onClick="divHideAndSeek('display_file_read_data_form', 0); divHideAndSeek('display_file_write_data_form', 1);">读取数据库服务器文件</option>
                  <option value="w" onClick="divHideAndSeek('display_file_write_data_form', 0); divHideAndSeek('display_file_read_data_form', 1);">向目标数据库服务器上传文件</option>
                </select>
                <div id="display_file_read_data_form" align="central" style="display: none">
                  <br />
                  <label for="file_read">要读取的文件名：</label>
                  <input type="text" class="form-control" id="file_read" name="rFile" placeholder="i.e. /etc/passwd or c:/windows/win.ini ">
                  <br />
                </div>
                <div id="display_file_write_data_form" align="central" style="display: none">
                  <br />
                  <label for="file_write">要写入的文件名：</label>
                  <select class="form-control" id="file_write" name="file_write">
                    <option value="cmdShell" selected="selected" onClick="divHideAndSeek('display_file_write_revShell_data_form', 1);">Basic Web Based Command Shell/网页版命令行Shell</option>
                    <option value="uploader" onClick="divHideAndSeek('display_file_write_revShell_data_form', 1);">普通文件上传</option>
                    <option value="revShell" onClick="divHideAndSeek('display_file_write_revShell_data_form', 0);" disabled>反弹Shell脚本</option>
                  </select>
                  <br />
                  <div id="display_file_write_cmdShell_data_form" align="central" style="display: block">
                    <label for="dFile">要写入文件的绝对路径：</label>
                    <input type="text" class="form-control" id="dFile" name="dFile" placeholder="i.e. /var/www/writeable/customFile.fileType ">
                    <br />
                    <label for="cmdShellLang">选择后门文件的语言：</label>
                    <select class="form-control" id="cmdShellLang" name="cmdShellLang">
                      <option value="1">ASP</option>
                      <option value="2">ASPX</option>
                      <option value="3">JSP</option>
                      <option value="4" selected="selected">PHP</option>
                    </select>
                    <br />
                    <div id="display_file_write_revShell_data_form" align="central" style="display: none">
                      <label for="revShell_ip">反弹IP设置：</label>
                      <input type="text" class="form-control" id="revShell_ip" name="revShell_ip" placeholder="i.e. 10.10.10.10 ">
                      <br />
                      <label for="revShell_port">反弹端口设置：</label>
                      <input type="text" class="form-control" id="revShell_port" name="revShell_port" placeholder="i.e. 31337 ">
                    </div>
                  </div>
                </div><br />

                <label for="select_os_privs">选择操作系统：</label>
                <select class="form-control" id="os_privs" name="os_privs">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_os_cmd_data_form', 1); divHideAndSeek('display_osPwn_revShell_data_form', 1)">无</option>
                  <option value="r" onClick="divHideAndSeek('display_os_cmd_data_form', 0); divHideAndSeek('display_osPwn_revShell_data_form', 1)">OS Cmd - Run OS Command on Target</option>
                  <option value="p" onClick="divHideAndSeek('display_osPwn_revShell_data_form', 1); divHideAndSeek('display_osPwn_revShell_data_form', 0)" disabled>OS Pwn - Spawn Meterpreter Reverse Shell</option>


                </select>
                <div id="display_os_cmd_data_form" align="central" style="display: none">
                  <br />
                  <label for="os_cmd">OS Command to Run:</label>
                  <input type="text" class="form-control" id="os_cmd" name="osCmd" placeholder="i.e. whoami ">
                  <br />
                  <label for="cmdShellLang">（可选）选择后门文件语言:</label>
                  <select class="form-control" id="cmdShellLang" name="cmdShellLang">
                    <option value="1">ASP</option>
                    <option value="2">ASPX</option>
                    <option value="3">JSP</option>
                    <option value="4" selected="selected">PHP</option>
                  </select>
                  <br />
                  <label for="os_cmd_dFile">(Optional) Writeable File Path to Try on Target/（可选）选择目标主机可写文件路径:</label>
                  <input type="text" class="form-control" id="os_cmd_dFile" name="os_cmd_dFile" placeholder="i.e. /var/www/html/writeable/ ">
                  <br />
                </div><br />
                <div id="display_osPwn_revShell_data_form" align="central" style="display: none">
                  <label for="meterpreter_type">Meterpreter Reverse Payload Type to Use/Meterpreter可用反弹脚本:</label>
                  <select class="form-control" id="meterpreter_type" name="meterpreter_type">
                    <option value="1" selected="selected">TCP - meterpreter/reverse_tcp</option>
             <!--   <option value="2">TCP Any Port</option> -->
                    <option value="3">HTTP - meterpreter/reverse_http</option>
                    <option value="4">HTTPS - meterpreter/reverse_https</option>
                  </select>
                  <br />
                  <label for="osPwn_tmpPath">(Optional) Temp Path on Target/（可选）目标主机临时路径</label>
                  <input type="text" class="form-control" id="osPwn_tmpPath" name="osPwn_tmpPath" placeholder="i.e. C:\\CUSTOM\\TEMP\\ ">
                  <br />
                  <label for="revShell_ip">Meterpreter Listener IP/Meterpreter 监听者IP:</label>
                  <input type="text" class="form-control" id="osPwn_ip" name="osPwn_ip" placeholder="i.e. 10.10.10.10 ">
                  <br />
                  <label for="revShell_port">Meterpreter Listener Port/Meterpreter 监听者端口:</label>
                  <input type="text" class="form-control" id="osPwn_port" name="osPwn_port" placeholder="i.e. 4444 ">
                  <br /><br />
                </div>
                <label for="select_win_reg">Windows Registry Options/Windows注册表可选项:</label>
                <select class="form-control" id="win_reg" name="win_reg">
                  <option value="" selected="selected" onClick="divHideAndSeek('display_win_reg_data_form', 1)">无</option>
                  <option value="r" onClick="divHideAndSeek('display_win_reg_data_form', 0)">Read Windows Registry Key Value/读取注册表键值对</option>
                  <option value="a" onClick="divHideAndSeek('display_win_reg_data_form', 0)">Add Windows Registry Key Value Data/添加注册表数据</option>
                  <option value="d" onClick="divHideAndSeek('display_win_reg_data_form', 0)">Delete Windows Registry Key Value/删除数据表键值对</option>
                </select><br />
                <br />
               </div>
              <div class="col-md-3"></div>
            </div>

            <div class="row">
              <div id="display_win_reg_data_form" align="central" style="display: none">
                <br />
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <label for="win_reg_key">Windows Registry Key/Windows注册表键:</label>
                  <input type="text" class="form-control" id="win_reg_key" name="regKey" placeholder="i.e. HKEY_LOCAL_MACHINE\SOFTWARE\sqlmap ">
                  <br />
                  <label for="win_reg_value">Windows Registry Value/Windows注册表值:</label>
                  <input type="text" class="form-control" id="win_reg_value" name="regVal" placeholder="i.e. Test ">
                  <br />
                </div>
                <div class="col-md-4">
                  <label for="win_reg_type">Windows Registry Type/Windows注册表类型:</label>
                  <input type="text" class="form-control" id="win_reg_type" name="regType" placeholder="i.e. REG_SZ ">
                  <br />
                  <label for="win_reg_data">Windows Registry Data/Windows注册表数据:</label>
                  <input type="text" class="form-control" id="win_reg_data" name="regData" placeholder="i.e. 1 ">
                  <br />
                </div>
                <div class="col-md-2"></div>
              </div>
            </div>

