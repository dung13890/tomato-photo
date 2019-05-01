<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
    <meta http-equiv="Content-Language" content="ja">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <meta http-equiv="Content-Style-Type" content="text/css">
    <style>
        .body-template {
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .table-body {
            border-spacing: 0;
            background: #ffffff;
            border: 1px solid #e5e5e5;
            background: #ffffff;
        }
        .table-td {
            font-family: sans-serif;
            font-size: 13px;
            line-height: 25px;
            color: #666666;
            border-collapse: collapse;
            padding: 30px;
        }
        .font-color {
            color: #888888;
        }
        .tr-height {
            height: 32px;
        }
    </style>
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" bgcolor="#f4f4f4">
    <tbody>
    <tr class="tr-height"></tr>
    <tr>
        <td>
            <table border="0" width="650" cellpadding="0" cellspacing="0" align="center" class="table-body">
                <tbody>
                <tr>
                    <td>
                        <span class="HOEnZb">
                            <font class="font-color"></font>
                        </span>
                        <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                            <tr>
                                <td class="table-td">
                                    @yield('main')
                                    <span class="HOEnZb"><font class="font-color"></font></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <span class="HOEnZb"><font class="font-color""></font></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="tr-height"></tr>
    </tbody>
</table>
</body>
</html>
