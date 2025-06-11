<?php
namespace App\Models;
use CodeIgniter\Model;
 
class M_Angsuran extends Model
{
    protected $table = 'tbl_angsuran';
 
    public function getDataAnggota($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('id_angsuran','ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('id_angsuran','ASC');
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
        $builder->select("id_angsuran");
        $builder->orderBy("id_angsuran", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
	}
}
?>