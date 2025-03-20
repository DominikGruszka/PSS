{extends file="main.tpl"}

{block name="title"}Panel Biurowy{/block}

{block name="content"}
<section id="office-panel" class="office-panel-section">
    <div class="container">
        <h1>Panel Pracownika Biurowego</h1>
        
        <div class="options">
            <!-- Opcja: Zamów części -->
            <div class="option-card">
                <a href="{$conf->action_root}orderPartsOverview">
                    <div class="card-content">
                        <h2>Zamów części</h2>
                        <p>Przejdź do zamawiania części dla pojazdów.</p>
                    </div>
                </a>
            </div>

            <!-- Opcja: Rozlicz pojazd -->
            <div class="option-card">
                <a href="{$conf->action_root}settleVehicles">
                    <div class="card-content">
                        <h2>Rozlicz pojazd</h2>
                        <p>Rozlicz pojazdy zgłoszone do naprawy.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
{/block}
