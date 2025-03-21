{extends file="main.tpl"}

{block name="title"}Lista zarejestrowanych pojazdów{/block}

{block name="content"}
    
    <section id="vehicles-list" class="vehicles-list-section">
        <div class="container2">
            <h4>Lista zarejestrowanych pojazdów</h4>
        <form method="post" action="{$conf->action_root}vehiclesList">
            <table class="pure-table">
                <thead>
                    <tr>
                        <th>Marka</th>
                        <th>Model</th>
                        <th>Rok produkcji</th>
                        <th>VIN</th>
                        <th>Opis usterki</th>
                        <th>Status</th>
                        <th>Kwota naprawy</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$vehicles item=vehicle}
                    <tr>
                        {if isset($edit_vehicle) && $edit_vehicle.id == $vehicle.id}
                        <!-- Tryb edycji -->
                        <td><input type="text" name="brand" value="{$edit_vehicle.brand|escape}"></td>
                        <td><input type="text" name="model" value="{$edit_vehicle.model|escape}"></td>
                        <td><input type="text" name="production_year" value="{$edit_vehicle.production_year|escape}"></td>
                        <td><input type="text" name="vin" value="{$edit_vehicle.vin|escape}"></td>
                        <td><input type="text" name="description" value="{if isset($edit_report.description)}{$edit_report.description|escape}{else}Brak opisu{/if}"></td>
                        <td>{$vehicle.status|default:"Brak statusu"|escape}</td>
                        <td>{$vehicle.repair_amount|default:"Brak kwoty"|escape}</td>
                        <td>
                            <button type="submit" name="save_edit_vehicle_id" value="{$edit_vehicle.id}" class="pure-button pure-button-primary">Zapisz</button>
                        </td>
                        {else}
                        <!-- Tryb odczytu -->
                        <td>{$vehicle.brand|escape}</td>
                        <td>{$vehicle.model|escape}</td>
                        <td>{$vehicle.production_year|escape}</td>
                        <td>{$vehicle.vin|escape}</td>
                        <td>{$vehicle.description|default:"Dodaj opis by rozpatrzono usterkę"|escape}</td>
                        <td>{$vehicle.status|default:"Brak statusu"|escape}</td>
                        <td>{$vehicle.repair_amount|default:"-"|escape}</td>
                        <td>
                            <button type="submit" name="edit_vehicle_id" value="{$vehicle.id}" class="pure-button pure-button-primary">Edytuj</button>
                            <button type="submit" name="delete_vehicle_id" value="{$vehicle.id}" class="pure-button pure-button-secondary">Usuń</button>
                        </td>
                        {/if}
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </form>
        </div>
    </section>
{/block}
