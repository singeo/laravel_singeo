<?php
/**
 * 后台菜单模型
 * User: singeo
 * Date: 2019/4/15 0015
 * Time: 上午 10:30
 */

namespace App\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class ConsoleNode extends Model
{
    /**
     * 不能被批量赋值的属性
     * @var array
     */
    protected $guarded = [] ;


    /**
     * 获取节点树
     * return array
     */
    public static function getNodeTree(){
        $where[] = [ 'type','=',1] ;
        $where[] = [ 'status','=',1] ;
        $list = static::where($where)
            ->select('id','pid','node_name')
            ->orderBy('sort','asc')
            ->orderBy('id','desc')
            ->get() ;
        if($list->isNotEmpty()){
            $list = \App\Admin\Librarys\TreeShape::tree($list,'node_name','id', 'pid') ;
        }
        return $list ;
    }

    /**
     * 获取锤子节点树
     * @return array
     */
    public static function getChannelTree(){
        $list = \App\Admin\Models\ConsoleNode::where('status',1)
            ->select('id','pid','node_name')
            ->orderBy('sort')
            ->orderByDesc('id')
            ->get() ;
        if($list->isNotEmpty()){
            $list = \App\Admin\Librarys\TreeShape::objChannelLevel($list,0,'','id', 'pid') ;
        }
        return $list ;
    }

    /**
     * 判断当前节点是否存在子节点
     * @param ConsoleNode $consoleNode
     * @return bool
     */
    public static function hasChildren(ConsoleNode $consoleNode){
        $result = static::where('pid','=',$consoleNode->id)->count() ;
        return $result > 0 ? true : false ;
    }
}