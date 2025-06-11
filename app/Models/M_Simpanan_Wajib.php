<?php
namespace App\Models;
use CodeIgniter\Model;
 
class M_Simpanan_Wajib extends Model
{
    protected $table = 'tbl_simpanan_wajib';
 
    public function getDataAnggota($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_sim_w','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_sim_w','ASC');
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
        $builder->select("id_sim_w");
        $builder->orderBy("id_sim_w", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>