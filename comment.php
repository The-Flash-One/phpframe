<?php
use model\CommentModel;
use model\ArticleModel;
$newsid = $_GET['newsid'];
define('CONF_PATH',__DIR__ . '/config/');
require_once 'model/CommentModel.php';
require_once 'model/ArticleModel.php';
$am = new ArticleModel();
$cm = new CommentModel();
$basicInfo = $am->getBasicInfo($newsid);
$rowset = $cm->fetchAll($newsid);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新闻评论---<?php echo $basicInfo['art_subject']?></title>
<link type="text/css" rel="stylesheet" href="common/css/reset.css">
<link type="text/css" rel="stylesheet" href="common/css/comment.css">
<script src="common/js/jquery-1.10.0.min.js"></script>
<script>
	$(function(){
		$('#post_comment_btn').click(function(){
			$.post('postcomment.php','content=' + $('#content').val() + '&id=<?php echo $_GET['newsid'] ?>',function(obj){
				$('#content').val('');	
				var html = '';
				html += '<div class="comment_item">';
				html += '<div class="comment_item_cont clearfix">';
				html += '<div class="t_face"><img src="common/images/' + obj.mem_face + '"></div>';
				html += '<div class="t_content">';
				html += '<div class="t_info">'  + obj.mem_name + '</div>';
				html += '<div class="t_txt">'  +  obj.content +'</div>';
				html += '</div>';
				html += '</div>';				
				html += '</div>';
				$('#comment-wrapper').prepend(html);
			},'json');
		})
	})
</script>
</head>
<body>
	<div id="container">
		<h1 id="subject"><a href="articles/<?php echo $basicInfo['filepath']?>" target="_blank"><?php echo $basicInfo['art_subject']?></a></h1>
		<div class="post_box">
			<div class="post_box_cont">
				<textarea class="J_Comment_Content" placeholder="请输入评论内容" name="content" id="content"></textarea>
			</div>
			<div class="cmnt_user_cont clearfix">
				<div class="cmnt_name"><input name="user" autocomplete="off" placeholder="微博账号/博客/邮箱" class="form_input_long  J_Login_User"></div>
				<div class="cmnt_password"><input type="password" name="psw" class="form_input_long J_Login_Psw" placeholder="请输入密码"></div>				
			</div>
			<a href="javascript:;" id="post_comment_btn" class="J_Comment_Submit post_inline_comment post_inline_comment_disbled">发布</a>
			
		</div>
		<div class="comment-wrapper">
			<div class="comment-wrapper-title">最新热评</div>			
			<div id="comment-wrapper">	
					
				<?php foreach($rowset as $row) {?>
				<div class="comment_item">
					<div class="comment_item_cont clearfix">
						<div class="t_face"><img src="common/images/<?php echo $row['mem_face']?>"></div>
							<div class="t_content">
							<div class="t_info"><?php echo $row['mem_name']?></div>
							<div class="t_txt"><?php echo $row['cmt_content']?></div>
						</div>
					</div>				
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</body>
</html>