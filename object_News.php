<?php
class News {
    private $ID;
    private $OrgID;
    private $Title;
    private $PublishDate;
    private $Image;
    private $Content;

    public function News(){
        $this->ID = "";
        $this->OrgID = "";
        $this->Title = "";
        $this->PublishDate = "";
        $this->Image = "";
        $this->Content = "";
    }

    public function set_id($id){
        $this->ID = $id;
    }

    public function set_orgid($orgid){
        $this->OrgID = $orgid;
    }

    public function set_title($title){
        $this->Title = $title;
    }

    public function set_publishdate($publishdate){
        $this->PublishDate = $publishdate;
    }

    public function set_image($image){
        $this->Image = $image;
    }

    public function set_content($content){
        $this->Content = $content;
    }

    public function get_id(){
        return $this->ID;
    }

    public function get_orgid(){
        return $this->OrgID;
    }

    public function get_title(){
        return $this->Title;
    }

    public function get_publishdate(){
        return $this->PublishDate;
    }

    public function get_image(){
        return $this->Image;
    }

    public function get_content(){
        return $this->Content;
    }
}
?>