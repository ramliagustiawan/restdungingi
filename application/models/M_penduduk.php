<?php 
class M_penduduk extends CI_Model{

	function get_all_penduduk(){
		$hsl=$this->db->query("SELECT id,nik,nama,jk,tempat_lahir,DATE_FORMAT(tgl_lahir,'%d/%m/%Y') AS tanggal,umur,gdr,agama,stts,shdk,shdrt,pddk_akhir,pekerjaan,nama_ibu,nama_ayah,no_kk,nama_kk,alamat,provinsi,no_kota,nama_kota,nama_kec,no_kel,nama_kel,rw,rt FROM tbl_penduduk ORDER BY id ASC");
        return $hsl;
        
	}
	function simpan_penduduk($nik,$nama,$jk,$ttl,$tanggal,$umur,$gdr,$agama,$stts,$shdk,$shdrt,$pendidikan,$pekerjaan,$ibu,$ayah,$nokk,$namakk,$alamat,$prov,$nokota,$kota,$kec,$nokel,$namakel,$rw,$rt){
		$hsl=$this->db->query("INSERT INTO tbl_penduduk(nik,nama,jk,tempat_lahir,tgl_lahir,umur,gdr,agama,stts,shdk,shdrt,pddk_akhir,pekerjaan,nama_ibu,nama_ayah,no_kk,nama_kk,alamat,provinsi,no_kota,nama_kota,nama_kec,no_kel,nama_kel,rw,rt) VALUES ('$nik','$nama','$jk','$ttl','$tanggal','$umur','$gdr','$agama','$stts','$shdk','$shdrt','$pendidikan','$pekerjaan','$ibu','$ayah','$nokk','$namakk','$alamat','$prov','$nokota','$kota','$kec','$nokel','$namakel','$rw','$rt')");
		return $hsl;
    }
    
	function update_penduduk($kode,$nik,$nama,$jk,$ttl,$tanggal,$umur,$gdr,$agama,$stts,$shdk,$shdrt,$pendidikan,$pekerjaan,$ibu,$ayah,$nokk,$namakk,$alamat,$prov,$nokota,$kota,$kec,$nokel,$namakel,$rw,$rt){
		$hsl=$this->db->query("UPDATE tbl_penduduk SET 
        nik='$nik', nama='$nama',jk='$jk',tempat_lahir='$ttl',tgl_lahir='$tanggal',umur='$umur',gdr='$gdr',agama='$agama',stts='$stts',shdk='$shdk',shdrt='$shdrt',pddk_akhir='$pendidikan',pekerjaan='$pekerjaan',nama_ibu='$ibu',nama_ayah='$ayah',no_kk='$nokk',nama_kk='$namakk',alamat='$alamat',provinsi='$prov',no_kota='$nokota',nama_kota='$kota',nama_kec='$kec',no_kel='$nokel',nama_kel='$namakel',rw='$rw',rt='$rt' WHERE id='$kode'");
        return $hsl;
        
	}
    


	function hapus_penduduk($kode){
		$hsl=$this->db->query("DELETE FROM tbl_penduduk WHERE id ='$kode'");
        return $hsl;
        
	}

	
    
    function get_penduduk_byid($id){
		$hsl=$this->db->query("SELECT id,nik,nama,jk,tempat_lahir,DATE_FORMAT(tgl_lahir,'%d/%m/%Y') AS tanggal,umur,gdr,agama,stts,shdk,shdrt,pddk_akhir,pekerjaan,nama_ibu,nama_ayah,no_kk,nama_kk,alamat,provinsi,no_kota,nama_kota,nama_kec,no_kel,nama_kel,rw,rt FROM tbl_penduduk WHERE id='$id'");
        return $hsl;
        
	}


	
    
    function get_penduduk_home(){
		$hsl=$this->db->query("SELECT id,nik,nama,jk,tempat_lahir,DATE_FORMAT(tgl_lahir,'%d/%m/%Y') AS tanggal,umur,gdr,agama,stts,shdk,shdrt,pddk_akhir,pekerjaan,nama_ibu,nama_ayah,no_kk,nama_kk,alamat,provinsi,no_kota,nama_kota,nama_kec,no_kel,nama_kel,rw,rt FROM tbl_penduduk ORDER BY id DESC limit 10");
        return $hsl;
        
	}






}
