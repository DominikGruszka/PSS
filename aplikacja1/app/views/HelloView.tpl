{extends file="main.tpl"}

{block name="title"}Strona główna{/block}

{block name="content"}
    
    <!-- Pierwsza sekcja - HOME -->
    <section id="home" class="hero">
        <div class="container">
            <h1>Witamy w naszym serwisie samochodowym</h1>
                <p>Zadbaj o swoje auto z pomocą najlepszych specjalistów w branży.</p>
            {if isset($user_logged_in) && $user_logged_in}
                <p>Witaj, {$user_name}! Cieszymy się, że jesteś z nami.</p>
            {/if}
            <a href="{$conf->action_root}services" class="btn-primary">Sprawdź Usługi</a>
        </div>
    </section>

    <!-- Druga sekcja - O NAS -->
    <section id="about" class="about">
        <div class="container">
            <h2>O nas</h2>
            <p>Jesteśmy zespołem profesjonalistów z wieloletnim doświadczeniem w naprawie i serwisie samochodów. Naszym celem jest zapewnienie najwyższej jakości usług.</p>
        </div>
    </section>
    
    <!-- Trzecia sekcja - USŁUGI -->
    <section id="services" class="services">
        <div class="container">
            <h2>Nasze Usługi</h2>
            <div class="grid">
                
                <div class="service-item">
                    <a href="{$conf->action_root}vehicles" style="text-decoration: none; color: inherit;">
                        <i class="fas fa-oil-can"></i>
                    <h3>Naprawy mechaniczne</h3>
                        <p>Zgłoś swój samochód do warsztatu.</p>
                    </a>
                </div>

                <div class="service-item">
                    <i class="fas fa-tools"></i>
                    <h3>Naprawy blacharskie</h3>
                        <p>Profesjonalne usługi blacharsko-lakiernicze.</p>
                </div>

                <div class="service-item">
                    <a href="{$conf->action_root}rentals" style="text-decoration: none; color: inherit;">
                        <i class="fas fa-car-crash"></i>
                    <h3>Wynajem samochodu</h3>
                        <p>Oferujemy krótki oraz długi wynajem samochodów.</p>
                    </a>
                </div>

            </div>
        </div>
    </section>
                        
    <!-- Czwarta sekcja - KONTAKT -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Kontakt</h2>
                <h3>Adres</h3>
                    <p>Chorzów ul. Powstańców 123</p>
        </div>
    </section>
{/block}
