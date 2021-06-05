<?php
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
		TinyLink | 添加短链
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
					TinyLink | 添加短链
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
				<a href="./" class="mdui-list-item mdui-list-item-active mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">
                        &#xe145;
					</i>
					<div class="mdui-list-item-content">
                        添加短链
					</div>
				</a>
				<a href="../delete" class="mdui-list-item mdui-ripple">
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
			<h1 class="">
                添加短链
			</h1>
			
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
                  <input class="mdui-textfield-input" value="<?php echo $name?>" name="namea"/>
                </div>
    			
				<div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">长短链</label>
                  <input class="mdui-textfield-input" value="<?php echo $long_url?>" name="long_url"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">短短链代码</label>
                  <input class="mdui-textfield-input" value="<?php echo $short_url_code?>" name="short_url_code"/>
                </div>
                
                
                
    			<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">回答</button>
			</form>	    
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
    function nohttp($x)
    {
        return str_ireplace("http://","",str_ireplace("https://","",$x));
    }

	$sql = "INSERT INTO `" .$dbprefix. "links`(`name`, `long_url`, `short_url_code`) VALUES ('" .$_POST['namea']. "', '" .nohttp($_POST['long_url']). "', '" .$_POST['short_url_code']. "');";
	//echo $sql;
	$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
	$result = mysqli_query($con, $sql);
	echo '添加成功';
	?>
	
<meta http-equiv="refresh" content="2;url=./?lid=<?php echo $_POST['lid']?>">
	<?php
}

?>