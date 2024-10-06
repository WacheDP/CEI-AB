<?php

class Representante
{
    //Atributos
    private $persci, $persnom1, $persnom2, $persapel1, $persapel2, $perstelf1, $perstelf2, $perstelf3;
    private $persfecnac, $perslugnac, $persnacion, $parrcod, $persdir, $perscatg, $persfoto;
    private $reprecreer, $repretitu, $repreocup, $reprelgtrj;
    private $usernom, $userclave, $useremail, $usersecure, $userstatus, $userlife;

    //Metodos
    public function Verificar_Direccion()
    {
        $direccion = [];
        $direccion['parroquia'] = htmlspecialchars($this->parrcod);
        $direccion['direccion'] = htmlspecialchars($this->persdir);

        return $direccion;
    }

    public function Verificar_Nombre_Usuario()
    {
        return htmlspecialchars($this->usernom);
    }

    public function Verificar_Nombre()
    {
        $id = $this->persnom1 . " " . $this->persapel1;

        return htmlspecialchars($id);
    }

    public function Verificar_Foto()
    {
        return htmlspecialchars($this->persfoto);
    }

    public function Cargar_Datos($nombreusuario)
    {
        require "./conexion.php";

        $sql = $conexion->prepare('SELECT * FROM abuser WHERE usernom = ?');
        $sql->bind_param("s", $nombreusuario);
        $sql->execute();
        $exe = $sql->get_result();
        $usuario = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $sql = $conexion->prepare('SELECT * FROM abpers WHERE persci = ?');
        $sql->bind_param("s", $usuario['persci']);
        $sql->execute();
        $exe = $sql->get_result();
        $persona = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $sql = $conexion->prepare('SELECT * FROM abrepre WHERE repreci = ?');
        $sql->bind_param("s", $persona['persci']);
        $sql->execute();
        $exe = $sql->get_result();
        $representante = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $this->reprecreer = $representante['reprecreer'];
        $this->repretitu = $representante['repretitu'];
        $this->repreocup = $representante['repreocup'];
        $this->reprelgtrj = $representante['reprelgtrj'];
        $this->persci = $persona['persci'];
        $this->persnom1 = $persona['persnom1'];
        $this->persnom2 = $persona['persnom2'];
        $this->persapel1 = $persona['persapel1'];
        $this->persapel2 = $persona['persapel2'];
        $this->perstelf1 = $persona['perstelf1'];
        $this->perstelf2 = $persona['perstelf2'];
        $this->perstelf3 = $persona['perstelf3'];
        $this->persfecnac = $persona['persfecnac'];
        $this->perslugnac = $persona['perslugnac'];
        $this->persnacion = $persona['persnacion'];
        $this->parrcod = $persona['parrcod'];
        $this->persdir = $persona['persdir'];
        $this->perscatg = $persona['perscatg'];
        $this->persfoto = $persona['persfoto'];
        $this->usernom = $usuario['usernom'];
        $this->userclave = $usuario['userclave'];
        $this->useremail = $usuario['useremail'];
        $this->usersecure = $usuario['usersecure'];
        $this->userstatus = $usuario['userstatus'];
        $this->userlife = $usuario['userlife'];

        require "./cerrar_conexion.php";
    }

    public function Verificar_Nivel_Seguridad()
    {
        return $this->usersecure;
    }

    public function Verificar_Categoria()
    {
        return $this->perscatg;
    }

    public function Verificar_Correo()
    {
        return htmlspecialchars($this->useremail);
    }

