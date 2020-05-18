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
                $this->db->query("INSERT INTO `tbl_user`(`usuario`, `contra`, `nombrereal`, `correo`, `foto`) VALUES ('$usuario','$contracifrada','$nombre','$correo','unknown.png')");
        }

        public function edit_user_changepass($id,$nombre,$correo,$usuario,$contra){
                $contracifrada = password_hash($contra, PASSWORD_BCRYPT);
                $this->db->query("UPDATE `tbl_user` SET `usuario`='$usuario',`contra`='$contracifrada',`nombrereal`='$nombre',`correo`='$correo' WHERE `id`=$id");
        }

        public function edit_user_samepass($id,$nombre,$correo,$usuario){
                $this->db->query("UPDATE `tbl_user` SET `usuario`='$usuario',`nombrereal`='$nombre',`correo`='$correo' WHERE `id`=$id");
        }

        public function get_comments(){
                $query = $this->db->query("SELECT tbl_contacto.* from tbl_contacto ");
                return $query->result_array();
        }

        public function update_photo($id,$foto){
                $this->db->query("UPDATE `tbl_user` SET `foto`='$foto' WHERE `id`=$id");
        }

        public function get_secciones(){
                $query = $this->db->query("SELECT tbl_seccion.* from tbl_seccion ");
                return $query->result_array();
        }

        public function get_seccion($id){
                $query = $this->db->query("SELECT tbl_seccion.* from tbl_seccion WHERE  `id`=$id");
                return $query->result_array();
        }

        public function set_seccion($titulo,$detalle){
                $this->db->query("INSERT INTO `tbl_seccion`(`nombre`,`banner`, `texto`, `tipo`) VALUES ('$titulo','unknown.png','$detalle',1)");
        }

        public function delete_seccion($id){
                $this->db->query("DELETE FROM `tbl_seccion` WHERE `id` = $id");
        }

        public function update_seccion($id,$titulo,$detalle){
                $this->db->query("UPDATE `tbl_seccion` SET `nombre`='$titulo',`texto`='$detalle' WHERE `id`=$id");
        }

        public function update_banner($id,$banner){
                $this->db->query("UPDATE `tbl_seccion` SET `banner`='$banner' WHERE `id`=$id");
        }

        public function create_servicio($nombre,$desccorta,$desc){
                $this->db->query("INSERT INTO `tbl_servicio`(`nombre`,`descripcion`, `descripcioncorta`) VALUES ('$nombre','$desc','$desccorta')");
        }

        public function update_servicio($id,$nombre,$desccorta,$desc){
                $this->db->query("UPDATE `tbl_servicio` SET `nombre`='$nombre',`descripcion`='$desc',`descripcioncorta`='$desccorta' WHERE `id`=$id");
        }

        public function delete_servicio($id){
                $this->db->query("DELETE FROM `tbl_servicio` WHERE `id` = $id");
        }

        public function create_imagen($nombre,$descripcion){
                $this->db->query("INSERT INTO `tbl_galeria`(`nombre`,`descripcion`) VALUES ('$nombre','$descripcion')");
        }

        public function update_imagen($id,$nombre,$descripcion){
                $this->db->query("UPDATE `tbl_galeria` SET `nombre`='$nombre',`descripcion`='$descripcion' WHERE `id`=$id");
        }

        public function delete_imagen($id){
                $this->db->query("DELETE FROM `tbl_galeria` WHERE `id` = $id");
        }

        public function count_imagen(){
                $query = $this->db->query("SELECT COUNT(tbl_galeria.id) as cantidad FROM `tbl_galeria`");
                return $query->result_array();
        }
}
