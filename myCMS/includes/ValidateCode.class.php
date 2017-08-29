<?php
/**
 * Created by PhpStorm.
 * User: node4
 * Date: 2017/8/29
 * Time: 14:31
 */
//验证码类
class ValidateCode{
    private $_charset="abcdefghkmnoprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789";//随机因子
    private $_code;
    private $_codelen=4;
    private $_width=130;        //验证码宽度
    private $_height=50;        //验证码高度
    private $_img;              //图形资源句柄
    private $_font;             //指定字体
    private $_fontsize=20;             //指定字体大小
    private $_fontcolor;             //指定字体颜色


    public function __construct()
    {
        $this->_font=ROOT_PATH.'/font/elephant.ttf';
    }

    //生成随机码
    private function createCode(){
        $_len=strlen($this->_charset)-1;
        for($i=0;$i<$this->_codelen;$i++){
            $this->_code.=$this->_charset[mt_rand(0,$_len)];
        }
    }
    //生成验证码背景
    private function createBg(){
        $this->_img=imagecreatetruecolor($this->_width,$this->_height);
        $color=imagecolorallocate($this->_img,mt_rand(157,255),mt_rand(157,255),mt_rand(157,255));
        imagefilledrectangle($this->_img,0,$this->_height,$this->_width,0,$color);


    }
    //生成文字
    private function createFont(){

        $_x=$this->_width/$this->_codelen;
        for ($i=0;$i<$this->_codelen;$i++){
            $this->_fontcolor=imagecolorallocate($this->_img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
            imagettftext($this->_img,$this->_fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->_height/1.5,$this->_fontcolor,$this->_font,$this->_code[$i]);
        }
    }
    //生成线条或者雪花
    private function createLine(){
        for($i=0;$i<6;$i++){
            $color=imagecolorallocate($this->_img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
            imageline($this->_img,mt_rand(0,$this->_width),mt_rand(0,$this->_height),mt_rand(0,$this->_width),mt_rand(0,$this->_height),$color);
        }
        for($i=0;$i<100;$i++){
            $color=imagecolorallocate($this->_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
            imagestring($this->_img,mt_rand(1,5),mt_rand(0,$this->_width),mt_rand(0,$this->_height),'**',$color);
        }
    }

    //输出图片验证码
    private function outPut(){
        header('Content-type:image/png');
        imagepng($this->_img);
        imagedestroy($this->_img);
    }
    //对外输出
    public function doimg(){
        $this->createBg();
        $this->createCode();
        $this->createLine();
        $this->createFont();
        $this->outPut();

    }
    public function getCode(){
        //$this->createCode();
        return strtolower($this->_code);
    }
}