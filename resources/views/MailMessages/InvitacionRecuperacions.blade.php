<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Eliminado el enlace a Taiwind CSS -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento</title>
    <style>
        /* Estilos CSS en línea para replicar los estilos de Tailwind CSS */
        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #1f2937;
            text-align: left;
            background-color: #fff;
        }

        section {
            max-width: 2xl;
            padding: 6px;
            margin: auto;
            background-color: #111827;
        }

        header {
            text-align: center;
        }

        h1 {
            color: white;
        }

        main {
            margin-top: 8px;
        }

        h2 {
            margin-top: 6px;
            color: white;
        }

        p {
            margin-top: 6px;
            line-height: loose;
            color: white;
        }

        form {
            margin-top: 8px;
        }

        button {
            margin-top: 8px;
            color: white;
            font-size: 1.25rem; /* Equivalente a text-xl en Tailwind CSS */
            padding: 16px 24px; /* Equivalente a px-4 py-4 en Tailwind CSS */
            background-color: #16a34a; /* Equivalente a bg-green-500 en Tailwind CSS */
            border-radius: 0.75rem; /* Equivalente a rounded-xl en Tailwind CSS */
            transition: background-color 0.3s ease; 
        }
        .button-reset-password:hover {
            background-color: #166534; /* Equivalente a hover:bg-green-700 en Tailwind CSS */
}

        footer {
            margin-top: 8px;
            text-align: center;
        }

        img {
            height: 56px;
            width: 56px;
            margin-right: 2px;
        }

        p {
            margin-top: 2px;
            color: white;
        }

        a {
            color: white;
            color: #3b82f6;
            text-decoration: underline;
            hover: #2563eb;
        }

        p {
            margin-top: 6px;
            color: white;
        }

        p {
            margin-top: 3px;
            color: white;
        }
        .mx-auto{
            margin-left: auto;
            margin-right: auto;
            width: 36rem;
        }
    </style>
</head>

<body>
    <section class="mx-auto">
        <header>
            <h1>Psicología CUCEI</h1>
        </header>

        <main>
            <h2>Hola, {{$correo}}</h2>

            <p>¡Si olvidaste tu contraseña y quieres recuperarla, haz clic en el siguiente botón!</p>
            <form action="http://localhost:8000/ingresarNuevaPass" method="GET" target="_blank">
                <input type="hidden" name="correo" value="{{$correo}}">
                <button class="button-reset-password">Restablecer contraseña</button>
            </form>
            <p style="margin-top: 36px">Gracias, <br> Jesús Rentería, Líder del proyecto</p>
        </main>

        <footer>
            <img src="{{ asset('Imagenes/cerebro.png') }}" alt="cerebro">
            <p>Ingeniería en computación</p>

            <p>
                Este es un mensaje para <a href="#" target="_blank">{{$correo}}</a>.
                Correo enviado de manera automática, por favor no contestar a este correo electrónico.
            </p>

            <p>Comunidad CUCEI. </p>
        </footer>
    </section>
</body>

</html>
