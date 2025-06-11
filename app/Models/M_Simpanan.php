<?php
namespace App\Models;
use CodeIgniter\Model;
 
class M_Simpanan extends Model
{
    protected $table = 'tbl_anggota_s';
 
    public function getDataAnggota($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('nama','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('nama','ASC');
            return $query = $builder->get();
        }
    }
    
    public function saveDataAnggota($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataAnggota($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }
    
    public function autoNumber() {
        $builder = $this->db->table($this->table);
        $builder->select("id_simpanan");
        $builder->orderBy("id_simpanan", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
    public function getTotalAnggotaS()
    {
        return $this->where('status', '0')->countAllResults();
    }
    public function getTotalSimpanan()
    {
        return $this->where('status', '0')->selectSum('total')->first()['total'];
    }
}
?>