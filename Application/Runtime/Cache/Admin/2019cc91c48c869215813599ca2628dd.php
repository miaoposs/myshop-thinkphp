<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/shop/Public/css/general.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
<!--
var noHelp   = "<p align='center' style='color: #666'>暂时还没有该部分内容</p>";
var helpLang = "zh_cn";
//-->
</script>

<style type="text/css">
body {
  background: #80BDCB;
}
#tabbar-div {
  background: #278296;
  padding-left: 10px;
  height: 21px;
  padding-top: 0px;
}
#tabbar-div p {
  margin: 1px 0 0 0;
}
.tab-front {
  background: #80BDCB;
  line-height: 20px;
  font-weight: bold;
  padding: 4px 15px 4px 18px;
  border-right: 2px solid #335b64;
  cursor: hand;
  cursor: pointer;
}
.tab-back {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
}
.tab-hover {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
  background: #2F9DB5;
}
#top-div
{
  padding: 3px 0 2px;
  background: #BBDDE5;
  margin: 5px;
  text-align: center;
}
#main-div {
  border: 1px solid #345C65;
  padding: 5px;
  margin: 5px;
  background: #FFF;
}
#menu-list {
  padding: 0;
  margin: 0;
}
#menu-list ul {
  padding: 0;
  margin: 0;
  list-style-type: none;
  color: #335B64;
}
#menu-list li {
  padding-left: 16px;
  line-height: 16px;
  cursor: hand;
  cursor: pointer;
}
#main-div a:visited, #menu-list a:link, #menu-list a:hover {
  color: #335B64
  text-decoration: none;
}
#menu-list a:active {
  color: #EB8A3D;
}
.explode {
  background: url(/shop/Public/images/menu_minus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.collapse {
  background: url(/shop/Public/images/menu_plus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.menu-item {
  background: url(/shop/Public/images/menu_arrow.gif) no-repeat 0px 3px;
  font-weight: normal;
}
#help-title {
  font-size: 14px;
  color: #000080;
  margin: 5px 0;
  padding: 0px;
}
#help-content {
  margin: 0;
  padding: 0;
}
.tips {
  color: #CC0000;
}
.link {
  color: #000099;
}
</style>

</head>
<body>
<div id="tabbar-div">
<p><span style="float:right; padding: 3px 5px;" ><a href="javascript:toggleCollapse();"><img id="toggleImg" src="/shop/Public/images/menu_minus.gif" width="9" height="9" border="0" alt="闭合" /></a></span>
  <span class="tab-front" id="menu-tab">菜单</span>
</p>
</div>
<div id="main-div">
<div id="menu-list">
<ul id="menu-ul">
  <li class="explode" key="02_cat_and_goods" name="menu">
    商品管理        <ul>
          <li class="menu-item"><a href="/shop/index.php/Admin/Goods/showOperator/name/show" target="main-frame">商品列表</a></li>
          <li class="menu-item"><a href="" target="main-frame">添加新商品</a></li>
          <li class="menu-item"><a href="/shop/index.php/Admin/Category/showOperator/name/show" target="main-frame">商品分类</a></li>
          <li class="menu-item"><a href="" target="main-frame">商品品牌</a></li>
          <li class="menu-item"><a href="" target="main-frame">添加品牌</a></li>
          <li class="menu-item"><a href="/shop/index.php/Admin/Goods/showOperator/name/trash" target="main-frame">商品回收站</a></li>
        </ul>
      </li>

  <li class="explode" key="04_order" name="menu">
    订单管理
      </li>
  <li class="explode" key="05_banner" name="menu">
    广告管理
      </li>
  <li class="explode" key="06_stats" name="menu">
    报表统计
      </li>
  <li class="explode" key="07_content" name="menu">
    文章管理
      </li>
  <li class="explode" key="08_members" name="menu">
    会员管理
      </li>
  <li class="explode" key="10_priv_admin" name="menu">
    权限管理
      </li>
  <li class="explode" key="11_system" name="menu">
    系统设置
      </li>
  <li class="explode" key="12_template" name="menu">
    模板管理
      </li>
  <li class="explode" key="13_backup" name="menu">
    数据库管理
      </li>
  <li class="explode" key="14_sms" name="menu">
    短信管理
      </li>
  <li class="explode" key="15_rec" name="menu">
    推荐管理
      </li>
  <li class="explode" key="16_email_manage" name="menu">
    邮件群发管理
      </li>

</ul>
</div>
<div id="help-div" style="display:none">
<h1 id="help-title"></h1>
<div id="help-content"></div>
</div>
</div>


</body>
</html>