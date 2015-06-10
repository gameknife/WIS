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
        if ($query->num_rows() > 0) {
            $info = (array)$query->row_array();

            $info['words'] = $TABLE['words'];
            $info['edittime'] = date("Y-m-d h:i:s");
            $info['changetime'] = $info['changetime'] + 1;

            $this->db->where('id', $info['id']);
            $this->db->update("words", $info);
            //$this->db->set();

            return $info['id'];
        } else {
            $info['words'] = $TABLE['words'];
            $info['edittime'] = date("Y-m-d h:i:s");
            $info['changetime'] = $info['changetime'] + 1;

            $this->db->insert("words", $info);
            return $this->db->insert_id();
        }


    }

    function insert_new_video($TABLE)
    {
        $cmd = '';
        // add file
        $this->db->select('*');
        $this->db->where('id', $TABLE['id']);
        $this->db->limit(1);
        $this->db->from('words');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $info = (array)$query->row_array();

            $config["upload_path"] = "./upload";
            $config["max_size"] = 1024000000000000000;
            $config["allowed_types"] = "gif|jpg|png|mp3|ogv|ogg|mp4|rmvb|avi|wmv|JPG|mov";
            $config["encrypt_name"] = TRUE;

            $this->load->library('upload', $config);

            //var_dump($TABLE['id']);

            if ($this->upload->do_upload('video')) {
                $data = $this->upload->data();
                $urls = "/upload/" . $data['file_name'];
                // make mp4 file name
                $pos = strripos($urls, '.');
                $purefile = substr($urls, 0, $pos);

                // first delete previous mov and mp4
                {
                    $old_url = $info['video'];
                    $post = strripos($old_url, '.');
                    $purefilet = substr($old_url, 0, $post);

                    $cmd = 'rm ' . '/alidata/www/default' . $purefilet . '.*';

                    exec($cmd, $status);
                }

                // db url use new mp4 file
                $info['video'] = $purefile . '.mp4';
                $info['edittime'] = date("Y-m-d h:i:s");
                $info['changetime'] = $info['changetime'] + 1;

                $this->db->where('id', $info['id']);
                $this->db->update("words", $info);

                // mv file to tmp place
                $orgfile = '/alidata/www/default' . $urls;
                $tmpfile = '/alidata/www/default' . $urls . '.tmp';
                exec('mv ' . $orgfile . $tmpfile, $status);

                // make the ffmpeg cmdline and return
                $cmd = 'ffmpeg -i ' . $tmpfile . ' -vcodec libx264 -vpre libx264-medium -b 400k ' . '/alidata/www/default' . $purefile . '.mp4';

            } else {
                $error = array("error" => $this->upload->display_errors());
                var_dump($error);
            }

            return $cmd;
        }


        //return $this->db->insert_id();
    }

    function get_words($name)
    {
        $this->db->select('words');
        $this->db->where('name', $name);
        $this->db->limit(1);
        $this->db->from('words');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }

        return null;
    }

    function get_form($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $this->db->from('words');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }

        return null;
    }

    function get_all_forms()
    {
        $this->db->select('*');
        $this->db->from('words');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return (array)$query->result();
        }

        return null;
    }

}

?>