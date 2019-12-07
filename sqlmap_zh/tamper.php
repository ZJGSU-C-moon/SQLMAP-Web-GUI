<?php
  $title_value['apostrophemask.py'] = "适用数据库：ALL\r\n作用：将引号替换为utf-8，用于过滤单引号\r\n使用脚本前：tamper(1 AND '1'='1)\r\n使用脚本后：1 AND %EF%BC%871%EF%BC%87=%EF%BC%871";
  $title_value['base64encode.py'] = "适用数据库：ALL\r\n作用：替换为base64编码\r\n使用脚本前：tamper(1' AND SLEEP(5)#)\r\n使用脚本后：MScgQU5EIFNMRUVQKDUpIw==";
  $title_value['multiplespaces.py'] = "适用数据库：ALL\r\n作用：围绕sql关键字添加多个空格\r\n使用脚本前：tamper('1 UNION SELECT foobar')\r\n使用脚本后：1 UNION SELECT foobar";
  $title_value['space2plus.py'] = "适用数据库：ALL\r\n作用：用加号替换空格\r\n使用脚本前：tamper('SELECT id FROM users')\r\n使用脚本后：SELECT+id+FROM+users";
  $title_value['nonrecursivereplacement.py'] = "适用数据库：ALL\r\n作用：作为双重查询语句，用双重语句替代预定义的sql关键字（适用于非常弱的自定义过滤器，例如将select替换为空）\r\n使用脚本前：tamper('1 UNION SELECT 2--')\r\n使用脚本后：1 UNIOUNIONN SELESELECTCT 2--";
  $title_value['space2randomblank.py'] = "适用数据库：ALL\r\n作用：将空格替换为其他有效字符\r\n使用脚本前：tamper('SELECT id FROM users')\r\n使用脚本后：SELECT%0Did%0DFROM%0Ausers";
  $title_value['unionalltounion.py'] = "适用数据库：ALL\r\n作用：将union allselect 替换为unionselect\r\n使用脚本前：tamper('-1 UNION ALL SELECT')\r\n使用脚本后：-1 UNION SELECT";
  $title_value['securesphere.py'] = "适用数据库：ALL\r\n作用：追加特定的字符串\r\n使用脚本前：tamper('1 AND 1=1')\r\n使用脚本后：1 AND 1=1 and '0having'='0having'";
  $title_value['space2dash.py'] = "适用数据库：ALL\r\n作用：将空格替换为--，并添加一个随机字符串和换行符\r\n使用脚本前：tamper('1 AND 9227=9227')\r\n使用脚本后：1--nVNaVoPYeva%0AAND--ngNvzqu%0A9227=9227";
  $title_value['space2mssqlblank.py'] = "适用数据库：Microsoft SQL Server\r\n测试通过数据库：Microsoft SQL Server 2000、Microsoft SQL Server 2005\r\n作用：将空格随机替换为其他空格符号('%01', '%02', '%03', '%04', '%05', '%06', '%07', '%08', '%09', '%0B', '%0C', '%0D', '%0E', '%0F', '%0A')\r\n使用脚本前：tamper('SELECT id FROM users')\r\n使用脚本后：SELECT%0Eid%0DFROM%07users";
  $title_value['between.py'] = "测试通过数据库：Microsoft SQL Server 2005、MySQL 4, 5.0 and 5.5、Oracle 10g、PostgreSQL 8.3, 8.4, 9.0\r\n作用：用NOT BETWEEN 0 AND #替换>\r\n使用脚本前：tamper('1 AND A > B--')\r\n使用脚本后：1 AND A NOT BETWEEN 0 AND B--";
  $title_value['percentage.py'] = "适用数据库：ASP\r\n测试通过数据库：Microsoft SQL Server 2000, 2005、MySQL 5.1.56, 5.5.11、PostgreSQL 9.0\r\n作用：在每个字符前添加一个%\r\n使用脚本前：tamper('SELECT FIELD FROM TABLE')\r\n使用脚本后：%S%E%L%E%C%T %F%I%E%L%D %F%R%O%M %T%A%B%L%E";
  $title_value['sp_password.py'] = "适用数据库：MSSQL\r\n作用：从T-SQL日志的自动迷糊处理的有效载荷中追加sp_password\r\n使用脚本前：tamper('1 AND 9227=9227-- ')\r\n使用脚本后：1 AND 9227=9227-- sp_password";
  $title_value['charencode.py'] = "测试通过数据库：Microsoft SQL Server 2005、MySQL 4, 5.0 and 5.5、Oracle 10g、PostgreSQL 8.3, 8.4, 9.0\r\n作用：对给定的payload全部字符使用url编码（不处理已经编码的字符）\r\n使用脚本前：tamper('SELECT FIELD FROM%20TABLE')\r\n使用脚本后：%53%45%4C%45%43%54%20%46%49%45%4C%44%20%46%52%4F%4D%20%54%41%42%4C%45";
  $title_value['randomcase.py'] = "测试通过数据库：Microsoft SQL Server 2005、MySQL 4, 5.0 and 5.5、Oracle 10g、PostgreSQL 8.3, 8.4, 9.0\r\n作用：随机大小写\r\n使用脚本前：tamper('INSERT')\r\n使用脚本后：INseRt";
  $title_value['charunicodeencode.py'] = "适用数据库：ASP、ASP.NET\r\n测试通过数据库：Microsoft SQL Server 2000/2005、MySQL 5.1.56、PostgreSQL 9.0.3\r\n作用：适用字符串的unicode编码\r\n使用脚本前：tamper('SELECT FIELD%20FROM TABLE')\r\n使用脚本后：%u0053%u0045%u004C%u0045%u0043%u0054%u0020%u0046%u0049%u0045%u004C%u0044%u0020%u0046%u0052%u004F%u004D%u0020%u0054%u0041%u0042%u004C%u0045";
  $title_value['space2comment.py'] = "测试通过数据库：Microsoft SQL Server 2005、MySQL 4, 5.0 and 5.5、Oracle 10g、PostgreSQL 8.3, 8.4, 9.0\r\n作用：将空格替换为/**/\r\n使用脚本前：tamper('SELECT id FROM users')\r\n使用脚本后：SELECT/**/id/**/FROM/**/users";
  $title_value['equaltolike.py'] = "测试通过数据库：Microsoft SQL Server 2005、MySQL 4, 5.0 and 5.5\r\n作用：将=替换为LIKE\r\n使用脚本前：tamper('SELECT * FROM users WHERE id=1')\r\n使用脚本后：SELECT * FROM users WHERE id LIKE 1";
  $title_value['equaltolike.py'] = "测试通过数据库：MySQL 4, 5.0 and 5.5、Oracle 10g、PostgreSQL 8.3, 8.4, 9.0\r\n作用：将>替换为GREATEST，绕过对>的过滤\r\n使用脚本前：tamper('1 AND A > B')\r\n使用脚本后：1 AND GREATEST(A,B+1)=A";
  $title_value['ifnull2ifisnull.py'] = "适用数据库：MySQL、SQLite (possibly)、SAP MaxDB (possibly)\r\n测试通过数据库：MySQL 5.0 and 5.5\r\n作用：将类似于IFNULL(A, B)替换为IF(ISNULL(A), B, A)，绕过对IFNULL的过滤\r\n使用脚本前：tamper('IFNULL(1, 2)')\r\n使用脚本后：IF(ISNULL(1),2,1)";
  $title_value['modsecurityversioned.py'] = "适用数据库：MySQL\r\n测试通过数据库：MySQL 5.0\r\n作用：过滤空格，使用mysql内联注释的方式进行注入\r\n使用脚本前：tamper('1 AND 2>1--')\r\n使用脚本后：1 /*!30874AND 2>1*/--";
  $title_value['space2mysqlblank.py'] = "适用数据库：MySQL\r\n测试通过数据库：MySQL 5.1\r\n作用：将空格替换为其他空格符号('%09', '%0A', '%0C', '%0D', '%0B')\r\n使用脚本前：tamper('SELECT id FROM users')\r\n使用脚本后：SELECT%0Bid%0DFROM%0Cusers";
  $title_value['modsecurityzeroversioned.py'] = "适用数据库：MySQL\r\n测试通过数据库：MySQL 5.0\r\n作用：使用内联注释方式（/*!00000*/）进行注入\r\n使用脚本前：tamper('1 AND 2>1--')\r\n使用脚本后：1 /*!00000AND 2>1*/--";
  $title_value['space2mysqldash.py'] = "适用数据库：MySQL、MSSQL\r\n作用：将空格替换为 -- ，并追随一个换行符\r\n使用脚本前：tamper('1 AND 9227=9227')\r\n使用脚本后：1--%0AAND--%0A9227=9227";
  $title_value['bluecoat.py'] = "适用数据库：Blue Coat SGOS\r\n测试通过数据库：MySQL 5.1,、SGOS\r\n作用：在sql语句之后用有效的随机空白字符替换空格符，随后用LIKE替换=\r\n使用脚本前：tamper('SELECT id FROM users where id = 1')\r\n使用脚本后：SELECT%09id FROM users where id LIKE 1";
  $title_value['versionedkeywords.py'] = "适用数据库：MySQL\r\n测试通过数据库：MySQL 4.0.18, 5.1.56, 5.5.11\r\n作用：注释绕过\r\n使用脚本前：tamper('1 UNION ALL SELECT NULL, NULL, CONCAT(CHAR(58,104,116,116,58),IFNULL(CAST(CURRENT_USER() AS CHAR),CHAR(32)),CHAR(58,100,114,117,58))#')\r\n使用脚本后：1/*!UNION*//*!ALL*//*!SELECT*//*!NULL*/,/*!NULL*/, CONCAT(CHAR(58,104,116,116,58),IFNULL(CAST(CURRENT_USER()/*!AS*//*!CHAR*/),CHAR(32)),CHAR(58,100,114,117,58))#";
  $title_value['halfversionedmorekeywords.py'] = "适用数据库：MySQL < 5.1\r\n测试通过数据库：MySQL 4.0.18/5.0.22\r\n作用：在每个关键字前添加mysql版本注释\r\n使用脚本前：tamper(value' UNION ALL SELECT CONCAT(CHAR(58,107,112,113,58),IFNULL(CAST(CURRENT_USER() AS CHAR),CHAR(32)),CHAR(58,97,110,121,58)), NULL, NULL# AND 'QDWa'='QDWa)\r\n使用脚本后：value'/*!0UNION/*!0ALL/*!0SELECT/*!0CONCAT(/*!0CHAR(58,107,112,113,58),/*!0IFNULL(CAST(/*!0CURRENT_USER()/*!0AS/*!0CHAR),/*!0CHAR(32)),/*!0CHAR(58,97,110,121,58)),/*!0NULL,/*!0NULL#/*!0AND 'QDWa'='QDWa";
  $title_value['space2morehash.py'] = "适用数据库：MySQL >= 5.1.13\r\n测试通过数据库：MySQL 5.1.41\r\n作用：将空格替换为#，并添加一个随机字符串和换行符\r\n使用脚本前：tamper('1 AND 9227=9227')\r\n使用脚本后：1%23ngNvzqu%0AAND%23nVNaVoPYeva%0A%23lujYFWfv%0A9227=9227";
  $title_value['apostrophenullencode.py'] = "适用数据库：ALL\r\n作用：用非法双字节Unicode字符替换单引号\r\n使用脚本前：tamper(1 AND '1'='1)\r\n使用脚本后：1 AND %00%271%00%27=%00%271";
  $title_value['appendnullbyte.py'] = "适用数据库：ALL\r\n作用：在有效载荷的结束位置加载null字节字符编码\r\n使用脚本前：tamper('1 AND 1=1')\r\n使用脚本后：1 AND 1=1%00";
  $title_value['chardoubleencode.py'] = "适用数据库：ALL\r\n作用：对给定的payload全部字符使用双重url编码（不处理已经编码的字符）\r\n使用脚本前：tamper('SELECT FIELD FROM%20TABLE')\r\n使用脚本后：%2553%2545%254C%2545%2543%2554%2520%2546%2549%2545%254C%2544%2520%2546%2552%254F%254D%2520%2554%2541%2542%254C%2545";
  $title_value['unmagicquotes.py'] = "适用数据库：ALL\r\n作用：用一个多字节组合%bf%27和末尾通用注释一起替换空格\r\n使用脚本前：tamper(1' AND 1=1)\r\n使用脚本后：1%bf%27 AND 1=1--";
  $title_value['randomcomments.py'] = "适用数据库：ALL\r\n作用：用注释符分割sql关键字\r\n使用脚本前：tamper('INSERT')\r\n使用脚本后：I/**/N/**/SERT";
?>