    public function Registrar_Representante($datos)
    {
        require "./conexion.php";

        $this->persci = $datos['cedula'];
        $this->persnom1 = strtoupper($datos['pnombre']);
        $this->persnom2 = strtoupper($datos['snombre']);
        $this->persapel1 = strtoupper($datos['papellido']);
        $this->persapel2 = strtoupper($datos['sapellido']);
        $this->perstelf1 = $datos['telefono1'];
        $this->perstelf2 = $datos['telefono2'];
        $this->perstelf3 = $datos['telefono3'];
        $this->persfecnac = $datos['fechanacimiento'];
        $this->perslugnac = $datos['lugarnacimiento'];
        $this->persnacion = $datos['nacionalidad'];
        $this->parrcod = $datos['codigoparroquia'];
        $this->persdir = $datos['direccion'];
        $this->perscatg = "REPRESENTANTE";
        $this->persfoto = "STAND.webp";
        $this->reprecreer = $datos['fe'];
        $this->repretitu = $datos['titulo'];
        $this->repreocup = $datos['trabajo'];
        $this->reprelgtrj = $datos['lugartrabajo'];
        $this->usernom = strtoupper($datos['usuario']);
        $this->userclave = password_hash($datos['contraseña'], PASSWORD_DEFAULT);
        $this->useremail = strtolower($datos['correo']);
        $this->usersecure = 1;
        $this->userstatus = true;
        $this->userlife = true;

        $sql = $conexion->prepare('INSERT INTO abpers VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $sql->bind_param("sssssssssssssss", $this->persci, $this->parrcod, $this->persnom1, $this->persnom2, $this->persapel1, $this->persapel2, $this->perstelf1, $this->perstelf2, $this->perstelf3, $this->persfecnac, $this->perslugnac, $this->persnacion, $this->persdir, $this->perscatg, $this->persfoto);
        $sql->execute();
        $sql->close();

        $sql = $conexion->prepare('INSERT INTO abrepre VALUES (?,?,?,?,?,?)');
        $sql->bind_param("ssssss", $this->persci, $this->persci, $this->reprecreer, $this->repretitu, $this->repreocup, $this->reprelgtrj);
        $sql->execute();
        $sql->close();

        $sql = $conexion->prepare('INSERT INTO abuser VALUES (?,?,?,?,?,?)');
        $sql->bind_param("ssssii", $this->usernom, $this->persci, $this->userclave, $this->useremail, $this->usersecure, $this->userstatus);
        $sql->execute();
        $sql->close();

        require "./cerrar_conexion.php";
    }

    public function Verificar_Cedula()
    {
        return htmlspecialchars($this->persci);
    }
};

class Personal
{
    //Atributos
    private $persci, $persnom1, $persnom2, $persapel1, $persapel2, $perstelf1, $perstelf2, $perstelf3;
    private $persfecnac, $perslugnac, $persnacion, $parrcod, $persdir, $perscatg, $persfoto;
    private $cargocod, $persotime;
    private $usernom, $userclave, $useremail, $usersecure, $userstatus, $userlife;

    //Metodos
    public function Verificar_Direccion()
    {
        $direccion = [];
        $direccion['parroquia'] = htmlspecialchars($this->parrcod);
        $direccion['direccion'] = htmlspecialchars($this->persdir);

        return $direccion;
    }

    public function Verificar_Nombre_Usuario()
    {
        return htmlspecialchars($this->usernom);
    }

    public function Verificar_Nombre()
    {
        $id = "$this->persnom1" . " " . "$this->persapel1";

        return htmlspecialchars($id);
    }

    public function Verificar_Foto()
    {
        return htmlspecialchars($this->persfoto);
    }

    public function Cargar_Datos($nombreusuario)
    {
        require "./conexion.php";

        $sql = $conexion->prepare('SELECT * FROM abuser WHERE usernom = ?');
        $sql->bind_param("s", $nombreusuario);
        $sql->execute();
        $exe = $sql->get_result();
        $usuario = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $sql = $conexion->prepare('SELECT * FROM abpers WHERE persci = ?');
        $sql->bind_param("s", $usuario['persci']);
        $sql->execute();
        $exe = $sql->get_result();
        $persona = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $sql = $conexion->prepare('SELECT * FROM abperso WHERE persoci = ?');
        $sql->bind_param("s", $persona['persci']);
        $sql->execute();
        $exe = $sql->get_result();
        $personal = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $this->cargocod = $personal['cargocod'];
        $this->persotime = $personal['persotime'];
        $this->persci = $persona['persci'];
        $this->persnom1 = $persona['persnom1'];
        $this->persnom2 = $persona['persnom2'];
        $this->persapel1 = $persona['persapel1'];
        $this->persapel2 = $persona['persapel2'];
        $this->perstelf1 = $persona['perstelf1'];
        $this->perstelf2 = $persona['perstelf2'];
        $this->perstelf3 = $persona['perstelf3'];
        $this->persfecnac = $persona['persfecnac'];
        $this->perslugnac = $persona['perslugnac'];
        $this->persnacion = $persona['persnacion'];
        $this->parrcod = $persona['parrcod'];
        $this->persdir = $persona['persdir'];
        $this->perscatg = $persona['perscatg'];
        $this->persfoto = $persona['persfoto'];
        $this->usernom = $usuario['usernom'];
        $this->userclave = $usuario['userclave'];
        $this->useremail = $usuario['useremail'];
        $this->usersecure = $usuario['usersecure'];
        $this->userstatus = $usuario['userstatus'];
        $this->userlife = $usuario['userlife'];

        require "./cerrar_conexion.php";
    }

    public function Verificar_Nivel_Seguridad()
    {
        return $this->usersecure;
    }

    public function Verificar_Categoria()
    {
        return $this->perscatg;
    }

