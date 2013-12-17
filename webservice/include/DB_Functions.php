<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $password) {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        $result = mysql_query("INSERT INTO users(unique_id, name, email, encrypted_password, salt, created_at) VALUES('$uuid', '$name', '$email', '$encrypted_password', '$salt', NOW())");
        // check for successful store
        if ($result) {
            // get user details 
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM users WHERE uid = $uid");
            // return user details
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }
	
	/**
     * Storing pemakaian
     * returns user details
     */
    public function storePemakaian($no_cus, $tanggal, $gambar, $stand_akhir, $petugas) {
		/* untuk nilai harga*/
		$cust = mysql_fetch_array(mysql_query("select * from cust where id = '$no_cus'"));
		$gol = $cust['gol'];
		$query_pakai = mysql_query("select max(stand_akhir) stand_akhir from pemakaian where nomor_meter = '$no_cus'");
		$pakai = mysql_fetch_array($query_pakai);
		$admin = mysql_fetch_array(mysql_query("select biaya_admin from adm"));
		$diameter = $cust['diameter_pipa'];
		$pemeliharaan = mysql_fetch_array(mysql_query("select * from pemeliharaan where diameter_pipa = '$diameter'"));
		$biaya_pemeliharaan = $pemeliharaan['biaya_pemeliharaan'];
		$biaya_admin = $admin['biaya_admin'];
		$no_of_rows = mysql_num_rows($query_pakai);
		if ($no_of_rows > 0) {
			$selisih = $stand_akhir - $pakai['stand_akhir'];
			$stand_awal = $pakai['stand_akhir'];
		} else {
			$selisih = $stand_akhir;
			$stand_awal = 0;
		}
		
		$hitung = mysql_fetch_array(mysql_query("select * from golongan where '$selisih' between meter1 and meter2 and golongan = '$gol'"));
		$biaya_pemakaian = $hitung['HARGA'] * $selisih;
		$total_biaya = $biaya_pemakaian + $biaya_admin + $biaya_pemeliharaan;
		/****/
        $result = mysql_query("INSERT INTO pemakaian(nomor_meter, tanggal, gambar, stand_awal, stand_akhir,biaya_pemakaian,biaya_admin,biaya_pemeliharaan,total_biaya,id_petugas)
								VALUES('$no_cus', '$tanggal', '$gambar', '$stand_awal', '$stand_akhir','$biaya_pemakaian','$biaya_admin','$biaya_pemeliharaan','$total_biaya','$petugas')");
        // check for successful store
        if ($result) {
            // get user details 
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM pemakaian WHERE id_pemakaian = $uid");
            // return user details
            return mysql_fetch_array($result);
        } else {
            return false;
        }
    }
	
	/**
     * check customer
     * returns customer details
     */
    public function isLocationExisted($id, $cek) {
		if ($cek == 1){
			$result = mysql_query("SELECT * from cust WHERE id = '$id'");
			$no_of_rows = mysql_num_rows($result);
			if ($no_of_rows > 0) {
				// cust existed 
				return true;
			} else {
				// cust not existed
				return false;
			}
		}else{
			$result = mysql_query("SELECT * FROM cust WHERE id = $id");
            // return user details
            return mysql_fetch_array($result);
		}
    }
	
    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {
        $result = mysql_query("SELECT * FROM users WHERE email = '$email'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }
	
	/**
     * Get user by name and password
     */
    public function getUserByNameAndPassword($name, $password) {
        $result = mysql_query("SELECT * FROM users WHERE name = '$name'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
            $salt = $result['salt'];
            $encrypted_password = $result['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }
	
    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT email from users WHERE email = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

}

?>
