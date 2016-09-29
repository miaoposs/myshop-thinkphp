<?php 
namespace Admin\Controller;
use Common\Common\BaseController;
class CategoryController extends BaseController
{
	/**
	 * 查询并返回商品分类信息
	 */
	private function getCategoriesInfo()
	{
		$category = M('category');
		$result = $this->noLimitCategory($category->select());
		return $result;
	}

	/**
	 * 无限极分类
	 * @param1   array    categories  数据库查询返回的商品类别数据；  
	 * @param2   integer  parent_id   当前递归层所要收集的商品分类，默认为0；
	 * @param3   integer  level       标志当前递归层，同时也标志了该层商品的级别，默认为0；
	 * @return   array    ret         返回分类后的数组;
	 */
	private function noLimitCategory($categories,$parent_id=0,$level=0)
	{
		static $ret = array();

		foreach ($categories as $row) 
		{
			if ($row['parent_id'] == $parent_id) 
			{
				$row['level'] = $level;
				$ret[] = $row;
				$this->noLimitCategory($categories,$row['cat_id'],$level+1);
			}
		}
		return $ret;
	}

	/**
	 * 显示不同的操作界面
	 * @param  $name       string      需要显示的页面代号
	 * @param  $param      int         其他参数值，默认为空，在update页面为cat_id的值
	 */
	public function showOperator($name,$param=null)
	{
		$this->isLogin();

		if($name == 'show'){
			$this->assign('categories',$this->getCategoriesInfo());
			$this->display('Category:categories');
		}elseif($name == 'add'){
			$this->assign('categories',$this->getCategoriesInfo());
			$this->display('Category:addCategory');
		}else if($name == 'update'){
			$category = M('category');
			$result = $category->where("cat_id={$param}")->find();
			$this->assign('info',$result);
			$this->assign('categories',$this->getCategoriesInfo());
			$this->display('Category:editCategory');
		}
	}

	/**
	 * 检查用户输入数据
	 * @param   $cat_name     商品分类的名称
	 * @param   $sort_order   商品分类的排序值
	 */
	private function checkInputData($cat_name,$sort_order)
	{
		if (empty($cat_name))
		{
			$this->error('分类名称不能为空',2);
		}

		if (!is_numeric($sort_order)) 
		{
			$this->error('排序字段只能为整数',2);
		}

		if (strlen($cat_name) > 60) 
		{
			$this->error('分类名称长度不能超过20个字符',2);
		}
	}

	/**
	 * 检查是否存在重复信息
	 * @param   $parent_id    商品分类的父节点id
	 * @param   $cat_name     商品分类的名称
	 */
	private function isExists($parent_id,$cat_name)
	{
		$category = M('category');
		if($category->where(array('parent_id' => $parent_id,'cat_name' => $cat_name))->find()){
			return true;
		}else{
			return false;
		}
	}


	/**
	 * 向数据库添加商品分类信息
	 * @param   $cat_name     商品分类的名称
	 * @param   $parent_id    商品分类的父节点id
	 * @param   $sort_order   商品分类的排序值
	 */
	public function addCategory($cat_name,$parent_id,$sort_order)
	{
		$this->isLogin();

		$this->checkInputData($cat_name,$sort_order);
		if(!$this->isExists($parent_id,$cat_name)){
			$category =M('category');
			$data = array('cat_name' => $cat_name,'parent_id' => $parent_id,'sort_order' => $sort_order);
			if($id = $category->data($data)->add()){
				setcookie('cat_id',$id);
				$this->success('添加成功','showOperator/name/show');
			}else{
				$this->error('sql执行错误');
			}
		}else{
			$this->error('您输入的分类已存在');
		}
	}


	/**
	 * 更新商品分类信息
	 * @param   $cat_id       需要修改的商品分类id 
	 * @param   $cat_name     商品分类的名称
	 * @param   $parent_id    商品分类的父节点id
	 * @param   $sort_order   商品分类的排序值
	 */
	public function updateCategory($cat_id,$cat_name,$parent_id,$sort_order)
	{
		$this->isLogin();

		$this->checkInputData($cat_name,$sort_order);
		if(!$this->isExists($parent_id,$cat_name)){
			$category = M('category');
			$data = array('cat_name' => $cat_name,'parent_id' => $parent_id,'sort_order' => $sort_order);
			if($category->data($data)->where("cat_id={$cat_id}")->save()){
				$this->success('修改成功','showOperator/name/show');
			}else{
				$this->error('sql执行错误');
			}
		}else{
			$this->error('该分类在同级分类中已存在');
		}
	}

	/**
	 * 删除商品分类
	 * @param   $cat_id       需要删除的商品分类id 
	 */
	public function deleteCategory($cat_id)
	{
		$this->isLogin();

		$category = M('category');
		if($category->where("cat_id={$cat_id}")->find()){
			if($category->delete($cat_id)){
				$this->success('删除成功',__CONTROLLER__.'/showOperator/name/show');
			}else{
				$this->error('sql执行出错');
			}
		}else{
			$this->error('该分类不存在，请刷新后再试');
		}
	}

}