<?php

class User extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'um', TRUE);
    }

    function auth()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = file_get_contents("php://input");
            if (!empty($post)) {
                $raw = (array)json_decode($post);
                $email = $raw['email'];
                if (!empty($email)) {
                    if ($this->um->getUserByEmail($email)) {
                        $pdata['email'] = !empty($raw['email']) ? trim($raw['email']) : "";
                        $pdata['password'] = !empty($raw['password']) ? md5(trim($raw['password'])) : "";
                        $user = $this->um->doLogin($pdata);
                        // print_r($_SERVER);
                        if ($user) {
                            $jwt = JWT::encode(
                                array(
                                    "name" => $user['name'],
                                    "tokenId" => $user["user_id"],
                                    "email" => $user['email'],
                                    "role" => $user['role']),      //Data to be encoded in the JWT
                                $this->secretKey, 'HS512');

                            echo _success('success', 'token', $jwt, 200);
                        }

                    } else echo _error("User not found !", 409);
                }
            } else {
                echo _error("Invalid parameters", 404);
            }
        } else {
            echo _error("Bad Request", 400);
        }

    }

    function get($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $post = file_get_contents("php://input");
            $raw = (array)json_decode($post);
            if (!empty($post)) {

                echo _success('Successfully Updated !', 'user', [], 200);
            } else {
                echo _error("Invalid parameters", 404);
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            // $this->language->delLanguage($id);
            echo _success('Successfully Removed !', 'result', [], 200);
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //   $language = $this->language->getLanguageById($id);
            //    echo _success('Success', 'language', $language, 200);
        } else {
            echo _error("Invalid request", 401);
        }
    }
}