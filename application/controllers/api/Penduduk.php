<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Penduduk extends REST_Controller

{
    function __construct()
    {
        parent::__construct();
        // pakai alias ktp
        $this->load->model('M_ektp', 'ktp');
        // batas api per metod
        $this->methods['index_get']['limit'] = 20;
        $this->methods['index_delete']['limit'] = 2;
        $this->methods['index_post']['limit'] = 2;
        $this->methods['index_put']['limit'] = 2;
    }

    function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $penduduk = $this->ktp->get_all_ektp();
            // var_dump($penduduk);
        } else {
            $penduduk = $this->ktp->get_all_ektp($id);
        }

        if ($penduduk) {
            $this->set_response([
                'status' => true,
                'data' => $penduduk
            ], REST_Controller::HTTP_OK);
        } else {
            $this->set_response([
                'status' => false,
                'message' => 'id Not Found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Provide an Id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->ktp->hapus_ektp($id) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Deleted'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Id Not Found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    function index_post()
    {
        $data = [

            'ektp_kelurahan_id' => $this->post('ektp_kelurahan_id'),
            'ektp_judul' => $this->post('ektp_judul'),
            'ektp_alamat' => $this->post('ektp_alamat'),
            'ektp_ket' => $this->post('ektp_ket')
        ];

        if ($this->ktp->simpan_ektp($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new data has been created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function index_put()
    {
        $id = $this->put('id');

        $data = [

            'ektp_kelurahan_id' => $this->put('ektp_kelurahan_id'),
            'ektp_judul' => $this->put('ektp_judul'),
            'ektp_alamat' => $this->put('ektp_alamat'),
            'ektp_ket' => $this->put('ektp_ket')
        ];

        if ($this->ktp->update_ektp($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new data has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
