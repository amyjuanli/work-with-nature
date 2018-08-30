<?php

class DonationModel extends CI_Model {
   public function getUserByEmail($email)
   {
       $sql = 'SELECT id, firstname, insertion, lastname FROM donors WHERE email=?';
       return $this->db->query($sql, [$email])->row_array();
   }
   public function getAllByDonorID($donor_id)
   {
        $sql = 'SELECT id, longitude, latitude, squaremeter FROM donations
                WHERE donor_id = ?
                ORDER BY squaremeter DESC';
        return $this->db->query($sql, [$donor_id])->result_array();
   }
   public function totalDonationsByDonor($donor_id) {
       $sql = 'SELECT sum(squaremeter) AS total FROM donations WHERE donor_id = ?;';
       return $this->db->query($sql, [$donor_id])->row_array();
   }
   public function getDonation($id)
   {
       $sql = 'SELECT id, latitude, longitude, squaremeter FROM donations WHERE id = ?;';
       return $this->db->query($sql, [$id])->row_array();
   }

}