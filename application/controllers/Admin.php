<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public $header_data = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model("DB", "api", TRUE);
        $this->load->library('session');
        $user_id = !empty($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : '';
        $this->header_data['profile'] = $this->api->getUserById($user_id);
    }

    public function index()
    {
        $data = array();
        $data['title'] = $this->site_name;
        if (!empty($_POST['LOGIN']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $user = $this->api->userLogin($_POST['email'], md5($_POST['password']));
            if (!empty($user['user_id'])) {
                $_SESSION = array();
                $_SESSION['USER_ID'] = $user['user_id'];
                $_SESSION['USER_NAME'] = $user['name'];
                $_SESSION['USER_EMAIL'] = $user['email'];
                $_SESSION['IMG'] = $user['img'];
                redirect(base_url() . "admin/dashboard/");

            } else if (!empty($user['is_active']) && $user['is_active'] != "1") {
                $_SESSION['error'] = "Your account is not active.";
            } else {
                $_SESSION['error'] = "Invalid Email/Password.";
            }
        }
        $data['user'] = $_POST;
        $this->load->view("ks-admin/login", $data);
    }

    public function login()
    {
        $data = array();
        $data['title'] = $this->site_name;
        $this->load->view('ks-admin/login', $data);
    }

    function my_account()
    {
        redirect(base_url() . 'account/login');
    }

    public function dashboard()
    {
        //   $this->_user_login_check(["SUPER_ADMIN"]);
        $data = array();
        $this->header_data['title'] = $this->site_name . " | Dashboard Page";
        $this->_admin('dashboard', $data);
    }

    public function profile()
    {

        $data = array();
        $this->header_data['title'] = " Profile";
        if (!empty($_POST['first_name'])) {
            $pdata = array();
            $pdata['first_name'] = !empty($_POST['first_name']) ? trim($_POST['first_name']) : "";
            $pdata['last_name'] = !empty($_POST['last_name']) ? trim($_POST['last_name']) : "";
            $pdata['email'] = !empty($_POST['email']) ? trim($_POST['email']) : "";
            $pdata['password'] = !empty($_POST['password']) ? trim($_POST['password']) : "";
            $pdata['mobile'] = !empty($_POST['mobile']) ? trim($_POST['mobile']) : "";
            $pdata['description'] = !empty($_POST['description']) ? trim($_POST['description']) : "";
            $pdata['gender'] = !empty($_POST['gender']) ? trim($_POST['gender']) : "";
            $pdata['birth_date'] = !empty($_POST['birth_date']) ? trim($_POST['birth_date']) : "";
            $pdata['street_address1'] = !empty($_POST['street_address1']) ? trim($_POST['street_address1']) : "";
            $pdata['street_address2'] = !empty($_POST['street_address2']) ? trim($_POST['street_address2']) : "";
            $pdata['zip_code'] = !empty($_POST['zip_code']) ? trim($_POST['zip_code']) : "";
            $user_id = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : "";
            $this->api->updateUser($pdata, $user_id);
            $img = imgUpload('profile_image', '/data/profiles/', 'profile' . $user_id);
            if ($img !== false) {
                $this->api->updateUser(['img' => $img], $user_id);
            }
        }
        $data['profile'] = $this->api->getUserById($_SESSION['USER_ID']);
        $this->_template('profile', $data);
    }

    function about()
    {
        $data = array();
        if (!empty($_POST['description'])) {
            $pdata = array();
            $pdata['description_mini'] = !empty($_POST['description_mini']) ? $_POST['description_mini'] : '';
            $pdata['description'] = !empty($_POST['description']) ? $_POST['description'] : '';
            $pdata['video'] = !empty($_POST['video']) ? $_POST['video'] : '';
            if (!empty($_FILES)) {
                $folder = 'data/about-me/';
                createFolder($folder);
                $img = uploadImage('image', $folder, "kolanukonda-shivaji", 100);
                $pdata['image'] = $folder . $img;
            }
            if (!empty($_POST['pk_id'])) {
                $this->api->updateAbout($pdata, $_POST['pk_id']);
            } else {
                $this->api->addAbout($pdata);
            }
            redirect(base_url() . 'admin/dashboard');

        }
        $data['about'] = $this->api->getAbout();
        $this->_admin('about/form', $data);
    }

    function posts($act = '', $str = '')
    {
        $data = array();
        if (!empty($_GET['act']) && $_GET['act'] == "del" && !empty($_GET['post_id'])) {
            $this->api->delPost($_GET['post_id']);
            redirect(base_url() . "admin/posts/");
        }
        if (!empty($_GET['act']) && $_GET['act'] == "status" && !empty($_GET['category_id']) && isset($_GET['sta'])) {
            $is_active = (!empty($_GET['sta']) && $_GET['sta'] == "1") ? "1" : "0";
            $this->api->updatePost(array("is_active" => $is_active), $_GET['post_id']);
            redirect(base_url() . "admin/posts/");
        }
        if ($act == "add") {
            $this->header_data['title'] = "Add Post";
            $data = array();
            if (!empty($_POST['news_title'])) {
                $pdata = array();
                $pdata['news_title'] = !empty($_POST['news_title']) ? trim($_POST['news_title']) : "";
                $pdata['post_slug'] = !empty($_POST['post_slug']) ? slugify(trim($_POST['post_slug'])) : "";
                $pdata['post_video'] = !empty($_POST['post_video']) ? trim($_POST['post_video']): "";
                $pdata['description'] = !empty($_POST['description']) ? trim($_POST['description']) : "";
                $last_id = $this->api->addPost($pdata);
                if ($last_id) {
                    $folder = 'data/articles/';
                    createFolder($folder);
                    $img = uploadImage('image', $folder, slugify($_POST['news_title']) . $last_id, 80);
                    if ($img !== false) {
                        $this->api->updatePost(['image' => $folder . $img, 'thumb_image' => $folder . 'thumb_' . $img], $last_id);
                    }
                    redirect(base_url() . 'admin/posts/');
                }
                $_SESSION['message'] = "Post added successfully.";
                redirect(base_url() . "admin/posts/");

            }
            $this->_admin('posts/form', $data);
        } elseif ($act == "edit") {
            $this->header_data['title'] = "Edit Post";
            $data = array();
            if (!empty($_POST['post_id'])) {
                $post_id = $_POST['post_id'];
                $pdata = array();
                $pdata['news_title'] = !empty($_POST['news_title']) ? trim($_POST['news_title']) : "";
                $pdata['post_slug'] = !empty($_POST['post_slug']) ? slugify(trim($_POST['post_slug'])) : "";
                $pdata['post_video'] = !empty($_POST['post_video']) ? trim($_POST['post_video']): "";
                $pdata['description'] = !empty($_POST['description']) ? trim($_POST['description']) : "";
                $this->api->updatePost($pdata, $post_id);
                $folder = 'data/articles/';
                if (!empty($_FILES)) {
                    createFolder($folder);
                    $img = uploadImage('image', $folder, slugify($_POST['news_title']) . $post_id, 100);
                    if ($img !== false) {
                        $this->api->updatePost(['image' => $folder . $img], $post_id);
                    }
                }
                redirect(base_url() . 'admin/posts/');
            }
            $data['post'] = $this->api->getPostById($str);
            $this->_admin('posts/form', $data);
        } else {
            $this->header_data['title'] = " Posts";
            $search_data = array();
            if (!empty($this->_REQ['key'])) {
                $search_data['key'] = $this->_REQ['key'];
            }
            $this->load->library('Pagenavi');
            $this->pagenavi->search_data = $search_data;
            $this->pagenavi->per_page = 100;
            $this->pagenavi->base_url = base_url() . 'admin/posts?';
            $this->pagenavi->process($this->api, 'searchPosts');
            $data['PAGING'] = $this->pagenavi->links_html;
            $data['posts'] = $this->pagenavi->items;
            $this->_admin('posts/index', $data);
        }
    }

    function gallery($act = '', $str = '')
    {
        $data = array();
        if (!empty($_GET['act']) && $_GET['act'] == "del" && !empty($_GET['gallery_id'])) {
            $gallery = $this->api->getGalleryById($_GET['gallery_id']);
            @rmdir(FCPATH . $gallery['gallery_path'].'/');
            $this->api->delGallery($_GET['gallery_id']);
            $_SESSION['message'] = "Gallery  Removed successfully.";
            redirect(base_url() . "admin/gallery/");
        }
        if (!empty($_GET['act']) && $_GET['act'] == "u" && !empty($_GET['i'])) {
            unlink($_GET['i']);
            $_SESSION['message'] = "Image  Removed successfully.";
            redirect(base_url() . "admin/gallery/edit/" . $_GET['g']);
        }
        if (!empty($_GET['act']) && $_GET['act'] == "status" && !empty($_GET['gallery_id']) && isset($_GET['sta'])) {
            $is_active = (!empty($_GET['sta']) && $_GET['sta'] == "1") ? "1" : "0";

            $this->api->updateGallery(array("is_active" => $is_active), $_GET['gallery_id']);
            $_SESSION['message'] = "Gallery Updated successfully.";
            redirect(base_url() . "admin/gallery/");
        }
        if ($act == 'add') {
            if (!empty($_POST['gallery_name'])) {
                $pdata = [];
                $pdata['gallery_name'] = !empty($_POST['gallery_name']) ? trim($_POST['gallery_name']) : "";
                $pdata['gallery_slug'] = !empty($_POST['gallery_name']) ? slugify(trim($_POST['gallery_name'])) : "";
                $last_id = $this->api->addGallery($pdata);
                $folder = "/data/gallery/" . slugify($pdata['gallery_name']) . "-" . $last_id;
                createFolder($folder);
                uploadFiles('/' . $folder . '/', 'images');
                $this->api->updateGallery(["gallery_path" => $folder], $last_id);
                $_SESSION['message'] = "Gallery added successfully.";
                redirect(base_url() . "admin/gallery/");
            }
            $this->_admin('gallery/form', $data);

        } else if ($act == 'edit') {
            if (!empty($_POST['gallery_id'])) {
                $pdata = [];
                $pdata['gallery_id'] = !empty($_POST['gallery_id']) ? trim($_POST['gallery_id']) : "";
                $pdata['gallery_name'] = !empty($_POST['gallery_name']) ? trim($_POST['gallery_name']) : "";
                $pdata['gallery_slug'] = !empty($_POST['gallery_slug']) ? slugify(trim($_POST['gallery_slug'])) : "";
                $this->api->updateGallery($pdata, $_POST['gallery_id']);
                if (!empty($_FILES)) {
                    $folder = "/data/gallery/" . str_replace(' ', '-', $pdata['gallery_name']) . "-" . $pdata['gallery_id'];
                    createFolder($folder);
                    uploadFiles('/' . $folder . '/', 'images');
                    $this->api->updateGallery(["gallery_path" => $folder], $pdata['gallery_id']);
                }
                $_SESSION['message'] = "Gallery Updated successfully.";
                redirect(base_url() . "admin/gallery/");
            }
            $data['gallery'] = $this->api->getGalleryById($str);

            $this->_admin('gallery/form', $data);
        } else {

            $this->header_data['title'] = " Gallery";
            $search_data = array();
            if (!empty($this->_REQ['key'])) {
                $search_data['key'] = $this->_REQ['key'];
            }
            $this->load->library('Pagenavi');
            $this->pagenavi->search_data = $search_data;
            $this->pagenavi->per_page = 20;
            $this->pagenavi->base_url = base_url() . 'admin/gallery/?';
            $this->pagenavi->process($this->api, 'searchGallery');
            $data['PAGING'] = $this->pagenavi->links_html;
            $data['galleries'] = $this->pagenavi->items;
            $this->_admin('gallery/index', $data);
        }
    }

    public function upload_post_image()
    {
        /*******************************************************
         * Only these origins will be allowed to upload images *
         ******************************************************/
        $accepted_origins = array("http://localhost", "http://192.168.1.1", "https://wakeupindia.tv", "http://wakeupindia.tv/", "*");
        /*********************************************
         * Change this line to set the upload folder *
         *********************************************/
        $imageFolder = "images/";
        reset($_FILES);
        $temp = current($_FILES);
        if (is_uploaded_file($temp['tmp_name'])) {

            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return;
            }
            if (!is_dir($imageFolder)) {
                @mkdir($imageFolder);
            }
            $filetowrite = $imageFolder . $temp['name'];
            move_uploaded_file($temp['tmp_name'], $filetowrite);
            echo json_encode(array('location' => base_url() . $filetowrite));
        } else {
            // Notify editor that the upload failed
            header("HTTP/1.1 500 Server Error");
            echo "No";
        }
    }

    function logout()
    {
        $_SESSION = [];
        $this->session->sess_destroy();
        // $_SESSION['error'] = "All sessions are destroyed";
        redirect(base_url());
    }
}
