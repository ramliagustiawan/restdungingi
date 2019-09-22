<?php
class Loading extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {

        $x['judul'] = 'Dungingi | Loading page';



        $x['judul'] = 'Loading Page';

        $this->load->view('depan/loading', $x);
    }
}
