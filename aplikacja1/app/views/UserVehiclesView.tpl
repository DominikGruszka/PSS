{extends file="main.tpl"}

{block name="title"}Pojazdy użytkownika{/block}

{block name="content"}
<section id="user-vehicles" class="user-vehicles-section">
    <div class="container">
        <h1>Pojazdy użytkownika: {$viewed_user|escape}</h1>
        <form method="post" action="{$conf->action_root}userVehicles?user_id={$user_id}">
            <table class="pure-table">
                <thead>
                    <tr>
                        <th>Marka</th>
                        <th>Model</th>
                        <th>Rok produkcji</th>
                        <th>VIN</th>
                        <th>Data rejestracji</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    {if $vehicles|@count > 0}
                        {foreach from=$vehicles item=vehicle}
                        <tr>
                            {if isset($edit_vehicle) && $edit_vehicle.id == $vehicle.id}
                            <!-- Tryb edycji -->
                            <td><input type="text" name="brand" value="{$edit_vehicle.brand|escape}" required></td>
                            <td><input type="text" name="model" value="{$edit_vehicle.model|escape}" required></td>
                            <td><input type="number" name="production_year" value="{$edit_vehicle.production_year|escape}" required></td>
                            <td><input type="text" name="vin" value="{$edit_vehicle.vin|escape}" required></td>
                            <td>{$vehicle.created_at|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                            <td>
                                <button type="submit" name="save_edit_vehicle_id" value="{$edit_vehicle.id|escape}" class="pure-button pure-button-primary">Zapisz</button>
                            </td>
                            {else}
                            <!-- Tryb odczytu -->
                            <td>{$vehicle.brand|escape}</td>
                            <td>{$vehicle.model|escape}</td>
                            <td>{$vehicle.production_year|escape}</td>
                            <td>{$vehicle.vin|escape}</td>
                            <td>{$vehicle.created_at|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                            <td>
                                <button type="submit" name="edit_vehicle_id" value="{$vehicle.id|escape}" class="pure-button pure-button-primary">Edytuj</button>
                                <button type="submit" name="delete_vehicle_id" value="{$vehicle.id|escape}" class="pure-button pure-button-secondary">Usuń</button>
                            </td>
                            {/if}
                        </tr>
                        {/foreach}
                    {else}
                        <tr>
                            <td colspan="6">Brak pojazdów do wyświetlenia.</td>
                        </tr>
                    {/if}
                </tbody>
            </table>
        </form>
        <a href="{$conf->action_root}adminPanel" class="pure-button pure-button-primary">Powrót do panelu</a>
    </div>
</section>
{/block}