    public function Registrar_Personal($datos)
    {
        require "./conexion.php";

        $this->persci = $datos['cedula'];
        $this->persnom1 = strtoupper($datos['pnombre']);
        $this->persnom2 = strtoupper($datos['snombre']);
        $this->persapel1 = strtoupper($datos['papellido']);
        $this->persapel2 = strtoupper($datos['sapellido']);
        $this->perstelf1 = $datos['telefono1'];
        $this->perstelf2 = $datos['telefono2'];
        $this->perstelf3 = $datos['telefono3'];
        $this->persfecnac = $datos['fechanacimiento'];
        $this->perslugnac = $datos['lugarnacimiento'];
        $this->persnacion = $datos['nacionalidad'];
        $this->parrcod = $datos['codigoparroquia'];
        $this->persdir = $datos['direccion'];
        $this->perscatg = "PERSONAL";
        $this->persfoto = "STAND.webp";
        $this->cargocod = $datos['codigocargo'];
        $this->persotime = $datos['tiemposervicio'];
        $this->usernom = strtoupper($datos['usuario']);
        $this->userclave = password_hash($datos['contraseña'], PASSWORD_DEFAULT);
        $this->useremail = strtolower($datos['correo']);
        $this->usersecure = 2;
        $this->userstatus = true;
        $this->userlife = true;

        $sql = $conexion->prepare('INSERT INTO abpers VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $sql->bind_param("sssssssssssssss", $this->persci, $this->parrcod, $this->persnom1, $this->persnom2, $this->persapel1, $this->persapel2, $this->perstelf1, $this->perstelf2, $this->perstelf3, $this->persfecnac, $this->perslugnac, $this->persnacion, $this->persdir, $this->perscatg, $this->persfoto);
        $sql->execute();
        $sql->close();

        $sql = $conexion->prepare('INSERT INTO abperso VALUES (?,?,?,?)');
        $sql->bind_param("ssss", $this->persci, $this->persci, $this->cargocod, $this->persotime);
        $sql->execute();
        $sql->close();

        $sql = $conexion->prepare('INSERT INTO abuser VALUES (?,?,?,?,?,?)');
        $sql->bind_param("ssssii", $this->usernom, $this->persci, $this->userclave, $this->useremail, $this->usersecure, $this->userstatus);
        $sql->execute();
        $sql->close();

        require "./cerrar_conexion.php";
    }

    public function Verificar_Correo()
    {
        return htmlspecialchars($this->useremail);
    }

    public function Verificar_Cedula()
    {
        return htmlspecialchars($this->persci);
    }
};

class Mixto
{
    //Atributos
    private $persci, $persnom1, $persnom2, $persapel1, $persapel2, $perstelf1, $perstelf2, $perstelf3;
    private $persfecnac, $perslugnac, $persnacion, $parrcod, $persdir, $perscatg, $persfoto;
    private $cargocod, $persotime;
    private $reprecreer, $repretitu, $repreocup, $reprelgtrj;
    private $usernom, $userclave, $useremail, $usersecure, $userstatus, $userlife;

    //Metodos
    public function Verificar_Direccion()
    {
        $direccion = [];
        $direccion['parroquia'] = htmlspecialchars($this->parrcod);
        $direccion['direccion'] = htmlspecialchars($this->persdir);

        return $direccion;
    }

    public function Verificar_Cedula()
    {
        return htmlspecialchars($this->persci);
    }

    public function Verificar_Nombre_Usuario()
    {
        return htmlspecialchars($this->usernom);
    }

    public function Verificar_Nombre()
    {
        $id = "$this->persnom1" . " " . "$this->persapel1";

        return htmlspecialchars($id);
    }

    public function Verificar_Foto()
    {
        return htmlspecialchars($this->persfoto);
    }

