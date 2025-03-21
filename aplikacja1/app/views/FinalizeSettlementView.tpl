{extends file="main.tpl"}

{block name="title"}Rozliczenie Pojazdu{/block}

{block name="content"}
<section id="finalize-settlement" class="finalize-settlement-section">
    <div class="container">
        
        <h1>Rozliczenie Pojazdu</h1>
        <h2>Dane Pojazdu</h2>
        
        <p><strong>Marka:</strong> {$vehicle.brand|escape}</p>
        <p><strong>Model:</strong> {$vehicle.model|escape}</p>
        <p><strong>Właściciel:</strong> {$vehicle.lastname|escape}</p>

        <h2>Części Zamówione</h2>
        {if isset($parts) && $parts|@count > 0}
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Nazwa Części</th>
                    <th>Cena Części</th>
                    <th>Ilość</th>
                    <th>Kwota Łączna</th>
                    <th>Koszt Robocizny</th>
                    <th>Suma</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$parts item=part}
                <tr>
                    <td>{$part.part_name|escape}</td>
                    <td>{$part.part_price|number_format:2:"."} zł</td>
                    <td>{$part.quantity}</td>
                    <td>{$part.total_amount|number_format:2:"."} zł</td>
                    <td>
                        <form method="post" action="{$conf->action_root}finalizeSettlement?vehicle_id={$vehicle.id}">
                            <input type="number" step="0.01" name="labor_{$part.id_part}" value="{$part.labor|default:0}">
                            <input type="hidden" name="part_id" value="{$part.id_part}">
                            <button type="submit" name="update_labor" class="pure-button pure-button-primary">Zapisz</button>
                        </form>
                    </td>
                    <td>{$part.sum|number_format:2:"."} zł</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        <h3>Całkowita suma: <span>{$total_sum|number_format:2:"."} zł</span></h3>
        <form method="post" action="{$conf->action_root}finalizeSettlement?vehicle_id={$vehicle.id}">
            <input type="hidden" name="total_sum" value="{$total_sum}">
            <button type="submit" name="save_total" class="pure-button pure-button-primary">Zapisz Całkowitą Kwotę</button>
        </form>
        {else}
        <p>Brak części zamówionych dla tego pojazdu.</p>
        {/if}

        <div class="action-buttons">
            <a href="{$conf->action_root}settleVehicles" class="pure-button pure-button-secondary">Powrót</a>
        </div>
    </div>
</section>
{/block}
