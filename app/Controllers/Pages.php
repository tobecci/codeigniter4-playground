<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{

    /**
     * 
     */
    public function index()
    {
        echo view("welcome_message");
    }
    //-------------------------------------------------------------

    /**
     *
     * @param string $page
     * @throws \CodeIgniter\Exceptions\PageNotFoundException
     * @return null
     */
    public function view($page = "home")
    {
        $fileUrl = APPPATH."/Views/pages/".$page.".php";
        if (!is_file($fileUrl)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $data['title'] = ucfirst($page);
        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }
    //-------------------------------------------------------------
}