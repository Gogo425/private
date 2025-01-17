<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../js/tailwind.config.js"></script>
</head>

<body style="background-image: url('{{'img/fondEcran.jpg'}}');" class="bg-cover bg-center place-self-center">
    <p>{{Auth::user();}}</p>
    <div class="h-screen flex items-center justify-center">
        <form method="post" action="/login">
            @csrf
            <p class="text-xl text-center"> Connexion </p>
            
            <div class="flex justify-center p-4">
                <label for="email" class="px-7"> Email </label>
                <input type="email" name="email" id="email" >
                
            </div>
            
            <div class="flex justify-center p-4">
                <label for="password" class="px-4"> Mot de passe </label>
                <input type="password" name="password" id="password">
            </div>
            
            @if($errors->has('email'))
                <div class="bg-red-500 text-white p-4 text-center">
                    {{ $errors->first('email') }}
                </div>
            @endif

            @if($errors->has('password'))
                <div class="bg-red-500 text-white p-4 text-center">
                    {{ $errors->first('password') }}
                </div>
            @endif

            <div class="flex justify-center p-4">
                    <input type="submit" class="text-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" value="Se Connecter">
            </div> 
        </form>
    </div>
>>>>>>> errorHandlingConnection
</body>

    

</html>