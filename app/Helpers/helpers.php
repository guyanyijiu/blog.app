<?php

/**
 * 自定义全局助手函数
 */

/**
 * 递归组织数据的层级关系
 * @param     $arr
 * @param int $pid
 *
 * @return array
 */
function getTree($arr, $pid = 0){
    $result = [];
    foreach($arr as $v){
        if($v['pid'] == $pid){
            $v['child'] = getTree($arr, $v['id']);
            $result[] = $v;
        }
    }
    return $result;
}
