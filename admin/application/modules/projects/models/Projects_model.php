<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Projects_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_itemlist($field = '', $order = 'desc') {
        $this->db->select('pj.*,admin_users.full_name as updated_name');
        $this->db->from('projects as pj');
        $this->db->join('admin_users', 'admin_users.user_id = pj.updated_id', 'left');
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemlist_register($field = '', $order = 'desc', $project_id = '') {
        $this->db->select('pr.*,pb.name_th as budget_name');
        $this->db->from('projects_register as pr');
        $this->db->join('projects_budget as pb', 'pr.budget = pb.id', 'left');
        $this->db->where('pr.project_id', $project_id);
        $this->db->order_by($field, $order);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_budget($id = '') {
        $this->db->select('*');
        $this->db->from('projects_budget');
        $this->db->where('project_id', $id);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_itemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_seoitemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects_seo');
            $this->db->where('project_id', $id);
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
            $this->db->from('projects_media');
            $this->db->where('media_type', $type);
            $this->db->where('project_id', $id);
            $this->db->order_by('Sequence', 'asc');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function get_progressimgitem($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects_progress_img');
            $this->db->where('project_id', $id);
            $this->db->order_by('Sequence', 'asc');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            return [];
        }
    }

    public function get_planitem($id = '', $type = 0) {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects_plan');
            $this->db->where('plan_type', $type);
            $this->db->where('project_id', $id);
            $query = $this->db->get();
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function get_planiteminfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects_plan');
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_progreeitem($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects_progress');
            $this->db->where('project_id', $id);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_progress_work($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects_progress_work');
            $this->db->where('project_id', $id);
            $this->db->order_by('id', 'asc');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function get_galleryitemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects_media');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $this->db->order_by('Sequence', 'asc');
            $query = $this->db->get();
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_progreeimgitemtinfo($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects_progress_img');
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
            $this->db->delete('projects', array('id' => $id));
            $this->db->delete('projects_seo', array('project_id' => $id));
            //$this->db->delete('projects_plan', array('project_id' => $id));
            $this->db->delete('projects_progress', array('project_id' => $id));
            $this->db->delete('projects_progress_work', array('project_id' => $id));
            $this->db->delete('projects_progress_img', array('project_id' => $id));
            //$this->db->delete('projects_budget', array('project_id' => $id));
            $this->db->delete('projects_media', array('project_id' => $id));
            return true;
        else:
            return false;
        endif;
    }

    public function buddelete($id = '') {
        if ($id != ''):
            $this->db->delete('projects_budget', array('id' => $id));
            return true;
        else:
            return false;
        endif;
    }

    public function delete_re($id = '') {
        if ($id != ''):
            $this->db->delete('projects_register', array('id' => $id));
            return true;
        else:
            return false;
        endif;
    }

    public function delete_media($id = '') {
        if ($id != ''):
            $data = $this->get_galleryitemtinfo($id);
            if ($data) {
                if ($data['media_type'] == 0) {
                    @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/image_gallery/' . $data['file_path']);
                } else {
                    @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/video_gallery/' . $data['file_path']);
                }
                $this->db->delete('projects_media', array('id' => $id));
            }
            return true;
        else:
            return false;
        endif;
    }

    public function delete_media_progress($id = '') {
        if ($id != ''):
            $data = $this->get_progreeimgitemtinfo($id);
            if ($data) {
                @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/progress/' . $data['file_path']);
                $this->db->delete('projects_progress_img', array('id' => $id));
            }
            return true;
        else:
            return false;
        endif;
    }

    public function delete_floorplan($id = '') {
        if ($id != ''):
            $data = $this->get_planiteminfo($id);
            if ($data) {
                if ($data['plan_type'] == 0) {
                    @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/floorplan/' . $data['plan_image']);
                } else {
                    @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/roomplan/' . $data['plan_image']);
                }
                $this->db->delete('projects_plan', array('id' => $id));
            }
            return true;
        else:
            return false;
        endif;
    }

    public function delete_mapimg($id = '') {
        if ($id != ''):
            $data = $this->get_itemtinfo($id);
            if ($data) {
                @unlink(dirname($_SERVER["SCRIPT_FILENAME"]) . '/uploads/projects/' . $data['map_image']);
                //$this->db->delete('projects_progress_img', array('id' => $id));
                $this->db->where('ID', $id);
                $this->db->update('projects', array('map_image' => ''));
            }
            return true;
        else:
            return false;
        endif;
    }

    public function get_vdotem($file = '', $sec = '10') {
        if ($file) {
            $thumb_nail = str_replace(['.mp4', '.avi', '.flv'], '', 'thumbnail_' . $file . '.png');
            $target_thumb = dirname($_SERVER["SCRIPT_FILENAME"]) . '/../uploads/video_gallery/';
            $full_target_name = $target_thumb . $thumb_nail;
            $ffmpeg = FFMpeg\FFMpeg::create([
                        'ffmpeg.binaries' => '/usr/local/Cellar/ffmpeg/4.1.4_1/bin/ffmpeg', // the path to the FFMpeg binary
                        'ffprobe.binaries' => '/usr/local/Cellar/ffmpeg/4.1.4_1/bin/ffprobe', // the path to the FFProbe binary
                        'timeout' => 3600, // the timeout for the underlying process
                        'ffmpeg.threads' => 12, // the number of threads that FFMpeg should use
            ]);
            $video = $ffmpeg->open(dirname($_SERVER["SCRIPT_FILENAME"]) . '/../uploads/video_gallery/' . $file);
            $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($sec));
            if (!file_exists($full_target_name)) {
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

    public function get_projectname($id = '') {
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->from('projects');
            $this->db->where('id', $id);
            $query = $this->db->get();
            $row = $query->row_array();
            return $row['name_th'];
        } else {
            return null;
        }
    }

}
