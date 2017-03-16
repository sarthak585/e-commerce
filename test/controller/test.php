<?php
include_once '../model/test.php';

class controllerTest
{
    private $modelTest;

    public function __construct()
    {
        $this->modelTest = new modelTest();

        if(!empty($_POST)) {
            $this->postForm();
        }
    }

    public function viewTest()
    {
        $list = $this->modelTest->selectTest();

        return $list;
    }

    public function postForm() {
        if ($_POST['submit'] == 'Add') {
            $this->modelTest->addTest($_POST);
        } elseif ($_POST['submit'] == 'Edit') {
            $this->modelTest->editTest($_POST);
        } else if ($_POST['submit'] == 'Delete') {
            $this->modelTest->deleteTest($_POST);
        }
        header('location: ../view/test.php');
    }
}
?>