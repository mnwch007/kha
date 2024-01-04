<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_itemlist($field = '', $order = 'desc') {
        $this->db->select('news.*,admin_users.full_name as updated_name,(Select file_path From news_media Where news_id=news.id Order by RAND() Limit 1)Image2');
        $this->db->from('news');
        $this->db->join('admin_users', 'admin_users.user_id = news.updated_id', 'left');
        $this->db->where('news.ntype', 0);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('news');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_galleryitem($id = '', $type = 0) {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('news_media');
            #$this->db->where('media_type', $type);
            $this->db->where('news_id', $id);
            $this->db->order_by('Sequence', 'asc');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function get_galleryitemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('news_media');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $this->db->order_by('Sequence', 'asc');
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function delete($id = '') {
        if ($id != ''):
            $this->db->delete('news', array('id' => $id));
            return true;
        else:
            return false;
        endif;
    }

    public function delete_re($id = '') {
        if ($id != ''):
            $this->db->delete('news_media', array('id' => $id));
            return true;
        else:
            return false;
        endif;
    }

    public function delete_media($id = '') {
        if ($id != ''):
            $data = $this->get_galleryitemtinfo($id);
            if($data) {
                if($data['media_type'] == 0) {
                    @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/news/' . $data['file_path']);
                } else {
                    @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/news/' . $data['file_path']);
                }
                $this->db->delete('news_media', array('id' => $id));
            }
            return true;
        else:
            return false;
        endif;
    }

    public function get_vdotem($file = '', $sec = '10') {
        if($file) {
            $thumb_nail = str_replace(['.mp4','.avi','.flv'], '', 'thumbnail_' . $file . '.png');
            $target_thumb = dirname($_SERVER["SCRIPT_FILENAME"]) . '/../uploads/news/';
            $full_target_name = $target_thumb . $thumb_nail;
            $ffmpeg = FFMpeg\FFMpeg::create([
                'ffmpeg.binaries'  => '/usr/local/Cellar/ffmpeg/4.1.4_1/bin/ffmpeg', // the path to the FFMpeg binary
                'ffprobe.binaries' => '/usr/local/Cellar/ffmpeg/4.1.4_1/bin/ffprobe', // the path to the FFProbe binary
                'timeout'          => 3600, // the timeout for the underlying process
                'ffmpeg.threads'   => 12,   // the number of threads that FFMpeg should use
            ]);
            $video = $ffmpeg->open(dirname($_SERVER["SCRIPT_FILENAME"]) . '/../uploads/news/' . $file);
            $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
            if(!file_exists($full_target_name)) {
                $frame->save($full_target_name);
            } else {
                @unlink($full_target_name);
                $frame->save($full_target_name);
            }
            return $thumb_nail;
        } else {
            return null;
        }
        
    }

}
