<?php

class Admin_model extends CI_Model
{

        public function get_users()
        {
                $query = $this->db->query("SELECT tbl_user.* from tbl_user ");
                return $query->result_array();
        }

        public function create_user($nombre,$correo,$usuario,$contra){
                $contracifrada = password_hash($contra, PASSWORD_BCRYPT);
                $query = $this->db->query("INSERT INTO `tbl_user`(`usuario`, `contra`, `nombrereal`, `correo`, `foto`) VALUES ('$usuario','$contracifrada','$nombre','$correo','unknown.png')");
        }

        public function edit_user_changepass($id,$nombre,$correo,$usuario,$contra){
                $contracifrada = password_hash($contra, PASSWORD_BCRYPT);
                $query = $this->db->query("UPDATE `tbl_user` SET `usuario`='$usuario',`contra`='$contracifrada',`nombrereal`='$nombre',`correo`='$correo' WHERE `id`=$id");
        }

        public function edit_user_samepass($id,$nombre,$correo,$usuario){
                $query = $this->db->query("UPDATE `tbl_user` SET `usuario`='$usuario',`nombrereal`='$nombre',`correo`='$correo' WHERE `id`=$id");
        }

        public function get_comments(){
                $query = $this->db->query("SELECT tbl_contacto.* from tbl_contacto ");
                return $query->result_array();
        }

        public function update_photo($id,$foto){
                $query = $this->db->query("UPDATE `tbl_user` SET `foto`='$foto' WHERE `id`=$id");
        }
}
