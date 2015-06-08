<?php
class Wordsmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		// link db
		$this->load->database();
	}
	
	function insert_new_form($TABLE)
	{
		$info['name'] = $TABLE['name'];
        $info['changetime'] = 0;

        $this->db->select('*');
        $this->db->where('name', $TABLE['name']);
        $this->db->limit(1);
        $this->db->from('words');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $info = (array)$query->row_array();

            $info['words'] = $TABLE['words'];
            $info['edittime'] = date("Y-m-d h:i:s");
            $info['changetime'] = $info['changetime'] + 1;

            $this->db->where('id',$info['id']);
            $this->db->update("words", $info);
            //$this->db->set();

            return $info['id'];
        }
        else
        {
            $info['words'] = $TABLE['words'];
            $info['edittime'] = date("Y-m-d h:i:s");
            $info['changetime'] = $info['changetime'] + 1;

            $this->db->insert("words", $info);
            return $this->db->insert_id();
        }



	}

    function insert_new_video($TABLE)
    {
        // add file
        $this->db->select('*');
        $this->db->where('id', $TABLE['id']);
        $this->db->limit(1);
        $this->db->from('words');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $info = (array)$query->row_array();

            $config["upload_path"] = "./upload";
            //$config["max_size"] = 1024000000000000000;
            $config["allowed_types"] = "gif|jpg|png|mp3|ogv|ogg|mp4|rmvb|avi|wmv|JPG|mov";
            $config["encrypt_name"] = TRUE;

            $this->load->library('upload', $config);

            //var_dump($TABLE['id']);

            if( $this->upload->do_upload('video') )
            {
                //echo("file uploaded");
                $data = $this->upload->data();
                $urls = "/upload/".$data['file_name'];

                $info['video'] = $urls;
                $info['edittime'] = date("Y-m-d h:i:s");
                $info['changetime'] = $info['changetime'] + 1;

                $this->db->where('id',$info['id']);
                $this->db->update("words", $info);
            }
            else
            {
                $error = array("error"=>$this->upload->display_errors());
                var_dump($error);
            }
        }




        //return $this->db->insert_id();
    }
	
	function get_form($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$this->db->from('words');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		
		return null;
	}
	
	function get_all_forms()
	{
		$this->db->select('*');
		$this->db->from('words');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			return (array)$query->result();
		}
		
		return null;
	}

}
?>