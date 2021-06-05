<?php 
if(!file_exists('../config/database.php') || !file_exists('../config/siteinfo.php'))
echo base64_decode('5L2g55qEVGlueUxpbmvlronoo4Xmlofku7blt7LmjZ/lnY/vvIzor7fliKDpmaTnq5nngrnmoLnnm67lvZXkuIvnmoRDb25maWfmlofku7blpLnku6Xlj4rmiYDmnInmlbDmja7ooajlkI7ku6XlhajmlrDmlrnlvI/lronoo4U=');
else 
{
	function logina($x,$y)
{
    $z = "SELECT * FROM `".$y."users` WHERE `username` LIKE '".$x."'";
    return $z;
}
	include '../config/database.php';
	include '../config/siteinfo.php';
    session_start();
	if (isset($_SESSION["login"]) && $_SESSION["login"] == true) 
	{

		$con = mysqli_connect($dbhost, $dbuser, $dbpasswd , $dbname);
		
		$result=mysqli_query($con,logina($_SESSION['username'],$dbprefix));

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if(md5($_SESSION['passwd'])!=$row["passwd"])
			{				$_SESSION["login"] = false;
				$_SESSION['username']='';
				$_SESSION['passwd'] = '';
				header('Location: ../');
			}
			else {

				

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
		TinyLink | 短链管理
		</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.2/dist/css/mdui.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/mdui@0.4.2/dist/js/mdui.min.js">
		</script>
	</head>
	<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-blue">
		<div class="mdui-appbar mdui-appbar-fixed">
			<div class="mdui-toolbar mdui-color-theme">
				<button class="mdui-btn mdui-btn-icon" mdui-drawer="{target:'#sidebar'}">
					<i class="mdui-icon material-icons">
						&#xe5d2;
					</i>
				</button>
				<a href="./" class="mdui-typo-headline">
				TinyLink | 短链管理
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
			<div class="mdui-list" mdui-collapse="{accordion:true}">
				<a href="./" class="mdui-list-item mdui-list-item-active mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">
						&#xe88a;
					</i>
					<div class="mdui-list-item-content">
						短链管理
					</div>
				</a>
				<a href="./insert" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">
						&#xe145;
					</i>
					<div class="mdui-list-item-content">
						添加短链
					</div>
				</a>
				<a href="./delete" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-brown">
						&#xe872;
					</i>
					<div class="mdui-list-item-content">
						删除短链
					</div>
				</a>
				<a href="./logout" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange">
						&#xe0b8;
					</i>
					<div class="mdui-list-item-content">
						登出
					</div>
				</a>

				<a href="//github.com/imjinglan/TinyLink" class="mdui-list-item mdui-ripple" target = '_blank'>
					<div class="mdui-list-item-content">
						<strong>POWERED BY TINYLINK</strong>
					</div>
				</a>

			</div>
		</div>
		<div class="mdui-container mdui-typo">
			<h1 class="mdui-text-color-theme">
				语句列表
			</h1>
			
			<div class="mdui-table-fluid">
  <table class="mdui-table mdui-table-hoverable">
    <thead>
      <tr>
        <th>ID</th>
		<th>名称</th>
        <th>长链</th>
        <th>短链CODE</th>
		<th>操作</th>
      </tr>
    </thead>
    <tbody>
	<tr>
	
        <?php include './list.php';?>
			</tr>
    </tbody>
  </table>
</div>
			    
		</div>
		<script>
			$(function() {});
		</script>
		<style>
			.dictumanchor{position:relative;top:-56px}@media (min-width:600px){.dictumanchor{top:-64px!important}}@media
			(orientation:landscape) and (max-width:959px){.dictumanchor{top:-48px!important}}
		</style>
	</body>

</html>
<?php 			}
		} 
	}
    
}?>