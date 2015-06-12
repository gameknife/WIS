<?php
/**
 * Created by PhpStorm.
 * User: gameKnife
 * Date: 2015/6/10
 * Time: 1:13
 */
class Guestmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        // link db
        $this->load->database();
    }

    public function get_all_name()
    {
        $this->db->select('*');
        $this->db->from('guest');
        $this->db->order_by('logcount','DESC');
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return (array)$query->result();
        }

        return null;
    }

    public function add_login_time($name)
    {
        $this->db->select('*');
        $this->db->where('name', $name);
        $this->db->limit(1);
        $this->db->from('guest');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $info = (array)$query->row_array();
            $info['logcount'] = $info['logcount'] + 1;

            $this->db->where('name', $name);
            $this->db->update("guest", $info);
        }
    }
}
?>