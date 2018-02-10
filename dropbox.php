<?php
// STREAM DropBox v1 - ZaxmaN
error_reporting(E_ERROR | E_PARSE);
$dropbox = $_GET['s'];
if (empty($dropbox)) {
echo '<!DOCTYPE html><html oncontextmenu="return false;" ondragstart="return false;" onselectstart="return false;">
<head><meta name="googlebot" content="noindex" /><meta name="referrer" content="never"/>
<meta name="robots" content="noindex"><title>DropBox</title>
<link rel="shortcut icon" type="image/x-icon" href="//cf.dropboxstatic.com/static/images/favicon.ico" />
</head><body bgcolor="black"><div style="text-align: center;">
<span style="color:#ffffff;"><span style="font-size:28px;"><span style="font-family:verdana,geneva,sans-serif;"><cite><strong>Archivo no encontrado :(</strong></cite></span></span></span>
</div></body></html>';
}
if (isset($dropbox)) {
$dropget = file_get_contents('https://www.dropbox.com/s/'.$dropbox.'.mp4');
$image = explode('"thumbnail-url-tmpl": "', $dropget);
$image = explode('",', $image[1]);
echo '<!DOCTYPE html><html><head><meta name="referrer" content="never"/><meta name="robots" content="noindex">
<title>DropBox</title><script src="//bowercdn.net/c/jquery-1.11.1/dist/jquery.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="//cf.dropboxstatic.com/static/images/favicon.ico" />
<style>*{margin:0px;}</style><style type="text/css">html { overflow:hidden; }</style>
<link rel="stylesheet" type="text/css" href="//bowercdn.net/c/html5-boilerplate-4.3.0/css/normalize.css">
<link rel="stylesheet" type="text/css" href="//bowercdn.net/c/html5-boilerplate-4.3.0/css/main.css">
<script src="http://jwpsrv.com/library/echLdpbKEeSi8w4AfQhyIQ.js"></script>
<script>jwplayer.key="cbPZjCLEJ+O5oZl0AvaDQqyb50+ydDAD5kEqJuS10Zg=";</script></head>
<body bgcolor="black"><div id="dropbox"></div><script>
var DropBoxJW = jwplayer("dropbox");
DropBoxJW.setup({
    file: "https://dl.dropboxusercontent.com/s/'.$dropbox.'.mp4",
    image: "'.$image[0].'",
    type: "video/mp4",
    primary: "html5",
    preload: "none",
    height: $(window).height(),
    width: $(window).width(),
    aspectratio: "16:9",
    abouttext: "Stream - DropBox",
    aboutlink: "https://www.dropbox.com/",
})
    $(document).ready(function(){
        $(window).resize(function(){
            jwplayer().resize($(window).width(),$(window).height())
        })
    })
</script></body></html>';
}
?>