<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>header</title>
    <style>
        #footer {
        position: relative;
        margin-top: 40px;
        color: #fff;
        }
        #footer a {
        text-decoration: none;
        color: #fff;
        }
        #footer a:hover {
        text-decoration: underline;
        }
        #footer .primary {
        padding: 40px 20px;
        background: #333;
        }
        #footer .secondary {
        display: flex;
        padding: 40px 20px;
        background: #222;
        }

        @media screen and (max-width: 767px) {
        #footer .primary {
            padding: 20px 20px;
            background: #333;
        }
        #footer .secondary {
            display: block;
            padding: 20px 20px;
        }
        }

        /* footer-logo */

        #footer .logo {
        position: relative;
        padding: 0;
        margin: 0;
        width: 100%;
        font-size: 26px;
        font-weight: bold;
        }
        @media screen and (max-width: 767px) {
        #footer .logo {
            font-size: 16px;
        }
        }

        /* address */

        .address {
        margin: 10px 0 0;
        padding: 0;
        }

        @media screen and (max-width: 767px) {
        .address {
            font-size: 12px;
        }
        }

        /* navi */

        .navi-row {
        display: flex;
        margin-top: 40px;
        }
        #footer .navi {
        margin: 0;
        padding: 0;
        list-style: none;
        }
        #footer .navi li {
        display: inline-block;
        margin: 0 20px 0 0;
        padding: 0;
        }
        #footer .navi li:first-child {
        margin-left: 0;
        }

        @media screen and (max-width: 767px) {
        .navi-row {
            display: block;
            margin-top: 15px;
        }
        #footer .navi {
            font-size: 12px;
        }
        #footer .navi li {
            margin-top: 5px;
            font-size: 12px;
        }
        }

        /* sns-navi */

        #footer .sns-navi {
        margin: 0 0 0 auto;
        padding: 0;
        }
        #footer .sns-navi li {
        display: inline-block;
        margin: 0 20px 0 0;
        padding: 0;
        font-size: 20px;
        }
        #footer .sns-navi li:last-child {
        margin-right: 0;
        }

        @media screen and (max-width: 767px) {
        #footer .sns-navi {
            margin: 20px 0 0;
            padding: 0;
        }
        #footer .sns-navi li {
            margin: 0 20px 0 0;
            padding: 0;
            font-size: 18px;
        }
        }

        /* sitenavi */

        #footer .sitenavi {
        width: 50%;
        margin: 0;
        padding: 0;
        list-style: none;
        }
        #footer .sitenavi li {
        display: inline-block;
        margin: 0 0 0 20px;
        padding: 0;
        }
        #footer .sitenavi li:first-child {
        margin-left: 0;
        }

        @media screen and (max-width: 767px) {
        #footer .sitenavi {
            width: 100%;
            text-align: center;
            font-size: 12px;
        }
        }

        /* copyright */

        #footer .copyright {
        width: 50%;
        margin: 0;
        padding: 0;
        text-align: right;
        }
        @media screen and (max-width: 767px) {
        #footer .copyright {
            width: 100%;
            margin: 20px 0 0;
            text-align: center;
            font-size: 12px;
        }
        }

        body {
        margin: 0;
        padding: 0;
        }
    </style>
  </head>
  <body>
  <!--<a onclick="location.href='hometown_post_tokou.php'" value=""><font face="serif"><span style="font-size: 20px; position: fixed;bottom: 37%;right: 23px;color: #999;z-index: 9999;">投稿</span></font></a>-->
    <footer id="footer">
    <section class="primary">
        <p class="logo"><a href="#">COMPANY</a></p>
        <p class="address">
        〒100-0005 福岡市博多区南１丁目<br>
        TEL : 123-456-9999　/　FAX : 123-456-0000
        </p>
    </section>
    <section class="secondary">
        <ul class="sitenavi">
        <li><a href="#">サイトマップ</a></li>
        <li><a href="#">プライバシーポリシー</a></li>
        </ul>
        <p class="copyright">Copyright WEBSITE,Inc. All rights reserved.</p>
    </section>
    </footer>
  </body>
</html>

