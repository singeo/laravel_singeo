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
        $nodeList = static::where($where)
            ->select('id','pid','node_name')
            ->orderBy('sort','asc')
            ->orderBy('created_at','desc')
            ->get() ;
        $result = \App\Admin\Librarys\TreeShape::tree($nodeList->toArray(),'node_name','id', 'pid') ;
        return $result ;
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