    public function Cargar_Datos($nombreusuario)
    {
        require "./conexion.php";

        $sql = $conexion->prepare('SELECT * FROM abuser WHERE usernom = ?');
        $sql->bind_param("s", $nombreusuario);
        $sql->execute();
        $exe = $sql->get_result();
        $usuario = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $sql = $conexion->prepare('SELECT * FROM abpers WHERE persci = ?');
        $sql->bind_param("s", $usuario['persci']);
        $sql->execute();
        $exe = $sql->get_result();
        $persona = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $sql = $conexion->prepare('SELECT * FROM abperso WHERE persoci = ?');
        $sql->bind_param("s", $persona['persci']);
        $sql->execute();
        $exe = $sql->get_result();
        $personal = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $sql = $conexion->prepare('SELECT * FROM abrepre WHERE repreci = ?');
        $sql->bind_param("s", $persona['persci']);
        $sql->execute();
        $exe = $sql->get_result();
        $representante = $exe->fetch_assoc();

        $exe->free_result();
        $sql->close();

        $this->reprecreer = $representante['reprecreer'];
        $this->repretitu = $representante['repretitu'];
        $this->repreocup = $representante['repreocup'];
        $this->reprelgtrj = $representante['reprelgtrj'];
        $this->cargocod = $personal['cargocod'];
        $this->persotime = $personal['persotime'];
        $this->persci = $persona['persci'];
        $this->persnom1 = $persona['persnom1'];
        $this->persnom2 = $persona['persnom2'];
        $this->persapel1 = $persona['persapel1'];
        $this->persapel2 = $persona['persapel2'];
        $this->perstelf1 = $persona['perstelf1'];
        $this->perstelf2 = $persona['perstelf2'];
        $this->perstelf3 = $persona['perstelf3'];
        $this->persfecnac = $persona['persfecnac'];
        $this->perslugnac = $persona['perslugnac'];
        $this->persnacion = $persona['persnacion'];
        $this->parrcod = $persona['parrcod'];
        $this->persdir = $persona['persdir'];
        $this->perscatg = $persona['perscatg'];
        $this->persfoto = $persona['persfoto'];
        $this->usernom = $usuario['usernom'];
        $this->userclave = $usuario['userclave'];
        $this->useremail = $usuario['useremail'];
        $this->usersecure = $usuario['usersecure'];
        $this->userstatus = $usuario['userstatus'];
        $this->userlife = $usuario['userlife'];

        require "./cerrar_conexion.php";
    }

    public function Verificar_Nivel_Seguridad()
    {
        return $this->usersecure;
    }

    public function Verificar_Correo()
    {
        return htmlspecialchars($this->useremail);
    }

    public function Verificar_Categoria()
    {
        return $this->perscatg;
    }

    public function Registrar_Mixto($datos)
    {
        require "./conexion.php";

        $this->persci = $datos['cedula'];
        $this->persnom1 = strtoupper($datos['pnombre']);
        $this->persnom2 = strtoupper($datos['snombre']);
        $this->persapel1 = strtoupper($datos['papellido']);
        $this->persapel2 = strtoupper($datos['sapellido']);
        $this->perstelf1 = $datos['telefono1'];
        $this->perstelf2 = $datos['telefono2'];
        $this->perstelf3 = $datos['telefono3'];
        $this->persfecnac = $datos['fechanacimiento'];
        $this->perslugnac = $datos['lugarnacimiento'];
        $this->persnacion = $datos['nacionalidad'];
        $this->parrcod = $datos['codigoparroquia'];
        $this->persdir = $datos['direccion'];
        $this->perscatg = "REPRESENTANTE/PERSONAL";
        $this->persfoto = "STAND.webp";
        $this->cargocod = $datos['codigocargo'];
        $this->persfecnac = $datos['fechanacimiento'];
        $this->reprecreer = $datos['fe'];
        $this->repretitu = $datos['titulo'];
        $this->repreocup = $datos['trabajo'];
        $this->reprelgtrj = $datos['lugartrabajo'];
        $this->usernom = strtoupper($datos['usuario']);
        $this->userclave = password_hash($datos['contraseña'], PASSWORD_DEFAULT);
        $this->useremail = strtolower($datos['correo']);
        $this->usersecure = 1;
        $this->userstatus = true;
        $this->userlife = true;

        $sql = $conexion->prepare('INSERT INTO abpers VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $sql->bind_param("sssssssssssssss", $this->persci, $this->parrcod, $this->persnom1, $this->persnom2, $this->persapel1, $this->persapel2, $this->perstelf1, $this->perstelf2, $this->perstelf3, $this->persfecnac, $this->perslugnac, $this->persnacion, $this->persdir, $this->perscatg, $this->persfoto);
        $sql->execute();
        $sql->close();

        $sql = $conexion->prepare('INSERT INTO abrepre VALUES (?,?,?,?,?,?)');
        $sql->bind_param("ssssss", $this->persci, $this->persci, $this->reprecreer, $this->repretitu, $this->repreocup, $this->reprelgtrj);
        $sql->execute();
        $sql->close();

        $sql = $conexion->prepare('INSERT INTO abperso VALUES (?,?,?,?)');
        $sql->bind_param("ssss", $this->persci, $this->persci, $this->cargocod, $this->persotime);
        $sql->execute();
        $sql->close();

        $sql = $conexion->prepare('INSERT INTO abuser VALUES (?,?,?,?,?,?)');
        $sql->bind_param("ssssii", $this->usernom, $this->persci, $this->userclave, $this->useremail, $this->usersecure, $this->userstatus);
        $sql->execute();
        $sql->close();

        require "./cerrar_conexion.php";
    }
};
