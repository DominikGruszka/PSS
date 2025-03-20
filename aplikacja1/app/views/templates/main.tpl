<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <title>{block name="title"}RideFlow{/block}</title>
    <link rel="stylesheet" href="{$conf->app_url}/css/style.css"> 
</head>
<body>
    <!-- Menu -->
   <header>
        <nav class="navbar">
            <!-- Nazwa firmy -->
            <div class="logo">
                <li><a href="{$conf->action_root}home"><span class="ride">Ride</span><span class="flow">FLOW</span></a></li>
            </div>


            <!-- Centralne menu -->
            <ul class="center-menu">
                <li><a href="{$conf->action_root}home">Home</a></li>
                <li><a href="{$conf->action_root}#about">O nas</a></li>
                <li><a href="{$conf->action_root}#services">Usługi</a></li>
                <li><a href="{$conf->action_root}#contact">Kontakt</a></li>
            </ul>

            <!-- Menu użytkownika (rozwijane) -->
           <ul class="user-menu">
    {if isset($user_logged_in) && $user_logged_in}
        <li class="user-menu">
            <a href="#">{$user_name}</a>
            <ul class="dropdown">
                <li><a href="{$conf->action_root}profile">Profil</a></li>
                <li><a href="{$conf->action_root}vehicles">Zgłoś pojazd</a></li>
                <li><a href="{$conf->action_root}vehiclesList">Mój pojazd</a></li>
                {if isset($user_is_admin) && $user_is_admin}
                    <li><a href="{$conf->action_root}adminPanel">Panel Administratora</a></li>
                    <li><a href="{$conf->action_root}roles">Dodaj role</a></li>
                {/if}
                {if isset($user_is_office_worker) && $user_is_office_worker}
                    <li><a href="{$conf->action_root}officePanel">Panel Biurowy</a></li>
                {/if}
                {if isset($user_is_workshop_worker) && $user_is_workshop_worker}
                    <li><a href="{$conf->action_root}workshopPanel">Panel Warsztatowy</a></li>
                {/if}
                <li><a href="{$conf->action_root}logout">Wyloguj się</a></li>
            </ul>
        </li>
        {else}
            <li class="login"><a href="{$conf->action_root}login">Zaloguj się</a></li>
         {/if}
        </ul>
      </nav>
    </header>

    <!-- Dynamiczna struktura  -->
    <main class="content">
        {block name="content"}{/block}
    </main>

    <!-- Błędy i komunikaty -->
    <section class="notifications">
        {if $msgs->isMessage()}
            {foreach $msgs->getMessages() as $msg}
                <div class="notification-box 
                    {if $msg->isInfo()}notification-info{/if}
                    {if $msg->isWarning()}notification-warning{/if}
                    {if $msg->isError()}notification-error{/if}">
                    {$msg->text}
                </div>
            {/foreach}
        {/if}
    </section>

    <!-- Footer (stopka) -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 RideFlow. Wszystkie prawa zastrzeżone.</p>
        </div>
    </footer>
    
    <!-- JS, obsługuje rozwijane menu w panelu użytkownika -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userMenuToggle = document.querySelector(".user-menu > a");
            const dropdown = document.querySelector(".user-menu .dropdown");

            if (userMenuToggle) {
                userMenuToggle.addEventListener("mouseover", function () {
                    dropdown.classList.add("show");
                });

                userMenuToggle.addEventListener("mouseout", function () {
                    dropdown.classList.remove("show");
                });

                document.addEventListener("click", function (e) {
                    if (!userMenuToggle.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.classList.remove("show");
                    }
                });
            }
        });
    </script>
</body>
</html>
