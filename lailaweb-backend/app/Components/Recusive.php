<?php
declare(strict_types=1);
namespace App\Components;


class Recusive {

    public function __construct(private $data,private string $htmlSelect='')
    {

    }

    public function fatherRecusive($parent_id,$id=0,$text=''):string
    {
        foreach($this->data as $value)
        {
            if ($value['parent_id']==$id) 
            {
                if (!empty($parent_id) && $parent_id == $value['id']) {
                    $this->htmlSelect .= "<option selected" ." value=".$value['id'].">".$text. $value['name']."</option>";
                }else
                {
                    $this->htmlSelect .= "<option" ." value=".$value['id'].">".$text. $value['name']."</option>";
                }
                $this->fatherRecusive($parent_id,$value['id'],$text."---");
            }
        }
        return $this->htmlSelect;
    }
   
}