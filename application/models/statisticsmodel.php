<?php
/**
 * Created by PhpStorm.
 * User: gameKnife
 * Date: 2015/6/10
 * Time: 1:13
 */
class Statisticsmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        // link db
        $this->load->database();
    }

    public function add_visit()
    {
        //$this->db->set('visit', )
    }

    public function add_word()
    {

    }

    public function add_video()
    {

    }

    public function get_all_visit()
    {
        $this->db->select('visit');
        $this->db->from('guest');
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $array = (array)$query->result();

            $sum = 0;

            foreach($array as $value)
            {
                $sum = $sum + $value;
            }

            return $sum;
        }

        return 0;
    }

    public function get_all_words($name)
    {

    }
}
?>