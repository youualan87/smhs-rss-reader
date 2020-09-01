<?php

    if($_GET['apiv'] != null){$apiv = $_GET['apiv'];}else{$apiv = "1";};

    if($_GET['guid'] != null){$guid = $_GET['guid'];}else{$guid = "b733b7d5-2704-70be-b2c2-94180a804674";};

    $PageGuid = $guid;

    $rss_url = 'http://www.smhs.kh.edu.tw/RssXml.php?Guid=';

    $api_endpoint = 'https://rssreader.pan93412.workers.dev/?guid=';

    $data = json_decode( file_get_contents($api_endpoint . urlencode($PageGuid) ) , true );

    echo $data;

    $data_urlllll = $api_endpoint . urlencode($rss_url . $PageGuid);

    // if($data['status'] == 'ok'){

    ?>


<? echo ($api_endpoint . urlencode($PageGuid) );?>
<!doctype html>

<html lang="tw" class="h-100">

  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="這是可以速覽學校公告的網站，很方便呢！　例如你現在在看<?php echo "{$data['feed']['title']}" ?>">

    <meta property="og:image" content="https://img.imych.one/works/smhs-reader/images/cover/preview.jpg">

    <link rel="shortcut icon" type="image/x-icon" href="https://me.imych.one/icon/favicon.ico">

    <link rel="apple-touch-icon" sizes="180x180" href="https://img.imych.one/me/images/youu.png">

    <link rel="icon" type="image/png" sizes="192x192" href="https://img.imych.one/me/images/youu.png">

    <meta name="author" content="Youu">

    <title>速覽學校公告：<?php echo "{$data['feed']['title']}" ?></title>

    <!-- Bootstrap core CSS -->

    <link href="https://bootstrap.hexschool.com/docs/4.2/dist/css/bootstrap.css" rel="stylesheet">

    <style>
        body {
            background: rgba(255,255,255,0);
        }

      img

      {

          max-width:750px;

      }

      .mt-5

      {

        border-left:5px solid #FF1493;padding:5px;

        background:#D3D3D3;

      }

      .bd-placeholder-img {

        font-size: 1.125rem;

        text-anchor: middle;

      }
<?php echo $_GET['style'];?>


      @media (min-width: 768px) {

        .bd-placeholder-img-lg {

          font-size: 3.5rem;

        }

      }

    </style>

    <!-- Custom styles for this template -->

    <link href="https://bootstrap.hexschool.com/docs/4.2/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">

  </head>
