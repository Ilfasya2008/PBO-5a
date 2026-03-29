<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sederhana OOP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }
        .form-group {
            margin-bottom: 15px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        textarea {
            resize: vertical;
            height: 80px;
        }
        .btn-submit {
            background-color: #4285F4;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
            font-size: 14px;
        }
        .btn-submit:hover {
            background-color: #3367D6;
        }
        .result-container {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
        }
    </style>
</head>
<body>

<div class="form-container">
    <form method="POST" action="">
        <div class="form-group">
            <input type="text" name="firstname" placeholder="Firstname" required>
        </div>
        <div class="form-group">
            <input type="text" name="lastname" placeholder="Lastname" required>
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
            <textarea name="address" placeholder="Address" required></textarea>
        </div>
        <button type="submit" class="btn-submit">Submit</button>
    </form>

    <?php
    // Deklarasi Class (Hanya boleh satu kali dalam satu file/scope)
    class UserProfile {
        private $firstName;
        private $lastName;
        private $phone;
        private $address;

        public function __construct($firstName, $lastName, $phone, $address) {
            $this->firstName = htmlspecialchars($firstName);
            $this->lastName  = htmlspecialchars($lastName);
            $this->phone     = htmlspecialchars($phone);
            $this->address   = htmlspecialchars($address);
        }

        public function printProfile() {
            echo "<div class='result-container'>";
            echo "<strong>Hi, my name is " . $this->firstName . " " . $this->lastName . "</strong><br>";
            echo "Phone Number : " . $this->phone . "<br>";
            echo "Address : " . $this->address . "<br>";
            echo "</div>";
        }
    }

    // Proses Data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname   = $_POST['firstname'];
        $lname   = $_POST['lastname'];
        $phone   = $_POST['phone'];
        $address = $_POST['address'];

        $user = new UserProfile($fname, $lname, $phone, $address);
        $user->printProfile();
    }
    ?>
</div>

</body>
</html>