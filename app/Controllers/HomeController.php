<?php
namespace app\Controllers;
use app\Models\HomeModel;
 class BaseController {
    protected function render($view,$data=[])
    {
extract ($data);
require_once "./app/Views/$view.php";
    }
    protected function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}
class HomeController extends BaseController
{
    public $homeModel;
    public function __construct()
    {
        $this->homeModel = new HomeModel();
    }

    function index(){
        $courses = $this->homeModel->getAll();
        require './app/Views/ListView.php';
    }
    function add(){
        require './app/Views/add.php';
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $instructor = $_POST['instructor'];
            $duration = $_POST['duration'];
            $price = $_POST['price'];
            if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $tmp = $_FILES['thumbnail']['tmp_name'];
                move_uploaded_file($tmp, 'public/image/' . $thumbnail);
            } else  $thumbnail = null;
            if ($this->homeModel->add($name, $thumbnail, $instructor, $duration, $price)) {
                $this->redirect($_SERVER['PHP_SELF']);
            }
        }
    }

  function edit($id)
    {
        $editcourses = $this->homeModel->findID($id);
        $this->render('edit', ['courses' => $editcourses]);
        if (isset($_POST['edit'])) {
            $name = $_POST['name'];
            $instructor = $_POST['instructor'];
            $duration = $_POST['duration'];
            $price = $_POST['price'];

            $cover_image = null;
            if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {
                $cover_image = $_FILES['thumbnail']['name'];
                $tmp = $_FILES['thumbnail']['tmp_name'];
                move_uploaded_file($tmp, 'public/image/' . $cover_image);
            }

            if ($this->homeModel->edit($id,$name,$thumbnail, $instructor, $duration, $price)) {
                $this->redirect('?act=/');
            }
        }
    }

    function delete($id)
    {
        $this->homeModel->delete($id);
        $this->redirect($_SERVER['PHP_SELF']);
    }
}

