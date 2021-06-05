<?php
$a = 1; // 避免报错
/*
include '../../config/database.php';
$issett = true;
$linkssql = $dbprefix.'links';
$lid=$_GET['lid'];
if($_POST['code']!=1 || !isset($_POST['code']))
{
	if($lid!='' && $lid > 0)
	{
		$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
		$sql = "SELECT * FROM ".$linkssql.' WHERE `id` = '.$_GET['lid'];

		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) > 0) 
		{
			while($row = mysqli_fetch_assoc($result)) {
				$name = $row['name'];
				$long_url = $row['long_url'];
				$short_url_code = $row['short_url_code'];
			}
		} else {$issett=false;}
	}
	else $issett=false;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
			A Sentence | 一句 管理面板
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
					列表
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
				<a href="./insert.php" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">
						&#xe145;
					</i>
					<div class="mdui-list-item-content">
						添加语句
					</div>
				</a>
				<a href="./delete.php" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-brown">
						&#xe872;
					</i>
					<div class="mdui-list-item-content">
						删除语句
					</div>
				</a>
				<a href="./list.php" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange">
						&#xe88e;
					</i>
					<div class="mdui-list-item-content">
						列表
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
			</div>
		</div>
		<div class="mdui-container mdui-typo mdui-text-color-theme">
		<?php
		if($issett){ 
		?>
			<h1 class="">
				二维码
			</h1>
			
            <img src=

			<?php
		}
		else{
			if($lid>0)
				{
		?>
		<h1>
				LID = <?php echo $_GET['lid'] ?> 不存在，请检查Link ID
			</h1>
		<?php
				}
			else {?>
			<h1>
				LID 语法不正确，请检查Link ID
			</h1>
			<?php
			}}
			
		?>	    
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
<?php }

if($_POST['code']==1)
{
	$sql = "UPDATE `" .$dbprefix. "links` SET `name` = '" .$_POST['namea']. "', `long_url` = '" .$_POST['long_url']. "', `short_url_code` = '" .$_POST['short_url_code']. "' WHERE `tiny_links`.`id` = ".$_POST['lid'];
	//echo $sql;
	$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
	$result = mysqli_query($con, $sql);
	echo '更新成功';
	?>
	
<meta http-equiv="refresh" content="5;url=./?lid=<?php echo $_POST['lid']?>">
	<?php
}
*/
?>不写了，烦......