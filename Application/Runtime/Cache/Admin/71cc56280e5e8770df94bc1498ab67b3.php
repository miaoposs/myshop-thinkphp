<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ESHOP 管理中心 - 商品回收站 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/shop/Public/css/general.css" rel="stylesheet" type="text/css" />
<link href="/shop/Public/css/main.css" rel="stylesheet" type="text/css" />

</head>
<body>

<h1>
<span class="action-span"><a href="/shop/index.php/Admin/Goods/showOperator/name/show">商品列表</a></span>
<span class="action-span1"><a href="">ESHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品回收站 </span>
<div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">

  <div class="list-div" id="listDiv">

    <table width="100%" cellspacing="1" cellpadding="2" id="list-table">
      <tr>
        <th>编号</th>
        <th>商品名称</th>
        <th>货号</th>
        <th>价格</th>
        <th>操作</th>
      </tr>
      <?php if(is_array($goods_trash)): foreach($goods_trash as $key=>$value): ?><tr align="center" class="0" id="0_6">
        <td align="left" class="first-cell" ><?php echo ($value['goods_id']); ?></td>
        <td><?php echo ($value['goods_name']); ?></td>
        <td><?php echo ($value['goods_sn']); ?></td>
        <td><?php echo ($value['shop_price']); ?></td>
        <td width="24%" align="center">
          <a href="/shop/index.php/Admin/Goods/restore/goods_id/<?php echo ($value['goods_id']); ?>">还原</a> |
          <a href="/shop/index.php/Admin/Goods/deleteTrash/goods_id/<?php echo ($value['goods_id']); ?>" onclick="return confirm('确定删除么？删除后将不可恢复');">彻底删除</a>
        </td>
      </tr><?php endforeach; endif; ?>
      </table>

      <table cellspacing="0" id="page-table">
      <tr>
        <td nowrap="true" align="center" style="background-color: rgb(255, 255, 255);">
        </td>
      </tr>
    </table>
  </div>
</form>


<div id="footer">

版权所有 &copy; 2012-2014 传智播客 - PHP培训 - class</div>

</div>

</body>
</html>