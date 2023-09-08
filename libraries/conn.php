<?php

    class Db {
        public $hostname,
               $username,
               $password,
               $database;

        public function __construct($hostname, $username, $password, $database)
        {  
            $this->hostname = $hostname;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        public function show($conn, $query) {
            $result = mysqli_query($conn ,$query);
            $data = [];

            while ($d = mysqli_fetch_assoc($result)) {
                $data[] = $d;
            }

            return $data;
        } 

        public function connect() {
            return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        }

        public function registerAccount($data, $conn) {
            $email = htmlspecialchars($data['email']);
            $name = htmlspecialchars($data['name']);
            $password = htmlspecialchars($data['password']);
            $confirmation_password = htmlspecialchars($data['confirmation_password']);

            // cek email already exist
            $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

            if ( mysqli_num_rows($result) === 1 ) {
                echo "
                    <script type='text/javascript'>
                        document.addEventListener('DOMContentLoaded', () => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal', 
                                html: '<p class="."p-popup".">Email sudah ada sebelumnya!</p>',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        })
                    </script>
                ";

                return false;
            }

            // cek password 
            if ( $password !== $confirmation_password ) {
                echo "
                    <script type='text/javascript'>
                        document.addEventListener('DOMContentLoaded', () => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal', 
                                html: '<p class="."p-popup".">Password dan konfirmasi password tidak sama!</p>',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        })
                    </script>
                ";

                return false;
            }

            // hash password
            $password = password_hash($password, PASSWORD_BCRYPT);
            $created_at = date('Y-m-d H:i:s', time());
            $updated_at = $created_at;

            mysqli_query($conn, "INSERT INTO users (email, name, password, role, created_at, updated_at) VALUES(
                '$email',
                '$name',
                '$password',
                'user',
                '$created_at',
                '$updated_at'
            )");

            return mysqli_affected_rows($conn);
        }

        public function loginAccount($data, $conn) {
            $email = htmlspecialchars($data['email']);
            $password = htmlspecialchars($data['password']);

            $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

            if ( mysqli_num_rows($result) === 1 ) {
                $arr = mysqli_fetch_assoc($result);

                if ( password_verify($password, $arr['password']) ) {
                    // cek role
                    
                    if ( $arr['role'] === 'user' ) {
                        
                        // set session
                        $_SESSION['id'] = $arr['id'];
                        $_SESSION['email'] = $arr['email'];
                        $_SESSION['login'] = $arr['role'];

                        header("Location: dashboard.php");
                        exit;
                    } else {

                        // set session
                        $_SESSION['id'] = $arr['id'];
                        $_SESSION['email'] = $arr['email'];
                        $_SESSION['login'] = $arr['role'];

                        header("Location: admin/index.php");
                        exit;
                    }
                }
            }

            $error = true;

            if ( isset($error) ) {
                echo "
                    <script type='text/javascript'>
                        document.addEventListener('DOMContentLoaded', () => {
                            Swal.fire({
                                icon: 'error',
                                title: 'error', 
                                html: '<p class="."p-popup".">Email atau password salah!</p>',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        })
                    </script>
                ";
            }
            
        }

        public function administration($data, $conn) {
            $major_name = $data['major_name'];
            $gender = $data['gender'];
            $place_of_birth = $data['place_of_birth'];
            $date_of_birth = $data['date_of_birth'];
            $address = $data['address'];


        }

    }

?>