<?php
use model\ArticleModel;
define('CONF_PATH',__DIR__ .'/config');
require_once 'model/ArticleModel.php';
$am = new ArticleModel();
$chinaRowset = $am->fetchAll('select art_subject,filepath from article where cate_id=4 and is_checked=1 order by id desc limit 10');
$hongkongRowset = $am->fetchAll('select art_subject,filepath from article where cate_id=5 and is_checked=1 order by id desc limit 10');
$newestRowset = $am->fetchAll('select art_subject,filepath from article where cate_id=6 and is_checked=1 order by id desc limit 10');
$globalRowset = $am->fetchAll('select art_subject,filepath from article where cate_id=7 and is_checked=1 order by id desc limit 10');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新闻视界--首页</title>
<link rel="stylesheet" href="common/css/reset.css"/>
<link rel="stylesheet" href="common/css/index.css"/>
</head>
<body>
    <!--头部快速链接开始-->
    <div class="top-wrap"><!--100%背景-->
       <div class="top-width area"><!--固定宽度内容水平居中 -->
           <div class="left">
               <a href="#">巴西世界杯一再爆冷</a> 
               <a href="#">卫冕冠军西班牙出局</a> 
               <a href="#">瑞士人为啥最幸福</a> 
               <a href="#">中国病人庞麦郎</a>  
           </div>
           <div class="right">
               <div class="login-info">
                  <a href="#">登录</a>
               </div>
               <div class="other-info">
                  <a href="#">免费注册</a>
                                您好,<a href="#" class="blue">淘气的松鼠</a>
                  <a href="#">退出</a>
               </div>
           </div>
       </div>
    </div>
    <!--头部快速链接结束-->
    <!--头部logo开始  -->
    <div class="logo-wrap area clearfix">
        <div class="left">
           <a href="#"><img src="common/images/logo.png" alt=""/></a>
        </div>
        <div class="right">
           <form action="" method="get" class="frm">
               <input type="text" name="search-key" class="search-key" placeholder="党报连发志军铁腕政策"/>
               <input type="submit" value="搜索" class="search-btn"/>
           </form>
        </div>
    </div>
    <!--头部logo结束  -->
    <!--头部导航开始  -->
    <div class="navi-wrap clearfix"><!--100%背景  -->
       <ul class="area"><!--固定宽度  -->
          <li><a href="#">首页</a></li>
          <li><a href="#">滚动</a></li>
          <li><a href="#">国内</a></li>
          <li><a href="#">国际</a></li>
          <li><a href="#">社会</a></li>
          <li><a href="#">图片</a></li>
          <li><a href="#">娱乐</a></li>
          <li><a href="#">军事</a></li>
          <li><a href="#">历史</a></li>
          <li><a href="#">百科</a></li>
          <li><a href="#">公益</a></li>
          <li><a href="#">评论</a></li>
       </ul>
    </div>
    <!--头部导航结束  -->
    <!--版块c1开始  -->
    <div class="c1 area clearfix">
         <div class="left">
            <div class="focus-info">
               <ul class="focus-img">
                  <li><a href="#"><img src="common/ad/12493512_1342949594483.jpg" alt=""/></a></li>
                  <li><a href="#"><img src="common/ad/12493512_1342949594488.jpg" alt=""/></a></li>
                  <li><a href="#"><img src="common/ad/12493512_1342949594489.jpg" alt=""/></a></li>
               </ul>
               <div class="focus-square"></div>
               <div class="focus-text">一周图片精选:考试排队</div>
               <ul class="focus-num">
                  <li></li>
                  <li class="cur"></li>
                  <li></li>
               </ul>
            </div>
         </div>
         <div class="right">
            <ul class="list-hot">
               <li>
                  <h3><a href="#">习近平：让人民对改革有更多获得感</a></h3>
                  <p>[ <a href="#">规范领导配偶子女经商试点首选上海</a> <a href="#">韩正回应:这是中央信任</a> ]</p>
               </li>
               <li>
                  <h3><a href="#">习近平：让人民对改革有更多获得感</a></h3>
               </li>
               <li>
                  <h3><a href="#">习近平：让人民对改革有更多获得感</a></h3>
                  <p>[ <a href="#">规范领导配偶子女经商试点首选上海</a> <a href="#">韩正回应:这是中央信任</a> ]</p>
               </li>
               <li>
                  <h3><a href="#">习近平：让人民对改革有更多获得感</a></h3>
                  <p>[ <a href="#">规范领导配偶子女经商试点首选上海</a> <a href="#">韩正回应:这是中央信任</a> ]</p>
               </li>
               <li>
                  <h3><a href="#">习近平：让人民对改革有更多获得感</a></h3>
                  <p>[ <a href="#">规范领导配偶子女经商试点首选上海</a> <a href="#">韩正回应:这是中央信任</a> ]</p>
               </li>
               <li>
                  <h3><a href="#">习近平：让人民对改革有更多获得感</a></h3>
                  <p>[ <a href="#">规范领导配偶子女经商试点首选上海</a> <a href="#">韩正回应:这是中央信任</a> ]</p>
               </li>
            </ul>
         </div>
    </div>
    <!--版块c1结束  -->
    <!--版块c2开始  -->
    <div class="c2 area clearfix">
       <div class="big-title">
          <h2 class="china">国内新闻</h2>
       </div>
       <div class="blank10"></div>
       <div class="left">
          <div class="title1">
             <h3><a href="#">内地新闻</a></h3>
          </div>
          <div class="blank10"></div>
          <ul class="list1">
          	<?php foreach($chinaRowset as $chinaRow) {?>
            <li><a href="articles/<?php echo $chinaRow['filepath']?>" target="_blank"><?php echo $chinaRow['art_subject']?></a></li>
            <?php }?>
          </ul>
       </div>
       <div class="left">
           <div class="title1">
             <h3><a href="#">港澳台新闻</a></h3>
           </div>
           <div class="blank10"></div>
           <ul class="list1">
            <?php foreach($hongkongRowset as $hongkongRow) {?>
            <li><a href="articles/<?php echo $hongkongRow['filepath']?>" target="_blank"><?php echo $hongkongRow['art_subject']?></a></li>
            <?php }?>
          </ul>
       </div>
       <div class="right">
           <div class="title2">
             <h3  class="cur"><a href="#">点击量排行</a></h3>
             <h3><a href="#">评论数排行</a></h3>
           </div>
           <div class="blank10"></div>
           <ul class="tab-content" style="display:block;">
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
           </ul>
           <ul class="tab-content">
            <li><a href="#">上海迪斯尼回应单日票价500元:仍在研究</a></li>
            <li><a href="#">上海迪斯尼回应单日票价500元:仍在研究</a></li>
            <li><a href="#">上海迪斯尼回应单日票价500元:仍在研究</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
            <li><a href="#">广东:遇台风黄色预警等四种信号即可自行停课</a></li>
           </ul>
       </div>
    </div>
    <!--版块c2结束  -->
   <!--版块c3开始  -->
     <div class="c2 area clearfix">
       <div class="big-title">
          <h2 class="world">国际新闻</h2>
       </div>
       <div class="blank10"></div>
       <div class="left">
          <div class="title1">          
             <h3><a href="#">最新消息</a></h3>
          </div>
          <div class="blank10"></div>
          <ul class="list1">
           <?php foreach($newestRowset as $newestRow) {?>
            <li><a href="articles/<?php echo $newestRow['filepath']?>" target="_blank"><?php echo $newestRow['art_subject']?></a></li>
            <?php }?>
          </ul>
       </div>
       <div class="left">
           <div class="title1">
             <h3><a href="#">环球视野</a></h3>
           </div>
           <div class="blank10"></div>
           <ul class="list1">
             <?php foreach($globalRowset as $globalRow) {?>
            <li><a href="aritcles/<?php echo $globalRow['filepath']?>" target="_blank"><?php echo $globalRow['art_subject']?></a></li>
            <?php }?>           
          </ul>
       </div>
       <div class="right">
           <div class="title1">
             <h3><a href="#"><span>海</span>外观察</a></h3>
           </div>
           <div class="blank10"></div>
           <div class="box">
              <div class="pic-txt">
                 <div>
                    <a href="#"><img src="common/photoview/U11594P1DT20150226092629.jpg" alt=""/></a>
                 </div>
                 <p>英国威廉王子要来中国，英媒很激动，称之为“历史性”的访问。王子访华有啥热闹</p>
              </div>
              <div class="pic-txt">
                 <div>
                    <a href="#"><img src="common/photoview/U11594P1DT20150226092629.jpg" alt=""/></a>
                 </div>
                 <p>英国威廉王子要来中国，英媒很激动，称之为“历史性”的访问。王子访华有啥热闹</p>
              </div>
              <div class="pic-txt">
                 <div>
                    <a href="#"><img src="common/photoview/U11594P1DT20150226092629.jpg" alt=""/></a>
                 </div>
                 <p>英国威廉王子要来中国，英媒很激动，称之为“历史性”的访问。王子访华有啥热闹</p>
              </div>
           </div>
       </div>
    </div>
   <!--版块c3结束  -->
   <!--版块c4开始  -->
   <div class="blank10"></div>
   <div class="c4 area clearfix">
      <div class="big-title">
         <h2 class="society"><a href="#">社会新闻</a></h2>
      </div>
      <div class="blank20"></div>
      <ul class="pic-pic clearfix">
        <li>
           <a href="#"><img src="common/photoview/20150119085746c9745.jpg"/></a>
           <p><a href="#">美军展示F-35战机超强挂载能力</a></p>
        </li>
        <li>
           <a href="#"><img src="common/photoview/20150119085746c9745.jpg"/></a>
           <p><a href="#">美军展示F-35战机超强挂载能力</a></p>
        </li>
        <li>
           <a href="#"><img src="common/photoview/20150119085746c9745.jpg"/></a>
           <p><a href="#">美军展示F-35战机超强挂载能力</a></p>
        </li>
        <li>
           <a href="#"><img src="common/photoview/20150119085746c9745.jpg"/></a>
           <p><a href="#">美军展示F-35战机超强挂载能力</a></p>
        </li>
        <li>
           <a href="#"><img src="common/photoview/20150119085746c9745.jpg"/></a>
           <p><a href="#">美军展示F-35战机超强挂载能力</a></p>
        </li>
        <li>
           <a href="#"><img src="common/photoview/20150119085746c9745.jpg"/></a>
           <p><a href="#">美军展示F-35战机超强挂载能力</a></p>
        </li>
        <li>
           <a href="#"><img src="common/photoview/20150119085746c9745.jpg"/></a>
           <p><a href="#">美军展示F-35战机超强挂载能力</a></p>
        </li>
        <li>
           <a href="#"><img src="common/photoview/20150119085746c9745.jpg"/></a>
           <p><a href="#">美军展示F-35战机超强挂载能力</a></p>
        </li>
      </ul> 
   </div>   
</body>
</html>






