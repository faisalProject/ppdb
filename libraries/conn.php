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
                        $_SESSION['name'] = $arr['name'];
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

        public function administration($data, $conn, $user_id) {
            $major_id = $data['major_id'];
            $gender = $data['gender'];
            $place_of_birth = htmlspecialchars($data['place_of_birth']);
            $date_of_birth = $data['date_of_birth'];
            $address = htmlspecialchars($data['address']);
            $created_at = date('Y-m-d H:i:s', time());
            $updated_at = $created_at;

            mysqli_query($conn, "INSERT INTO registration (user_id, major_id, gender, place_of_birth, date_of_birth, address, status, created_at, updated_at) VALUES (
                '$user_id',
                '$major_id',
                '$gender',
                '$place_of_birth',
                '$date_of_birth',
                '$address',
                'pending',
                '$created_at',
                '$updated_at'
            )");

            return mysqli_affected_rows($conn);
        }

        public function uploadFiles() {
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];
            $tmp_name = $_FILES['file']['tmp_name'];
            
            // check whether there are no documents uploaded
            if ( $error === 4 ) {
                echo "
                    <script type='text/javascript'>
                        document.addEventListener('DOMContentLoaded', () => {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Gagal', 
                                html: '<p class="."p-popup".">Upload berkas terlebih dahulu!</p>',
                                showConfirmButton: true,
                            })
                        })
                    </script>
                ";

                return false;
            }

            // Check whether what is uploaded is a document
            $extension = ['pdf'];
            $document_extension = explode('.', $file_name);
            $document_extension = strtolower(end($document_extension));

            if ( !in_array($document_extension, $extension) ) {
                echo "
                    <script type='text/javascript'>
                        document.addEventListener('DOMContentLoaded', () => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal', 
                                html: '<p class="."p-popup".">File yang anda upload bukan dokumen!</p>',
                                showConfirmButton: true,
                                showCancelButton: false
                            })
                        })
                    </script>
                ";

                return false;
            }

            // Check if the file size is too large
            if ( $file_size > 2000000 ) {
                echo "
                    <script type='text/javascript'>
                        document.addEventListener('DOMContentLoaded', () => {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Gagal', 
                                html: '<p class="."p-popup".">Ukuran file terlalu besar!</p>',
                                showConfirmButton: true,
                                showCancelButton: false
                            })
                        })
                    </script>
                ";

                return false;
            }

            $new_file_name = uniqid();
            $new_file_name .= '.';
            $new_file_name .= $document_extension;

            move_uploaded_file($tmp_name, 'uploads/' . $new_file_name);

            return $new_file_name;
        }

        public function administrationAdvanced($data, $conn, $user_id) {
            $result = mysqli_query($conn, "SELECT * FROM registration WHERE user_id = '$user_id'");
            $arr = mysqli_fetch_assoc($result);
            
            $registration_id = $arr['id'];
            $file_name = htmlspecialchars($data['file_name']);
            $file = $this->uploadFiles();
            $created_at = date('Y-m-d H:i:s', time());
            $updated_at = $created_at;

            if ( !$file ) {
                return false;
            }

            mysqli_query($conn, "INSERT INTO registration_file (registration_id, file_name, file, created_at, updated_at) VALUES(
                '$registration_id',
                '$file_name',
                '$file',
                '$created_at',
                '$updated_at'
            )");

            return mysqli_affected_rows($conn);
        }

        public function deleteFile($conn, $id) {
            $result = mysqli_query($conn, "SELECT * FROM registration_file WHERE id = '$id'");
            $arr = mysqli_fetch_assoc($result);

            unlink('uploads/' . $arr['file']);

            mysqli_query($conn, "DELETE FROM registration_file WHERE id = '$id'");

            return mysqli_affected_rows($conn);
        }
    }

?>