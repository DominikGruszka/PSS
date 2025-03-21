{extends file="main.tpl"}

{block name="title"}Panel Warsztatowy{/block}

{block name="content"}
<section id="workshop-panel" class="workshop-panel-section">
    <div class="container">
        <h1>Zgłoszone pojazdy do naprawy</h1>

        {if isset($vehicles_with_reports) && $vehicles_with_reports|@count > 0}
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Rok Produkcji</th>
                    <th>VIN</th>
                    <th>Opis Usterki</th>
                    <th>Status Zgłoszenia</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$vehicles_with_reports item=vehicle}
                <tr>
                    {if isset($edit_vehicle) && $edit_vehicle.id == $vehicle.vehicle_id}
                    <form method="post" action="{$conf->action_root}workshopPanel">
                        <td><input type="text" name="brand" value="{$edit_vehicle.brand|escape}" required></td>
                        <td><input type="text" name="model" value="{$edit_vehicle.model|escape}" required></td>
                        <td><input type="text" name="production_year" value="{$edit_vehicle.production_year|escape}" required></td>
                        <td><input type="text" name="vin" value="{$edit_vehicle.vin|escape}" required></td>
                        <td>{$vehicle.description|escape}</td>
                        <td>
                            <select name="status[{$vehicle.report_id}]">
                                <option value="Analizowanie zgłoszenia" {if $vehicle.report_status == 'Analizowanie zgłoszenia'}selected{/if}>Analizowanie zgłoszenia</option>
                                <option value="W trakcie weryfikacji część" {if $vehicle.report_status == 'W trakcie weryfikacji część'}selected{/if}>W trakcie weryfikacji części</option>
                                <option value="Proces wymiany części" {if $vehicle.report_status == 'Proces wymiany części'}selected{/if}>Proces wymiany części</option>
                                <option value="Naprawa zakończona" {if $vehicle.report_status == 'Naprawa zakończona'}selected{/if}>Naprawa zakończona</option>
                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="save_vehicle_id" value="{$edit_vehicle.id}">
                            <button type="submit" class="pure-button pure-button-primary">Zapisz</button>
                        </td>
                    </form>
                    {else}
                    <td>{$vehicle.brand|escape}</td>
                    <td>{$vehicle.model|escape}</td>
                    <td>{$vehicle.production_year|escape}</td>
                    <td>{$vehicle.vin|escape}</td>
                    <td>{$vehicle.description|escape}</td>
                    <td>
                        <form method="post" action="{$conf->action_root}workshopPanel">
                            <select name="status[{$vehicle.report_id}]">
                                <option value="Analizowanie zgłoszenia" {if $vehicle.report_status == 'Analizowanie zgłoszenia'}selected{/if}>Analizowanie zgłoszenia</option>
                                <option value="W trakcie weryfikacji część" {if $vehicle.report_status == 'W trakcie weryfikacji część'}selected{/if}>W trakcie weryfikacji części</option>
                                <option value="Proces wymiany części" {if $vehicle.report_status == 'Proces wymiany części'}selected{/if}>Proces wymiany części</option>
                                <option value="Naprawa zakończona" {if $vehicle.report_status == 'Naprawa zakończona'}selected{/if}>Naprawa zakończona</option>
                            </select>
                            <input type="hidden" name="report_id" value="{$vehicle.report_id}">
                            <button type="submit" name="update_status" class="pure-button pure-button-primary">Zmień Status</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{$conf->action_root}workshopPanel">
                            <input type="hidden" name="edit_vehicle_id" value="{$vehicle.vehicle_id}">
                            <button type="submit" class="pure-button pure-button-primary">Edytuj</button>
                        </form>
                        <form method="get" action="{$conf->action_root}partsDemand">
                            <input type="hidden" name="vehicle_id" value="{$vehicle.vehicle_id}">
                            <button type="submit" class="pure-button pure-button-secondary">Zamów Części</button>
                        </form>
                    </td>
                    {/if}
                    
                </tr>
                {/foreach}
            </tbody>
        </table>
        {else}
        <p>Brak zgłoszeń do wyświetlenia.</p>
        {/if}
    </div>
</section>
{/block}
