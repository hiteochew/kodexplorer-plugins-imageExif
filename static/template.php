<!doctype html>
<head>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=no" />
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo STATIC_PATH;?>style/skin/base/app_explorer.css?ver=<?php echo KOD_VERSION;?>"/>
	<title><?php echo $fileName;?></title>
	<style type="text/css">
	html{overflow:auto;}
	a{color:red;}
	ol{margin: 0;padding: 0 0 0 15px;}
	.pathinfo{width: 100%;}
	.pathinfo .p {line-height: 1.5;}
	.pathinfo .p .title {width: 100px;font-weight: bold;margin-left: 1rem;}
	.pathinfo .p .content {width: 60%;}
	</style>
</head>
<body>
<div class="pathinfo">
    <?php if($data){ ?>
	<?php foreach ($data as $key => $resp) {
	if (!is_array($resp)) { ?>
	<div class="p info-item-<?=$key?>">
		<div class="title"><?=$key?>:</div>
		<div class="content"><?php echo $resp;?></div>
		<div style="clear:both"></div>
	</div>
	<? }else{ ?>
	<div class="p info-item-<?=$key?>">
		<div class="title"><?=$key?>:</div>
		<div class="content">
			<?php
				echo "<ol>";
				foreach ($resp as $vkey => $value) {
					echo "<li>".$vkey. " <small>(" .$value.")</small></li>";
				}
				echo "</ol>";
			?>
		</div>
		<div style="clear:both"></div>
	</div><div class="line"></div>
	<?php } } ?>
	<?php  }else{ ?>
	<div class="p info-item">
		<div style="text-align:center;">无exif信息</div>
		<div style="clear:both"></div>
	</div>
		<script type="text/javascript">parent.Tips.close('无exif信息','warning');</script>
	<?php  } ?>
</div>
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->pluginHost;?>static/jquery.zclip.js"></script>
<script type="text/javascript">
$(function(){
  $("ol").each(function(){
    var olhandle = $(this);
    var max=10;//设置最多显示li
    var linum = olhandle.find("li");
    var hidden;
    if(linum.length > max){
    	hidden = olhandle.find("li:eq(" + max + ")").nextAll().clone();
    	olhandle.find("li:eq(" + max + ")").nextAll().remove();
      olhandle.append("<li><a href='###'>点击展开</a></li>");
    };
    $(this).find("a").click(function(){
    	olhandle.find("li:last").remove();
      olhandle.append(hidden);
    })
  });
  $(".btnCopy").zclip({
  	path: "<?php echo $this->pluginHost;?>static/ZeroClipboard.swf",
    copy: function(){
   		return $(this).attr("data-url");
　　	},
		afterCopy: function(){
		}
  });
});
</script>
</body>
</html>
