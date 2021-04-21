<?php

	class Note extends CI_Model {
		public function get_all() {
			return $this->db->query("SELECT * from notes")->result_array();
		}

		public function create($post) {
			date_default_timezone_set("Asia/Manila");
			$date = date("Y-m-d H:i:s");
			$query = "INSERT INTO notes (title, description, created_at, updated_at) VALUES(?,?,?,?)";
			$values = array($post['title'], $post['desc'], $date, $date);
			return $this->db->query($query, $values);
		}

		public function delete($id) {
			return $this->db->query("DELETE from notes WHERE id = ?",array($id['id']));
		}

		public function update($post){
			date_default_timezone_set("Asia/Manila");
			$date = date("Y-m-d H:i:s");
			$query = "UPDATE notes SET title = ?, description = ?, updated_at = ? WHERE id = ?";
			$values = array($post['title'], $post['desc'], $date, $post['id']);
			return $this->db->query($query, $values);
		}
	}

?>