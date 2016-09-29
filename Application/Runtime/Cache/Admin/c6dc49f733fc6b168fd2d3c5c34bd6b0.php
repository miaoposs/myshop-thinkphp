<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ESHOP 管理中心 - 编辑分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/shop/Public/css/general.css" rel="stylesheet" type="text/css" />
<link href="/shop/Public/css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="/shop/index.php/Admin/Category/showOperator/name/show">商品分类</a></span>
<span class="action-span1"><a href="">ESHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 编辑分类 </span>
<div style="clear:both"></div>
</h1>
<!-- start add new category form -->
<div class="main-div">

  <form action="/shop/index.php/Admin/Category/updateCategory" method="post" name="theForm" >
    <input type="hidden" name="cat_id" value="<?php echo $info['cat_id'];?>" />
  <table width="100%" id="general-table">
      <tr>
        <td class="label">分类名称:</td>
        <td>
          <input type='text' name='cat_name' maxlength="20" value="<?php echo ($info['cat_name']); ?>" size='27' />
        </td>
      </tr>
      <tr>
        <td class="label">上级分类:</td>
        <td>
          <select name="parent_id">
          <option value="0">顶级分类</option>
            <?php if(is_array($categories)): foreach($categories as $key=>$row): ?><option value="<?php echo ($row['cat_id']); ?>" 
                <?php if($row['cat_id'] == $info['parent_id']): ?>selected="selected"<?php endif; ?>
              > 
                <?php echo str_repeat('&nbsp;', $row['level']*2); echo ($row['cat_name']); ?>
              </option><?php endforeach; endif; ?>
          </select>
        </td>
      </tr>

      <tr>
        <td class="label">排序:</td>
        <td>
          <input type='text' name='sort_order' maxlength="20" value="<?php echo ($info['sort_order']); ?>" size='27' />
        </td>
      </tr>

      </table>

      <div class="button-div">
        <input type="submit" value=" 确定 " />
        <input type="reset" value=" 重置 " />
      </div>
  </form>
</div>



<div id="footer">

版权所有 &copy; 2012-2014 传智播客 - PHP培训 - class</div>

</div>

</body>
</html>