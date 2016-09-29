<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: category_list.htm 17019 2010-01-29 10:10:34Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ESHOP 管理中心 - 商品分类 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/shop/Public/css/general.css" rel="stylesheet" type="text/css" />
<link href="/shop/Public/css/main.css" rel="stylesheet" type="text/css" />

</head>
<body>

<h1>
<span class="action-span"><a href="/shop/index.php/Admin/Category/showOperator/name/add">添加分类</a></span>
<span class="action-span1"><a href="">ITCAST-SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品分类 </span>
<div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">

<div class="list-div" id="listDiv">

<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
  <tr>
    <th>分类ID</th>
    <th>分类名称</th>
    <th>商品数量</th>
    <th>排序</th>
    <th>操作</th>
  </tr>
  <?php  $i = 0; foreach ($categories as $category) { ?>
  <tr align="center" class="0" id="0_6">
    
    <td align="left" class="first-cell" >
      <?php echo $category['cat_id'];?>
    </td>

    <td align="left" class="first-cell" >
      <?php echo str_repeat('&nbsp;', $category['level']*4),$category['cat_name'];?>
    </td>

    <td width="10%">
      <?php echo $category['sort_order'];?>
	  </td>

    <td width="10%" align="right">
      <?php echo $category['grade'];?>
	  </td>
    <td width="24%" align="center">
      <a href="/shop/index.php/Admin/Category/showUpdateCategory/name/update/param/cat_id=<?php echo ($category['cat_id']); ?>">编辑</a> |
      <a href="category.php?act=delete&cat_id=<?php echo $category['cat_id'];?>" onclick="return confirm('你确定删除么?');" title="移除">移除</a>
    </td>

  </tr>
  <?php };?>
  </table>
</div>
</form>


<div id="footer">

版权所有 &copy; 2012-2014 传智播客 - PHP培训 - class</div>

</div>

</body>
</html>