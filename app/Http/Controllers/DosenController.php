<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Dosen;
use App\Pengguna;

class dosencontroller extends Controller
{
   protected $informasi = 'Gagal melakukan aksi';
    public function awal(){
      //return "Data Mahasiswa";
      $semuaDosen = Dosen::all();
      return view('dosen.awal', compact('semuaDosen'));
   }
   public function tambah()
   {
      return view('dosen.tambah');
   }
   public function simpan(Request $input)
   {
      $pengguna = new Pengguna($input->only('username','password'));
      if ($pengguna->save()) {
         $dosen = new Dosen();
         $dosen->nama = $input->nama;
         $dosen->nip = $input->nip;
         $dosen->alamat = $input->alamat;
         if($pengguna->dosen()->save($dosen)) $this->informasi = 'Berhasil Simpan Data';
         }
         return redirect('dosen')->with(['informasi'=>$this->informasi]);
      
   }

   public function edit($id){
      $dosen = Dosen::find($id);
      return view('dosen.edit')->with(array('dosen'=>$dosen));
   }

   public function lihat($id){
      $dosen = Dosen::find($id);
      return view('dosen.lihat')->with(array('dosen'=>$dosen));
   }

   public function update($id, Request $input){
      $dosen = Dosen::find($id);
      $pengguna = $dosen->pengguna;
      $dosen->nama = $input->nama;
      $dosen->nip = $input->nip;  
      $dosen->alamat = $input->alamat;
      $dosen->save();
      if(!is_null($input->username)){
         $pengguna->fill($input->only('username'));
         if(!empty($input->password)){
            $pengguna->password = $input->password;
         }
      if($pengguna->save()){
         $this->informasi = 'berhasil simpan data';
      }else{
         $this->informasi = 'gagal simpan data';
       }
      }
      return redirect('dosen')->with(['informasi'=>$this->informasi]);
   }

   public function hapus($id){
      $dosen = Dosen::find($id);
      if($dosen->pengguna()->delete()){
         if($dosen->delete()){
            $this->informasi = 'berhasil hapus data';
         }
      }
      return redirect('dosen')->with(['informasi'=>$this->informasi]);
   }

}

