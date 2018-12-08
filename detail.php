<?php
include("fun.php");

$url=$_GET['id'];
$pecah = explode("/",$url);
$id = $pecah[0];
$tseo = $pecah[1];

$sql = "SELECT id, judul, konten_pertama, konten, kategori_id, deskripsi, foto_file, views, created_at FROM artikel WHERE id=$id";
$result = $con->query($sql);

if ($result) {
  $row = $result->fetch_assoc();
}
  //inc views
  $views = $row['views'];
  $sql_inc = "UPDATE artikel SET views = $views + 1 WHERE id=$id";
  $inc = $con->query($sql_inc);

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:url" content="http://timoer.info/blog/berita/<?= $id ?>/<?= $tseo ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $row['judul'] ?>" />
    <meta property="og:description" content="<?= $row['deskripsi'] ?>" />
    <meta property="og:image" content="http://timoer.info/timoer_backend/web/images/<?= $row['foto_file'] ?>" />
    <meta property="fb:app_id" content="314574428640745" />
    <meta name="author" content="bvqento">

    <title><?= $row['judul'] ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../../css/clean-blog.min.css" rel="stylesheet">

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-1434074630735871",
              enable_page_level_ads: true
         });
    </script>

  </head>

  <body>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=316279665647294&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="../../index.php">TIMOER</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" target="_BLANK" href="https://www.facebook.com/TIMOERinfo-373759446502412/">Facebook Page</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('http://timoer.info/timoer_backend/web/images/<?= $row['foto_file'] ?>')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?= $row['judul'] ?></h1>
              <!-- <h2 class="subheading">Problems look mighty small from 150 miles up</h2> -->
              <span class="meta">Posted by
                <a href="#">Admin</a>
                on </i><?= tglIndo($row["created_at"]) ?> &#183; <?= getKategori($row["kategori_id"], $con) ?></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">

              <div class="badge badge-info text-center"><?= $row["views"] ?> views</div>

              <?= $row["konten_pertama"] ?>

              <!-- Iklan Google -->
              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <ins class="adsbygoogle"
                   style="display:block; text-align:center;"
                   data-ad-layout="in-article"
                   data-ad-format="fluid"
                   data-ad-client="ca-pub-1434074630735871"
                   data-ad-slot="1549289192"></ins>
              <script>
                   (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
              <!-- End iklan google -->

              <?= $row["konten"] ?>
              <div class="bottom-article">

                <div class="fb-like" data-href="http://timoer.info/blog/berita/<?= $id ?>/<?= $tseo ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                
              </div>

              <div class="fb-comments" data-href="http://timoer.info/blog/<?= $tseo ?>" data-numposts="10" data-width="650"></div>


          </div>

        </div>
      </div>
    </article>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-10 mx-auto text-right">
            <div class="fb-page" data-href="https://www.facebook.com/timoer.info" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/timoer.info" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/timoer.info">TIMOER.info</a></blockquote></div>
          </div>
          <br>
          <div class="col-lg-6 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="nav-link" target="_BLANK" href="https://www.facebook.com/timoer.info/">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; TIMOER.info 2018</p>
          </div>

        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../../js/clean-blog.min.js"></script>

  </body>

</html>
