<?php
date_default_timezone_set('Asia/Manila');

class User
{
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    // Registration of Account
    public function register($data)
    {
        $this->db->query("INSERT INTO users (firstname, lastname, middlename, address, city, region, zip, contact, email, password, is_verify, image)
        VALUES (:firstname, :lastname, :middlename, :address, :city, :region, :zip, :contact, :email, :password, :is_verify, :image)");
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':middlename', $data['middleInitial']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':region', $data['state']);
        $this->db->bind(':zip', $data['zip']);
        $this->db->bind(':zip', $data['zip']);
        $this->db->bind(':contact', $data['contact']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':is_verify', '0');
        $this->db->bind(':image', $data['path']);
        // Execute query. Return the last row
        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    // One time password for verification of account
    public function oneTimePassword($id)
    {
        $this->db->query("INSERT INTO account_verification (user_id, verification_code, otp_expiry) VALUES (:id, :code, :date)");
        $this->db->bind(":id", $id);
        $this->db->bind(":code", substr(number_format(time() * rand(), 0, '', ''), 0, 6));
        $this->db->bind(":date", date("Y/m/d H:i:s", strtotime("+30 minutes")));

        // Execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // fetch the otp 
    public function findOneTimePasswordById($id)
    {
        $this->db->query("SELECT * FROM account_verification WHERE user_id = :id");
        $this->db->bind(":id", $id);
        return $row = $this->db->single();
    }

    // fetch the account to verify using specific id
    public function findUserVerificationCodeByID($id)
    {
        $this->db->query("SELECT * FROM account_verification WHERE user_id = :id");
        $this->db->bind(":id", $id);
        return $row = $this->db->single();
    }

    // Update the status if the account is verified
    public function updateAccountStatus($id)
    {
        $this->db->query("UPDATE users SET is_verify = :status WHERE id = :id");
        $this->db->bind(':status', 1);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by email using email data passed in by Controller
    public function findUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email and is_verify = :status");
        $this->db->bind(":email", $email);
        $this->db->bind(":status", 1);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Find specific Using ID
    public function findUserById($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $row = $this->db->single();
    }

    // Login user function
    public function login($email, $password)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email AND is_verify = :status");
        $this->db->bind(':email', $email);
        $this->db->bind(':status', 1);
        $row = $this->db->single();

        if ($row) {
            $hashedPassword = $row->password;
        } else {
            $hashedPassword = $password;
        }

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }


    // =============== ADMIN ===================//

    // Login admin function
    public function adminLogin($email, $password)
    {
        $this->db->query("SELECT * FROM admin WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if ($row) {
            $hashedPassword = $row->password;
        } else {
            $hashedPassword = $password;
        }

        // Execute
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    // Get Admin Profile
    public function getAdminProfileById($id)
    {
        $this->db->query("SELECT * FROM admin WHERE id = :id");
        $this->db->bind(':id', $id);
        return $row = $this->db->single();
    }

    // Update amin profile function
    public function updateAdminProfile($data)
    {
        $this->db->query("UPDATE admin SET firstname = :firstname, lastname = :lastname, 
        username = :username, contact = :contact, email = :email, image = :image WHERE id = :id");
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':contact', $data['contact']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':image', $data['path']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}