<?php if($_GET['mode']=="iframe"){?>
<?php if(count($data) <= 0) {?>

        <div class="alert alert-danger">

            <code></code> 看板目前查無內容，請重新確認。
        </div> 

    <?php ;}else{?>
<?php foreach ($data as $item) { ?>
    <li><a href="./?mode=reload&uri=<?php echo urlencode("{$item['link']}") ?>" target="_blank"><?php echo "{$item['title']}" ?></a> <?php echo "{$item['isoDate']}" ?></li>
    
<?php ;};?>
<?php ;};?>
<div id="msg_btn" style="float:right;">
    <a href="javascript:location.reload()" data-toggle="modal" data-target="#reload">重新讀取</a> | 
    <a href="./?guid=<?php echo $guid?>&mode=normal" target="_blank">一般預覽模式</a> | 
    <a href="./?mode=reload&uri=<?php echo urlencode("http://www.smhs.kh.edu.tw/?Page=Bulletin&Guid={$guid}") ?>" target="_blank">查看更多公告⋯</a>
</div>
<div class="modal fade" id="reload" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="javascript:location.reload()">Click Here</a>
      </div>
    </div>
  </div>
</div>
<?php }else{?>
  <body class="d-flex flex-column h-100">

    <header>

  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="">速覽公告</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="">重整目前公告 <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://me.imych.one/#about">About Me!</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://github.com/youualan87/smhs-rss-reader">Source Code</a>
          </li>
      </div>
    </div>
  </nav>

</header>

<!-- Modal -->

<div class="modal fade bd-example-modal-xl" id="guidchange" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">切換看板</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <ul>

            <li><a href="?">校內訊息</a></li>

            <li><a href="?guid=0e96b635-7cad-081a-ffec-692c21225b8a">★防疫公告專區★</a></li>

            <li><a href="?guid=c24c3cc0-0da5-af66-7e33-3454da076f95">學校法規</a></li>

            <li><a href="?guid=f42a402b-dd6c-5df5-f51d-92b101750752">競賽活動</a></li>

            

            <hr>

            <li>

                自訂看板

                <form>

                  <div class="form-row align-items-center">

                    <div class="col-sm-9 my-1">

                      <label class="sr-only" for="guidpt">Username</label>

                      <div class="input-group">

                        <div class="input-group-prepend">

                          <div class="input-group-text">&Guid=</div>

                        </div>

                        <input type="text" name="guid" class="form-control" id="guidpt" placeholder="Guid">

                      </div>

                    </div>

                    <div class="col-auto my-1">

                      <button type="submit" class="btn btn-primary">查詢</button>

                    </div>

                  </div>

                </form>

            </li>

        </ul>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>

</div>

    

<!-- Begin page content -->

<main role="main" class="flex-shrink-0">

    <div class="container">

        <div class="alert alert-info">

            <a class="btn btn-info btn-sm" style="color:#FFF;" data-toggle="modal" data-target="#guidchange">目前閱覽區塊</a>：<?php echo "{$data['feed']['title']}" ?>

        </div>

        <?php if($data['items'] == null) {?>

            <div class="alert alert-danger">

                查無內容，請重新確認 Guid <code><?php echo $guid ;?></code>

            </div> 

        <?php ;}else{?>

            <?php foreach ($data['items'] as $item) { ?>

            <div class="card" style="margin-bottom:5px;">

              <div class="card-header alert-success">

                  <?php echo "{$item['title']}" ?>

              </div>

              <div class="card-body">

                <h5 class="card-title"><span class="btn btn-info btn-sm">發布時間：<?php echo "{$item['pubDate']}" ?></span> <span class="btn btn-warning btn-sm">分類： <?php echo "{$data['feed']['title']}" ?></span> </h5>

                <p class="card-text">

                    <script type="text/javascript">

                    </script>

    <script type="text/javascript">

    // function ChangeString<?php echo "{$item['pubDate']}" ?>(){

    //     var NewStringValue=document.innerHTML = "<?php echo "{$item['description']}" ?>";

    //     document.getElementById("NewStringBox<?php echo "{$item['pubDate']}" ?>").innerHTML=NewStringValue;

    // }

    </script>

    <!--// <p id="NewStringBox<?php echo "{$item['pubDate']}" ?>">請輸入新的文字來改變這段文字</p>-->

    <!--// <input type="text" id="StringTextBox">-->

    <!--// <input type="button" value="變更文字" onclick="ChangeString<?php echo "{$item['pubDate']}" ?>()">-->

    

                    <?php echo "{$item['content']}" ?>

                </p>

                <hr>

                <span class="text-danger">

                     請注意

                     <ul>

                         <li>若文中有提及「<span class="badge badge-pill badge-danger">查閱附件</span>」關鍵字，請務必要檢視原公告內文之附件檔案區</li>

                         <li>若文中連結無法連線，請務必檢視原始公告</li>

                     </ul>

                </span>

              </div>

              <div class="card-footer">

                <a href="<?php echo "{$item['link']}" ?>" class="btn btn-primary btn-sm" target="_blank">前往該公告連結</a>

              </div>

            </div>

            <?php ;}; ?>

        <?php };?>

    </div>

  <div style="height:50px"></div><div style="height:50px"></div>

</main>



<footer class="footer mt-auto py-3 fixed-bottom">

  <div class="container">

    <span class="text-muted" style="border-left:5px solid #FF1493;padding:5px;"><span style="margin-left:10px;">把網頁往下滑滑滑～</span></span>

  </div>

</footer>

<?php ;};?>

      <script>window.jQuery || document.write('<script src="https://bootstrap.hexschool.com/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://bootstrap.hexschool.com/docs/4.2/dist/js/bootstrap.bundle.js"></script>

      <script>// $('#gclass').modal('show')</script>

      <script src="https://api.imych.one/1021/clsCDN/INDEX/bootstrap/js/bootstrap.min.js"></script>

      <script src="https://api.imych.one/1021/clsCDN/INDEX/bootstrap/js/jquery.min.js"></script>

      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

      <script src="https://api.imych.one/1021/clsCDN/INDEX/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>


<?php // }else{ ?>

<!--server error, please check the correct guid and api version to view the news.-->

<?php // echo $data_urlllll; ;}; ?>