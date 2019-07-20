<?php
namespace app\client\controller;
use think\Request;
use think\Controller;
use think\Db;

class Bbs extends Controller
{
    
    public function index(){
        
        return $this -> fetch();
    }

    public function login(){
        return $this -> fetch();
    }

    public function staff(){
        return $this -> fetch();
    }

    public function stranger(){
        return $this -> fetch();
    }

    public function test(){
        return $this -> fetch();
    }

    public function save(){
        $data['content'] = json_decode(input('post.content'));
        //正则表达式匹配查找图片路径
        $pattern = '/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.png]))[\'|\"].*?[\/]?>/i';
        preg_match_all($pattern,$data['content'],$res);
        $num=count($res[1]);
        for($i=0;$i<$num;$i++){
            $ueditor_img=$res[1][$i];
            //新建日期文件夹
            $tmp_arr = explode('/',$ueditor_img);
            $oldFloder = './static/images/ueditor/img_temp/'.$tmp_arr[7];
            $newFloder = './static/images/ueditor/img/'.$tmp_arr[7];
            if(!is_dir($newFloder)){
                mkdir($newFloder,0777);
            }
            if(copy($oldFloder."/".$tmp_arr[8],$newFloder."/".$tmp_arr[8])){
                unlink($oldFloder."/".$tmp_arr[8]);
                $newimg=str_replace('/images_temp/','/img/',$ueditor_img);
                $data['content']=str_replace('/images_temp/','/img/',$data['content']);
            }
        }
        $result = Db::table('bbs')->insert($data);
        if($result > 1){
            return 1001;
        }else{
            return 1002;
        }
    }

}
