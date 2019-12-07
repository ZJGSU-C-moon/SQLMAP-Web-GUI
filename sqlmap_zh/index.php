<?php

  /*
     SQLMAP - REST Client & Web Operator
       Coded by: Hood3dRob1n

     Beta: http://uppit.com/ol1jc0jdrzpf/sqlmap_web_edition.zip

  */

  @session_start();                           // Start a new Session, if not already created (tracking later?)
  @set_time_limit(0);                         // May run long at times, remove time limits on script execution time
  $sess = session_id();                       // Current Session ID, use tbd...
  $salt = "!SQL!";                            // Salt for form token hash generation
  $token = sha1(mt_rand(1, 1000000) . $salt); // Generate CSRF Token Hash
  $_SESSION['token'] = $token;                // Set CSRF Token for Form Submit Verification

  include_once("header.php");                 // Bring in our Page Header Content
  ?>


    <div class="container">

      <div class="jumbotron" id="jumbotron">
        <p style="font-size=18px; font-weight: bold;">
          欢迎来到SQLMAP页面版！
        </p>
        <p style="font-size=12px;">
          使用下方选项卡对扫描选项进行设置，<br />
          并点击底部按钮开始扫描！<br />
        </p>
      </div>

      <form class="form-horizontal" role="form" id="myForm" action="./scans.php" method="POST" target="_blank">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <div class="settings" id="settings">
          <div class="nav_wrap" id="nav_wrap">
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#" onClick="tabFlipper(1);" style="font-size=14px; font-weight: bold;">基础设置</a></li>
              <li><a href="#" onClick="tabFlipper(3);" style="font-size=14px; font-weight: bold;">请求参数</a></li>
              <li><a href="#" onClick="tabFlipper(2);" style="font-size=14px; font-weight: bold;">注入方式</a></li>
              <li><a href="#" onClick="tabFlipper(6);" style="font-size=14px; font-weight: bold;">探测方式</a></li>
              <li><a href="#" onClick="tabFlipper(4);" style="font-size=14px; font-weight: bold;">爆破选项</a></li>
              <li><a href="#" onClick="tabFlipper(5);" style="font-size=14px; font-weight: bold;">渗透选项</a></li>
            </ul>
          </div>
          <br />

          <div class="settings_basics_container" id="settings_basics_container">
            <?php include("basics.php"); ?>
          </div>

          <div class="settings_request_container" id="settings_request_container">
            <?php include("request.php"); ?>
          </div>

          <div class="settings_idt_container" id="settings_idt_container">
            <?php include("idt.php"); ?>
          </div>

          <div class="settings_idt2_container" id="settings_idt2_container">
            <?php include("idt2.php"); ?>
          </div>

          <div class="settings_enum_container" id="settings_enum_container">
            <?php include("enum.php"); ?>
          </div>

          <div class="settings_access_container" id="settings_access_container">
            <?php include("access.php"); ?>
          </div>
        </div>

        <br /><br />
        <div class="col-md-4">
          <input type="submit" class="btn" name="submit" value="Simple Scan Mode"/>
        </div>
        <div class="col-md-4">
          <input type="submit" class="btn" name="submit" value="Deep Scan Mode"/>
        </div>
        <div class="col-md-4">
          <input type="submit" class="btn" name="submit" value="Start Scan"/>
        </div>
        <br /><br />
        <style>
          .lan{ float:right; width:200px;}
        </style>
        <div class="lan">
          <a href="../sqlmap_en/">EN</a> | <a href="../sqlmap_zh/">ZH</a>
        </div>
      </form>
    </div>


  <?php
  include_once("footer.php");                  // Bring in our Page Footer Content


  /*
    End of File
  */
?>

