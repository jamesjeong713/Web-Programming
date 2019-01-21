<!DOCTYPE html>
<html lang="ko"">
<head>
   <title>WebSite Source Viewer</title>
   <meta charset="EUC-KR">
</head>
<body style="font-size:9pt;">
   <h1>WebSite Source Viewer</h1>
   <form method="POST" action="viewer.php" target="viewer_iframe">
        <table>
        <tr>
            <td width= 100>URI</td>
            <td>
                <input type="text" name="uri"><br />
                예> http://www.naver.com<br />
                예> https://www.naver.com
            </td>
        </tr>
        <tr>
            <td width= 100>REFERER</td>
            <td>
                <input type="text" name="referer"><br />
                예> http://www.naver.com<br />
                예> https://www.naver.com
            </td>
        </tr>
        <tr>
            <td width= 100>ENCODING</td>
            <td>
                <select name="encoding">
                    <option value="EUC-KR" selected>EUC-KR</option>
                    <option value="UTF-8">UTF-8</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>METHOD</td>
            <td>
                <select name="method">
                    <option value="GET" selected>GET</option>
                    <option value="POST">POST</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>POSTDATA</td>
            <td>
                <table>
                <tr>
                    <td>변수명</td>
                    <td>변수값</td>
                </tr>
                <? for ($i = 0; $i < 10; $i++) { ?>
                <tr>
                    <td><input type="text" name="name[<?=$i?>]"></td>
                    <td><input type="text" name="value[<?=$i?>]"></td>
                </tr>
                <? } ?>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height=50 align=center><input type="submit" value="소스보기"></td>
        </tr>
        </table>
   </form>
   <iframe id="viewer_iframe" name="viewer_iframe" src="blank.html" width="620" height="450"></iframe>
</body>
</html>