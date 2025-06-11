<?php
namespace App\Models;
use CodeIgniter\Model;
 
class M_Simpanan_Sukarela extends Model
{
    protected $table = 'tbl_simpanan_sukarela';
 
    public function getDataAnggota($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_sim_s','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_sim_s','ASC');
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
        $builder->select("id_sim_s");
        $builder->orderBy("id_sim_s", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>