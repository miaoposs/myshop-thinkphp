<?php 
namespace Admin\Controller;
use Common\Common\BaseController;
class GoodsController extends BaseController
{
	/**
	 * 查询并返回商品分类信息
	 */
	private function getGoodsInfo($is_delete = 0)
	{
		$goods = M('goods');
		$field = array('goods_id','goods_name','goods_sn','shop_price','is_promote','is_best','is_new','is_hot','sort_order','goods_number');
		$result = $goods->field($field)->where("is_delete={$is_delete}")->select();
		return $result;
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
			$this->assign('goods_list',$this->getGoodsInfo());
			$this->display('Goods:goods');
		}elseif($name == 'trash'){
			$this->assign('goods_trash',$this->getGoodsInfo(1));
			$this->display('Goods:trashGoods');
		}
	}

	/**
	 * 还原被放到回收站的商品
	 * @param    $goods_id     int     商品id
	 */
	public function restore($goods_id)
	{
		$this->isLogin();

		$goods = M('goods');
		if($goods->where("goods_id={$goods_id}")->find()){
			if($goods->data('is_delete=0')->where("goods_id={$goods_id}")->save()){
				$this->success('更新成功',__CONTROLLER__.'/showOperator/name/show');
			}else{
				$this->error('sql执行错误');
			}
		}else{
			$this->error('您要更新的商品信息不存在，请刷新重试');
		}
	}

	/**
	 * 删除放在回收站的商品
	 * @param    $goods_id     int     商品id
	 */
	public function deleteTrash($goods_id)
	{
		$this->isLogin();
		
		$goods = M('goods');
		if($goods->where("goods_id={$goods_id}")->find()){
			if($goods->delete($goods_id)){
				$this->success('删除成功',__CONTROLLER__.'/showOperator/name/trash');
			}else{
				$this->error('sql执行错误');
			}
		}else{
			$this->error('您要删除的商品信息不存在，请刷新重试');
		}
	}
}