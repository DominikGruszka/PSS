{extends file="main.tpl"}

{block name="title"}Dodaj Pojazd{/block}

{block name="content"}
    <section id="vehicle" class="vehicle-section">
        <div class="container2">
        <form action="{$conf->action_root}vehicles" method="post" class="pure-form pure-form-aligned">
            <h4>Dodaj swój pojazd</h4>
            
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_brand">Marka pojazdu:</label>
                        <input id="id_brand" type="text" name="brand" value="{$form->brand|escape}">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_model">Model pojazdu:</label>
                        <input id="id_model" type="text" name="model" value="{$form->model|escape}">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_production_year">Rok produkcji:</label>
                        <input id="id_production_year" type="number" name="production_year" value="{$form->production_year|escape}">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_vin">Numer VIN:</label>
                        <input id="id_vin" type="text" name="vin" value="{$form->vin|escape}">
                </div>
                
                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Zapisz pojazd</button>
                    <a href="{$conf->action_root}vehiclesList" class="pure-button pure-button-secondary">Lista zarejestrowanych pojazdów</a>
                </div>
            </fieldset>
        </form>
        </div>
    </section>
{/block}
