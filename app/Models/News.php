<?php

namespace App\Models;

use CodeIgniter\Model;

class News extends Model
{
    protected $table      = 'news';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    /**
     * Method untuk mengambil data sebuah kolom (sesuai input diparameter)
     * dari tabel 'news' yang diurutkan secara descending berdasarkan 
     * kolom 'tanggalupload'
     * 
     * parameter $column type string
     * return array
     */
    public function getNewss_Order_TglUpload($column)
    {
        return $this->orderBy('tanggalUpload', 'DESC')->findColumn($column);
    }

    /**
     * Method untuk mengambil data sebuah baris dari tabel 'news' 
     * berdasarkan id yang diinputkan di parameter. lalu mengambil
     * kolom sesuai column yang diinputkan di parameter
     * 
     * parameter $id type string
     * parameter $column type string
     * return string
     */
    public function getNews_by_id($id, $column)
    {
        return $this->where('id', $id)->first()[$column];
    }

    public function getNewssOrderTglUpdload()
    {
        return $this->orderBy('tanggalUpload', 'DESC')->findAll();
    }

    public function search($keyword, $bulan = '', $tahun = '')
    {
        if ($bulan && $tahun) {
            return $this
                ->groupStart()
                ->where('MONTH(tanggalUpload)', $bulan)
                ->where('YEAR(tanggalUpload)', $tahun)
                ->groupEnd()
                ->groupStart()
                ->like('judul', $keyword, 'both')
                ->orLike('isi', $keyword, 'both')
                ->orLike('tanggalUpload', $keyword, 'both')
                ->groupEnd()
                ->findAll();
        } else if ($tahun) {
            return $this
                ->groupStart()
                ->where('YEAR(tanggalUpload)', $tahun)
                ->groupEnd()
                ->groupStart()
                ->like('judul', $keyword, 'both')
                ->orLike('isi', $keyword, 'both')
                ->orLike('tanggalUpload', $keyword, 'both')
                ->groupEnd()
                ->findAll();
        } else if ($bulan) {
            return $this
                ->groupStart()
                ->where('MONTH(tanggalUpload)', $bulan)
                ->groupEnd()
                ->groupStart()
                ->like('judul', $keyword, 'both')
                ->orLike('isi', $keyword, 'both')
                ->orLike('tanggalUpload', $keyword, 'both')
                ->groupEnd()
                ->findAll();
        } else {
            return $this->like('judul', $keyword, 'both')->orLike('isi', $keyword, 'both')->orLike('tanggalUpload', $keyword, 'both')->findAll();
        }
    }

    public function filter_date($bulan, $tahun, $search = '')
    {
        $date = $tahun . '-' . $bulan;
        if ($search) {
            return $this->like('tanggalUpload', $date, 'both')->like('judul', $search, 'both')->orLike('isi', $search, 'both')->orLike('tanggalUpload', $search, 'both')->findAll();
        } else {
            return $this->like('tanggalUpload', $date, 'both')->findAll();
        }
    }
}
