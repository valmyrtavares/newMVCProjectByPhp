<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Post;

class HomeController extends Controller {

    public function home() {
        $this->render('home');
    }

    public function artigos() {
        $post = POST::select()->execute();
        $this->render('artigos',['post' => $post]);
    }

    public function admin() {
        $this->render('admin');
    }

    public function sobre() {
        $this->render('sobre');
    }

    // public function index() {
    //     $this->render('home', ['nome' => 'Bonieky']);
    // }

    // public function sobre() {
    //     $this->render('sobre');
    // }

    // public function sobreP($args) {
    //     print_r($args);
    // }

}