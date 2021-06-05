<?php
include '../../config/database.php';
$issett=true;
$linkssql = $dbprefix.'links';
$lid=$_GET['lid'];
if($_POST['code']!=1 || !isset($_POST['code']))
{
	if($lid!='' && $lid >0)
	{
		$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
		$sql = "SELECT * FROM ".$linkssql.' WHERE `id` = '.$_GET['lid'];
		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) > 0) {
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
		TinyLink | 删除短链
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
				TinyLink | 删除短链
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
			<div class="mdui-list" mdui-collapse="{accordion:true}">
				<a href="../" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">
						&#xe88a;
					</i>
					<div class="mdui-list-item-content">
						短链管理
					</div>
				</a>
				<a href="../insert" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">
						&#xe145;
					</i>
					<div class="mdui-list-item-content">
						添加短链
					</div>
				</a>
				<a href="./" class="mdui-list-item mdui-list-item-active mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-brown">
						&#xe872;
					</i>
					<div class="mdui-list-item-content">
						删除短链
					</div>
				</a>
				<a href="../logout" class="mdui-list-item mdui-ripple">
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
		<div class="mdui-container mdui-typo mdui-text-color-theme">
		<?php
		if($issett){ 
		?>
			<h1>
				确认要删除短链吗？<br>LID = <?php echo $_GET['lid'] ?>
			</h1>
			<div class="mdui-typo-title-opacity mdui-text-color-red-800" style="font-weight:900;">该短链将永久删除</div>
			
            <form class="content database" action="./" method="post">
    			<div class="mdui-textfield mdui-textfield-floating-label" style ="display:none">
                  <label class="mdui-textfield-label"></label>
                  <input class="mdui-textfield-input" value="<?php echo $_GET['lid']?>" name="lid"/>
                </div>

				<div class="mdui-textfield mdui-textfield-floating-label" style ="display:none">
                  <label class="mdui-textfield-label"></label>
                  <input class="mdui-textfield-input" value="1" name="code"/>
                </div>

    			<div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">站点名称</label>
                  <input class="mdui-textfield-input" value="<?php echo $name?>" name="namea" disabled>
                </div>
    			
				<div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">长短链</label>
                  <input class="mdui-textfield-input" value="<?php echo $long_url?>" name="long_url" disabled/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">短短链代码</label>
                  <input class="mdui-textfield-input" value="<?php echo $short_url_code?>" name="short_url_code" disabled/>
                </div>
                
                
                
    			<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">确认</button>
			</form>

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
			<h3>
				请通过 <a href = '../'> 管理面板 </a> 进入管理
			</h3>
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
	$sql = "DELETE FROM `" .$dbprefix. "links` WHERE `tiny_links`.`id` = ".$_POST['lid'];
	//echo $sql;
	$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
	$result = mysqli_query($con, $sql);
	echo '删除成功';
	?>
	
<meta http-equiv="refresh" content="2;url=../">
	<?php
}

?>