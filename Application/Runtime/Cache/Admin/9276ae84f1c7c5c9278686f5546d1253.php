<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ESHOP 管理中心 - 商品列表 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/shop/Public/css/general.css" rel="stylesheet" type="text/css" />
<link href="/shop/Public/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

  function change(obj){
    var value = obj.src;
    if (value.match('yes')) {
      obj.src = 'images/no.gif';
    }else{
      obj.src = 'images/yes.gif';
    }
  }

</script>

</head>
<body>

<h1>
<span class="action-span"><a href="">添加商品</a></span>
<span class="action-span1"><a href="">ESHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
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
    <th>上架</th>
    <th>精品</th>
    <th>新品</th>
    <th>热销</th>
    <th>排序</th>
    <th>库存</th>
    <th>操作</th>
  </tr>
<?php if(is_array($goods_list)): foreach($goods_list as $key=>$value): ?><tr align="center" class="0" id="0_6">
    <td align="left" class="first-cell" ><?php echo ($value['goods_id']); ?></td>
    <td><?php echo ($value['goods_name']); ?></td>
    <td><?php echo ($value['goods_sn']); ?></td>
    <td><?php echo ($value['shop_price']); ?></td>
    <td><img src="/shop/Public/images/<?php echo $value['is_promote'] ? 'yes' : 'no';?>.gif" style="cursor:pointer;" onclick="change(this)" /></td>
    <td><img src="/shop/Public/images/<?php echo $value['is_best'] ? 'yes' : 'no';?>.gif" style="cursor:pointer;" onclick="change(this)" /></td>
    <td><img src="/shop/Public/images/<?php echo $value['is_new'] ? 'yes' : 'no';?>.gif" style="cursor:pointer;" onclick="change(this)" /></td>
    <td><img src="/shop/Public/images/<?php echo $value['is_hot'] ? 'yes' : 'no';?>.gif" style="cursor:pointer;" onclick="change(this)" /></td>
    <td><?php echo ($value['sort_order']); ?></td>
    <td align="right"><?php echo ($value['goods_number']); ?></td>
    <td width="24%" align="center">
      <a href="goods.php?act=update" title="编辑">编辑</a> |
      <a href="goods.php?act=remove&goods_id=<?php echo ($value['goods_id']); ?>" title="移除" onclick="return confirm('你确定要将商品放入回收站么？');">移除</a>
    </td>
  </tr><?php endforeach; endif; ?>
  </table>

  <table cellspacing="0" id="page-table">
  <tr>
    <td nowrap="true" align="center" style="background-color: rgb(255, 255, 255);">
      <?php echo $page_str;?>
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