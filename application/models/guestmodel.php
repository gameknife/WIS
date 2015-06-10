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
        $this->db->select('name');
        $this->db->from('guest');
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return (array)$query->result();
        }

        return null;
    }
}
?>