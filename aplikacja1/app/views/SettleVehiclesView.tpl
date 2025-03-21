{extends file="main.tpl"}

{block name="title"}Rozlicz Pojazdy{/block}

{block name="content"}
<section id="settle-vehicles" class="settle-vehicles-section">
    <div class="container">
        <h1>Usługi</h1>
        {if isset($vehicles) && $vehicles|@count > 0}
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Nazwisko</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Pojazd wydany</th>
                    <th>Rozlicz pojazd</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$vehicles item=vehicle}
                <tr>
                    <td>{$vehicle.lastname|escape}</td>
                    <td>{$vehicle.brand|escape}</td>
                    <td>{$vehicle.model|escape}</td>
                    
                    <td>
                        <form method="post" action="{$conf->action_root}settleVehicles">
                            <select name="settled_status_{$vehicle.id}">
                                <option value="TAK" {if $vehicle.settled == 'TAK'}selected{/if}>TAK</option>
                                <option value="NIE" {if $vehicle.settled == 'NIE'}selected{/if}>NIE</option>
                            </select>
                            <input type="hidden" name="vehicle_id" value="{$vehicle.id}">
                            <button type="submit" class="pure-button pure-button-primary">Zapisz</button>
                        </form>
                    </td>

                    <td>
                        <a href="{$conf->action_root}finalizeSettlement?vehicle_id={$vehicle.id}" class="pure-button pure-button-primary">Rozlicz pojazd</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        {else}
        <p>Brak pojazdów do wyświetlenia.</p>
        {/if}
        <div class="action-buttons">
            <a href="{$conf->action_root}officePanel" class="pure-button pure-button-secondary">Powrót do panelu biurowego</a>
        </div>
    </div>
</section>
{/block}
