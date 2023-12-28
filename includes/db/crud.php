<?php
class crud
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertAttendees($fname, $lname, $dob, $email, $contact, $choice, $gender, $avatar_path)
    {
        try {
            $sql = "INSERT INTO student_attendee (firstname, lastname, dateofbirth, email, contactnumber, choice_id, gender_id, avatar_path) 
                    VALUES (:fname, :lname, :dob, :email, :contact, :choice, :gender, :avatar_path)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':choice', $choice);
            $stmt->bindparam(':avatar_path', $avatar_path);
            $stmt->bindparam(':gender', $gender);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $choice, $gender)
    {
        try {
            $sql = "UPDATE `student_attendee` SET `firstname`= :fname, `lastname`= :lname, `dateofbirth`= :dob, 
                    `email`= :email, `contactnumber`= :contact, `choice_id`= :choice, `gender_id`= :gender 
                    WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':choice', $choice);
            $stmt->bindparam(':gender', $gender);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendees()
    {
        try {
            $sql = "SELECT a.*, s.name, g.gen FROM student_attendee a 
                    INNER JOIN choices s ON a.choice_id = s.choice_id
                    LEFT JOIN genders g ON a.gender_id = g.gender_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function checkEmailExistence($email)
    {
        try {
            $sql = "SELECT COUNT(*) FROM student_attendee WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendeeDetails($id)
    {
        try {
            $sql = "SELECT * FROM student_attendee  a inner join choices s on a.choice_id = s.choice_id where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAttendee($id)
    {
        try {
            $sql = "DELETE FROM student_attendee WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getChoices()
    {
        try {
            $sql = "SELECT * FROM `choices`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getChoiceById($id)
    {
        try {
            $sql = "SELECT * FROM `choices` where choice_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getGenders()
    {
        try {
            $sql = "SELECT * FROM `genders`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getGenderById($id)
    {
        try {
            $sql = "SELECT * FROM `genders` WHERE gender_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
