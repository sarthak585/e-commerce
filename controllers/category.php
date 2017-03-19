<?php
include_once '../models/category_model.php';


class CategoryController {

    private $categoryModel;
    public $id;

    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->categoryModel = new category_model();
        $this->id = (isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0;

        if(isset($_GET['action'])) {
            $this->postCategory($_POST);
        }
    }

    public function getCategory() {
        $categoryList = $this->categoryModel->viewCategory();

        return $categoryList;
    }

    public function postCategory($requestData) {
        $postData = array('Name' =>$requestData['Name'],'Description' =>$requestData['Description'],'IsActive' => isset($requestData['IsActive'])?1:0);

        if ($_GET['action'] == 'update'){
            if($this->id) {
                $this->categoryModel->editCategory($this->id, $postData);
            }
            else {
                $this->categoryModel->addCategory($postData);
            }
        }
        else if ($_GET['action'] == 'delete') {
            $this->categoryModel->deleteCategory($this->id);
        }

        header('location: ../views/category_view.php');
    }
}