<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>commit</title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキスト">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
    <style>
        /*
        【要素の重ね合わせ（親要素）】
        positionで要素を重ね合わせると高さがなくなるので、
        高さを残したい場合は親要素で「height」を指定。
        */
        .content {
        max-width: 1000px;
        height: 698px;
        margin: 100px auto;
        position: relative;
        }
        /*
        【要素の重ね合わせ（子要素）】
        「position: absolute;」と「left」で左に配置。
        */
        .text {
        max-width: 680px;
        background-color: #fff;
        padding: 84px 160px 84px 84px;
        position: absolute;
        left: 0;
        }
        .text p {
        line-height: 1.8;
        margin-bottom: 35px;
        }
        /*
        「display: inline-block;」で下線をテキスト幅に合わせる。
        */
        .text .title {
        border-bottom: solid 1px #35383a;
        display: inline-block;
        font-size: 1.875rem;
        font-weight: normal;
        margin-bottom: 30px;
        }
        .text .large {
        font-size: 1.875rem;
        }
        /*
        「display: inline-block;」でボタンをテキスト幅に合わせてから
        paddingでサイズを調整。
        「transition」で、ホバーをふわっとさせる。
        （※transitionの詳細については調べてみてくださいね。）
        */
        .text .btn {
        display: inline-block;
        border: solid 1px #35383a;
        border-radius: 30px;
        padding: 16px 50px;
        transition: all 0.3s ease;
        }
        .text .btn:hover {
        background-color: #efeded;
        }
        /*
        【要素の重ね合わせ（子要素）】
        「position: absolute;」と「top」「right」で、
        親要素の上から140px、右から20pxに配置。
        */
        .img {
        max-width: 400px;
        position: absolute;
        top: 140px;
        right: 175px;
        }
        /*
        「vertical-align: bottom;」で、画像の下の隙間を消す。
        「top」を指定してもOK。
        （※画像の下の隙間を消す方法は、実務でもよく使うので
        覚えておいてください。）
        */
        .img img {
        vertical-align: bottom;
        }

        /*-------------------------------------------
        SP
        -------------------------------------------*/
        @media screen and (max-width: 1000px) {
        /*
        スマホ時はテキストエリアと画像を縦に並べるので、
        「position: static;」で位置の固定を解除する。
        「height: auto;」で高さの固定も解除する。
        */
        .content {
            height: auto;
            position: static;
            margin: 0;
        }
        .text {
            max-width: 100%;
            padding: 60px 20px;
            position: static;
        }
        .img {
            max-width: 100%;
            position: static;
        }
        }
    </style>
  </head>

  <body>
    <div class="content">
      <div class="text">
        <h2 class="title">COMMIT</h2>
        <p class="large">
          <br>
          忘れられない空がある<br>
          ANOTHER SKY<br><br>
        </p>
        <p>
          有名人ならずみなさんのアナザースカイ
          を共<br>有しましょう。旅行先や地元の故郷
          など発信<br>し価値観を広げよう。
          詳しい使い方はこちらから
        </p>
        <a class="btn" href="commithome.php">read more...</a>
      </div>
      <div class="img">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/3T7WB738PNE?si=6qNPc6trJH8TXRj2&autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
    </div>
  </body>
</html>