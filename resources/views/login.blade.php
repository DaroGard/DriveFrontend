<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Drive: Iniciar Sesion</title>
    <link rel="shortcut icon" href="{{url('https://ssl.gstatic.com/images/branding/product/2x/hh_drive_36dp.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <section class="container2">
            <div>
                <img src="{{asset('img/Signin.png')}}" alt="signin.png" id="signin">
            </div>
            <div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@ejemplo.com">
                </div>
                <label for="inputPassword5" class="form-label">Contraseña</label>
                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                    Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emoji.
                </div>
                <div id="botones">
                    <a href="crearCuenta">Crear Cuenta</a>
                    <button id="inButton">Iniciar Sesion</button>
                </div>
            </div>
        </section>
    </div>

    <script src="{{url('js/login.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
