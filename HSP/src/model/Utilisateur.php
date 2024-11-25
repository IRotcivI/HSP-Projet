<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Utilisateur{

    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $confirmation;
    private $cv;
    private $token;
    private $selector;
    private $validator;
    private $temp;
    private $hopital;
    public function __construct( array $cmd)
    {
        $this -> hydrate ($cmd);
    }

    public function hydrate( array $cmd)
    {
        foreach ($cmd as $key => $value)
        {
            $cmd = 'set'.ucfirst($key);
            if (method_exists ($this, $cmd))
            {
                $this -> $cmd ($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp): void
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }

    /**
     * @param mixed $confirmation
     */
    public function setConfirmation($confirmation): void
    {
        $this->confirmation = $confirmation;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getSelector()
    {
        return $this->selector;
    }

    /**
     * @param mixed $selector
     */
    public function setSelector($selector): void
    {
        $this->selector = $selector;
    }

    /**
     * @return mixed
     */
    public function getTemp()
    {
        return $this->temp;
    }

    /**
     * @param mixed $temp
     */
    public function setTemp($temp): void
    {
        $this->temp = $temp;
    }

    /**
     * @return mixed
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param mixed $validator
     */
    public function setValidator($validator): void
    {
        $this->validator = $validator;
    }

    /**
     * @return mixed
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * @param mixed $cv
     */
    public function setCv($cv): void
    {
        $this->cv = $cv;
    }

    /**
     * @return mixed
     */
    public function getHopital()
    {
        return $this->hopital;
    }

    /**
     * @param mixed $hopital
     */
    public function setHopital($hopital): void
    {
        $this->hopital = $hopital;
    }



    public function Inscription ()
    {
        $f = "eleve";

        $bdd = new \BaseDeDonne();
        $req = $bdd ->getBdd()->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $req ->execute(array(
            "email" =>$this->getEmail()
        ));
        if ($req -> rowCount() > 0){
            header('location:/HSP/vue/auth/eleve/inscription.php?erreur=1');
            exit();

        }else{
            $bdd = new \BaseDeDonne();
            $req = $bdd -> getBdd() -> prepare ("INSERT INTO utilisateur (nom,prenom,email,password,fonction,cv) VALUES (:nom,:prenom,:email,:password,:fonction,:cv)");
            $hash = password_hash($this->getMdp(), PASSWORD_DEFAULT);
            $req -> execute(array(
                'nom'=>$this->getNom(),
                'prenom'=>$this->getPrenom(),
                'email'=>$this->getEmail(),
                'password'=>$hash,
                'fonction'=>$f,
                'cv'=>$this->getCv()
            ));
            header("Location:/HSP/vue/auth/status.php");
            exit();
        }
    }

    public function updateInscription()
    {
        // Load Composer's autoloader
        require 'C:\Users\FAYE Victor\Desktop\Programation\HSP-Projet\HSP\vendor\autoload.php';

        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        $user = $this->getEmail();

        try {
            if ($this->getSelector() == "accepter") {
                $bdd = new \BaseDeDonne();
                $update = $bdd->getBdd()->prepare("UPDATE utilisateur SET inscrit = :ins WHERE id = :id");
                $update->execute(array(
                    'ins' => 1,
                    'id' => $this->getId()
                ));

                // Send acceptance email
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host = 'smtp.gmail.com';                             // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                     // Enable SMTP authentication
                $mail->Username = 'phpmailprs@gmail.com';                   // SMTP username
                $mail->Password = 'pyyf dfrp anmu hqby';                    // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
                $mail->Port = 465;                                          // TCP port to connect to

                // Recipients
                $mail->setFrom('phpmailprs@gmail.com', 'HSP');
                $mail->addAddress($user, 'Client');                         // Add a recipient
                $mail->addReplyTo('phpmailprs@gmail.com', 'Client Reply');

                // Content
                $mail->isHTML(true);                                        // Set email format to HTML
                $mail->Subject = 'Votre inscription a ete acceptee';
                $mail->Body = 'Felicitations ! Votre inscription a HSP a ete acceptee. Vous pouvez vous connecter ! ';
                $mail->AltBody = strip_tags($mail->Body);

                $mail->send();

                header('location:/HSP/vue/auth/validation.php?btn=eleve&status=inscrit');
                exit();
            } elseif ($this->getSelector() == "refuser") {
                $bdd = new \BaseDeDonne();
                $delete = $bdd->getBdd()->prepare("DELETE FROM utilisateur WHERE id = :id");
                $delete->execute(array(
                    'id' => $this->getId()
                ));

                // Send acceptance email
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host = 'smtp.gmail.com';                             // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                     // Enable SMTP authentication
                $mail->Username = 'phpmailprs@gmail.com';                   // SMTP username
                $mail->Password = 'pyyf dfrp anmu hqby';                    // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
                $mail->Port = 465;                                          // TCP port to connect to

                // Recipients
                $mail->setFrom('phpmailprs@gmail.com', 'HSP');
                $mail->addAddress($user, 'Client');                         // Add a recipient
                $mail->addReplyTo('phpmailprs@gmail.com', 'Client Reply');

                $mail->isHTML(true);                                        // Set email format to HTML
                $mail->Subject = 'Votre inscription a ete refuser !';
                $mail->Body = 'Nous sommes desoles, mais votre inscription à HSP a ete refuser.';
                $mail->AltBody = strip_tags($mail->Body);

                $mail->send();


                header('location:/HSP/vue/auth/validation.php?btn=eleve&status=refuser');
                exit();
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function Connexion ()
    {
        $bdd = new \BaseDeDonne();
        $req = $bdd -> getBdd() -> prepare ("SELECT * FROM utilisateur WHERE email = :email");
        $req -> execute(array(
            'email'=>$this->getEmail(),
        ));

        $res = $req -> fetch();
        if (is_array($res))
        {
            if (password_verify($this->getMdp(), $res['password'])) {
                if ($res['inscrit'] == 1) {
                    session_start();
                    $_SESSION['id'] = $res['id'];
                    $_SESSION['nom'] = $res['nom'];
                    $_SESSION['prenom'] = $res['prenom'];
                    $_SESSION['email'] = $res['email'];
                    $_SESSION['fonction'] = $res['fonction'];
                    header("Location:/HSP/vue/menu.php");
                    exit();

                } elseif ($res['inscrit'] == 0) {
                    header("Location:/HSP/vue/auth/status.php");
                    exit();
                }
            } else {
                header("Location:/HSP/vue/auth/connection.php?connection=passwordincorect");
                exit();
            }
        }
        else
        {
            header("Location:/HSP/vue/auth/connection.php?connection=nouser");
            exit();
        }
    }

    public function PasswordTokenDel()
    {
        $bdd = new \BaseDeDonne();
        $req = $bdd->getBdd()->prepare('DELETE FROM mdpreset WHERE mdpResetEmail = ?');
        $req->execute(array(
            $this->getEmail()
        ));

    }

    public function PasswordTokenIns()
    {
        $bdd = new \BaseDeDonne();
        $req = $bdd->getBdd()->prepare('INSERT INTO mdpreset (mdpResetEmail,mdpResetSelector,mdpResetToken,mdpResetTemps) VALUES (:email,:selector,:token,:temps);');
        $hashToken = password_hash($this->getToken(), PASSWORD_DEFAULT);
        $req->execute(array(
            'email'=>$this->getEmail(),
            'token'=>$hashToken,
            'selector'=>$this->getSelector(),
            'temps'=>$this->getTemp(),
        ));

    }

    public function PasswordReset()
    {
        $currentDate = date("U");
        $bdd = new \BaseDeDonne();
        $req = $bdd->getBdd()->prepare('SELECT * FROM mdpreset WHERE mdpResetSelector = :selector AND mdpResetTemps >= :temps');
        $req->execute(array(
            'selector'=>$this->getSelector(),
            'temps'=>$currentDate,
        ));


        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        $ram = hex2bin($this->getValidator());
        $remCheck = password_verify($ram, $resultat["mdpResetToken"]);


        if ($remCheck === false){
            echo "Vous devez re-envoyer la demande de réinitialisation.";
            exit();

        } else if($remCheck === true){
            $tokenEmail = $resultat['mdpResetEmail'];

            $sql = $bdd->getBdd()->prepare("SELECT * FROM utilisateur WHERE email = :email");
            $sql -> execute(array(
                'email'=>$tokenEmail
            ));


            $update = $bdd->getBdd() -> prepare("UPDATE utilisateur SET password = :pwd WHERE email = :email");
            $newPwdHash = password_hash($this->getMdp(), PASSWORD_DEFAULT);
            $update -> execute(array(
                'pwd'=>$newPwdHash,
                'email'=>$tokenEmail
            ));

            $del = $bdd->getBdd()->prepare("DELETE FROM mdpreset WHERE mdpResetEmail = :email");
            $del->execute(array(
                'email'=>$tokenEmail,
            ));
            header("Location:/HSP/vue/auth/connection.php?pwd=updated");

        }
    }
    public function InscriptionProf ()
    {
        $f = "professeur";

        $bdd = new \BaseDeDonne();
        $req = $bdd ->getBdd()->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $req ->execute(array(
            "email" =>$this->getEmail()
        ));

        $bdd = new \BaseDeDonne();
        $req = $bdd -> getBdd() -> prepare ("INSERT INTO utilisateur (nom,prenom,email,password,fonction) VALUES (:nom,:prenom,:email,:password,:fonction)");
        $hash = password_hash($this->getMdp(), PASSWORD_DEFAULT);
        $req -> execute(array(
            'nom'=>$this->getNom(),
            'prenom'=>$this->getPrenom(),
            'email'=>$this->getEmail(),
            'password'=>$hash,
            'fonction'=>$f,
        ));
        header('location:/HSP/vue/auth/confirmation.html');
    }

    public function Modifier()
    {
        if ($_SESSION['email'] !== $this->getEmail()){
            $bdd = new \BaseDeDonne();
            $req = $bdd ->getBdd()->prepare("SELECT * FROM utilisateur WHERE email = :email AND id = :id");
            $req ->execute(array(
                "email" =>$this->getEmail(),
                "id"=>$this->getId()
            ));
            if ($req -> rowCount() > 0){
                header('location:/HSP/vue/auth/profiles.php?erreur=1');
                exit();
            }
        }
            $bdd = new \BaseDeDonne();
            $req = $bdd -> getBdd() -> prepare ("UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id ");
            $req -> execute(array(
                'nom'=>$this->getNom(),
                'prenom'=>$this->getPrenom(),
                'email'=>$this->getEmail(),
                'id'=>$this->getId(),
            ));
            $_SESSION['nom'] = $this->getNom();
            $_SESSION['prenom'] = $this->getPrenom();
            $_SESSION['email'] = $this->getEmail();
            header('location:/HSP/vue/auth/profiles.php?succes=1');
    }
    public function ModifUserHopital(){
        $bdd = new \BaseDeDonne();
        $req = $bdd -> getBdd() -> prepare ("UPDATE utilisateur SET ref_hopital = :hopital WHERE id = :id");
        $req -> execute(array(
            'hopital'=>$this->getHopital(),
            'id'=>$this->getId()
        ));
        header('location:/HSP/vue/auth/profiles.php?succes=2');
    }


}