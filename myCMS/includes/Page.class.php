<?php
    class  Page{
        private $_total;
        private $_pagesize;
        private $_limit;
        private $_page;//当前页码
        private $_pagenum;

        private $_url;
        private $_bothnum;//两边保持分页的量

        public function __construct($total,$pagesize)
        {
            $this->_total=$total;
            $this->_pagesize=$pagesize;
            $this->_pagenum=ceil($this->_total/$this->_pagesize);
            $this->_page=$this->setPage();
            $this->_limit="LIMIT ".($this->_page-1)*$this->_pagesize.",".$this->_pagesize;
            $this->_url=$this->setUrl();
            $this->_bothnum=2;
        }
        //获取当前页码
        public function setPage(){
            if(!empty($_GET['page'])){
                if($_GET['page']>0){
                    if($_GET['page']>$this->_pagenum){
                        return $this->_pagenum;
                    }
                    else {
                        return $_GET['page'];
                    }
                }else{
                    return 1;
                }

            }else{
                return 1;
            }


        }
        public function __get($name)
        {
            return $this->$name;
            // TODO: Implement __get() method.
        }
        public function __set($name, $value)
        {
            $this->$name=$value;
            // TODO: Implement __set() method.
        }
        private function setUrl(){
            $url=$_SERVER['REQUEST_URI'];
            $_par=parse_url($url);
            if(isset($_par['query'])){
                parse_str($_par['query'],$query);
                unset($query['page']);
                $url=$_par['path'].'?'.http_build_query($query);

            }
            return $url;
        }
        private function pageList(){
            $pagelist='';
            for($i=$this->_bothnum;$i>=1;$i--){
                $page=$this->_page-$i;
                if($page<1)continue;
                $pagelist.='<a href="'.$this->_url.'&page='.$page.'">'.$page.'</a>';
            }
            $pagelist.='<span class="me">'.$this->_page.'</span>';
            for($i=1;$i<=$this->_bothnum;$i++){
                $page=$this->_page+$i;
                if($page>$this->_pagenum)break;
                $pagelist.='<a href="'.$this->_url.'&page='.$page.'">'.$page.'</a>';
            }


//            for($i=1;$i<=$this->_pagenum;$i++){
//                $pagelist.='<a href="'.$this->_url.'&page='.$i.'">'.$i.'</a>';
//            }
            return $pagelist;
        }
        private function first(){
            if($this->_page>=$this->_bothnum+1) {
                return '<a href="' . $this->_url . '">1</a>...';
            }
        }
        private function prev(){
            if($this->_page==1){
                return '<span class="disabled">上一页</span>';
            }
            return '<a href="'.$this->_url.'&page='.($this->_page-1).'">上一页</a>';
        }
        public  function next(){
            if($this->_page==$this->_pagenum){
                return '<span class="disabled">下一页</span>';
            }
            return '<a href="'.$this->_url.'&page='.($this->_page+1).'">下一页</a>';
        }
        private function last(){
            if($this->_pagenum-$this->_page>$this->_bothnum){
                return '...<a href="'.$this->_url.'&page='.$this->_pagenum.'">'.$this->_pagenum.'</a>';
            }
        }

        public function showPage(){
            $page='';
            $page.=$this->first();
            $page.=$this->pageList();
            $page.=$this->last();
            $page.=$this->prev();

            $page.=$this->next();

            return $page;
        }
    }
?>