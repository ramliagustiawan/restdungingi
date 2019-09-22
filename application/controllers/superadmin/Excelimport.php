

<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excelimport extends CI_Controller
{
    public function __construct()
        {
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };  

        $this->load->model('m_penduduk');
        $this->load->model('excel_import_model');
        $this->load->library('excel');
        }

    function index()
        {
        
        $x['data']=$this->m_penduduk->get_all_Penduduk();
        $this->load->view('admin/v_excelimport',$x);
        }
        
    function fetch()
        {
        $data = $this->excel_import_model->select();
        $output = '
        <h3 align="center">Total Data - '.$data->num_rows().'</h3>
        <table class="table table-striped table-bordered">
        <tr>
            <th>nik</th>
            <th>nama</th>
            <th>jk</th>
            <th>tempat lahir</th>
            <th>tgl_lahir</th>
            <th>umur</th>
            <th>gdr</th>
            <th>agama</th>
            <th>stts</th>
            <th>shdk</th>
            <th>shdrt</th>
            <th>pddk_akhir</th>
            <th>pekerjaan</th>
            <th>nama_ibu</th>
            <th>nama_ayah</th>
            <th>no_kk</th>
            <th>nama_kk</th>
            <th>alamat</th>
            <th>provinsi</th>
            <th>no_kota</th>
            <th>nama_kota</th>
            <th>nama_kec</th>
            <th>no_kel</th>
            <th>nama_kel</th>
            <th>rw</th>
            <th>rt</th>


        </tr>
        ';
        foreach($data->result() as $row)
        {
        $output .= '
        <tr>
            <td>'.$row->nik.'</td>
            <td>'.$row->nama.'</td>
            <td>'.$row->jk.'</td>
            <td>'.$row->tempat_lahir.'</td>
            <td>'.$row->tgl_lahir.'</td>
            <td>'.$row->umur.'</td>
            <td>'.$row->gdr.'</td>
            <td>'.$row->agama.'</td>
            <td>'.$row->stts.'</td>
            <td>'.$row->shdk.'</td>
            <td>'.$row->shdrt.'</td>
            <td>'.$row->pddk_akhir.'</td>
            <td>'.$row->pekerjaan.'</td>
            <td>'.$row->nama_ibu.'</td>
            <td>'.$row->nama_ayah.'</td>
            <td>'.$row->no_kk.'</td>
            <td>'.$row->nama_kk.'</td>
            <td>'.$row->alamat.'</td>
            <td>'.$row->provinsi.'</td>
            <td>'.$row->no_kota.'</td>
            <td>'.$row->nama_kota.'</td>
            <td>'.$row->nama_kec.'</td>
            <td>'.$row->no_kel.'</td>
            <td>'.$row->nama_kel.'</td>
            <td>'.$row->rw.'</td>
            <td>'.$row->rt.'</td>

        </tr>
        ';
        }
        $output .= '</table>';
        echo $output;
        }

    
        function import()
        {
        if(isset($_FILES["file"]["name"]))
        {
        $path = $_FILES["file"]["tmp_name"];
        $object = PHPExcel_IOFactory::load($path);
        foreach($object->getWorksheetIterator() as $worksheet)
        {
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for($row=2; $row<=$highestRow; $row++)
            {

            $nik=$worksheet->getCellByColumnAndRow(0, $row)->getValue();
            $nama=$worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $jk=$worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $ttl=$worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $tanggal=$worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $umur=$worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $gdr=$worksheet->getCellByColumnAndRow(6, $row)->getValue();
            $agama=$worksheet->getCellByColumnAndRow(7, $row)->getValue();
            $stts=$worksheet->getCellByColumnAndRow(8, $row)->getValue();
            $shdk=$worksheet->getCellByColumnAndRow(9, $row)->getValue();
            $shdrt=$worksheet->getCellByColumnAndRow(10, $row)->getValue();
            $pendidikan=$worksheet->getCellByColumnAndRow(11, $row)->getValue();
            $pekerjaan=$worksheet->getCellByColumnAndRow(12, $row)->getValue();
            $ibu=$worksheet->getCellByColumnAndRow(13, $row)->getValue();
            $ayah=$worksheet->getCellByColumnAndRow(14, $row)->getValue();
            $nokk=$worksheet->getCellByColumnAndRow(15, $row)->getValue();
            $namakk=$worksheet->getCellByColumnAndRow(16, $row)->getValue();
            $alamat=$worksheet->getCellByColumnAndRow(17, $row)->getValue();
            $prov=$worksheet->getCellByColumnAndRow(18, $row)->getValue();
            $nokota=$worksheet->getCellByColumnAndRow(19, $row)->getValue();
            $kota=$worksheet->getCellByColumnAndRow(20, $row)->getValue();
            $kec=$worksheet->getCellByColumnAndRow(21, $row)->getValue();
            $nokel=$worksheet->getCellByColumnAndRow(22, $row)->getValue();
            $namakel=$worksheet->getCellByColumnAndRow(23, $row)->getValue();
            $rw=$worksheet->getCellByColumnAndRow(24, $row)->getValue();
            $rt=$worksheet->getCellByColumnAndRow(25, $row)->getValue();



            $data[] = array(


            'nik' =>  $nik,
            'nama' => $nama,
            'jk' =>   $jk,
            'tempat_lahir'  =>  $ttl,
            'tanggal' =>      $tanggal,
            'umur' =>           $umur,
            'gdr' =>            $gdr,
            'agama' =>          $agama,
            'stts' =>           $stts,
            'shdk'  =>          $shdk,
            'shdrt' =>          $shdrt,
            'pddk_akhir'  =>    $pendidikan,
            'pekerjaan'  =>     $pekerjaan,
            'nama_ibu' =>       $ibu,
            'nama_ayah' =>      $ayah,
            'no_kk'  =>         $nokk,
            'nama_kk'  =>    $namakk,
            'alamat' =>      $alamat,
            'provinsi'  =>   $prov,
            'no_kota'  =>    $nokota,
            'nama_kota'  =>  $kota,
            'nama_kec'  =>   $kec,
            'no_kel'  =>     $nokel,
            'nama_kel'  =>   $namakel,
            'rw'  =>    $rw,
            'rt'  =>    $rt

            );
            }
        }
        $this->excel_import_model->insert($data);
        echo 'Data Imported successfully';
        
        
        } 
        }
















        
}

?>