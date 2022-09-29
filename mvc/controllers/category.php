<?php
class Category extends Controller
{
    function __construct(){
        $this->category = $this->model("CategoryModels");
    }
}
