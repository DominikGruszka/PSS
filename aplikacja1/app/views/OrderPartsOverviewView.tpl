{extends file="main.tpl"}

{block name="title"}Przegląd Części{/block}

{block name="content"}
<section id="order-parts-overview" class="order-parts-section">
    <div class="container">
        <h1>Przegląd Części</h1>
        {if isset($parts) && $parts|@count > 0}
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Marka pojazdu</th>
                    <th>Model pojazdu</th>
                    <th>Nazwa części</th>
                    <th>Numer seryjny</th>
                    <th>Ilość</th>
                    <th>Notatka</th>
                    <th>Cena za sztukę</th>
                    <th>Status zamówienia</th>
                    <th>Kwota całkowita</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$parts item=part}
                <tr>
                    <td>{$part.brand|escape}</td>
                    <td>{$part.model|escape}</td>
                    <td>{$part.part_name|escape}</td>
                    <td>{$part.serial_number|escape}</td>
                    <td>{$part.quantity}</td>
                    <td>{$part.notatka|escape|default:"Brak notatki"}</td>
                    <td>
                        <form method="post" action="{$conf->action_root}orderPartsOverview">
                            <input type="text" name="part_price_{$part.id_part}" value="{$part.part_price}" required>
                    </td>
                    <td>
                        <select name="order_status_{$part.id_part}">
                            <option value="Złożono zapotrzebowanie" {if $part.order_status == 'Złożono zapotrzebowanie'}selected{/if}>Złożono zapotrzebowanie</option>
                            <option value="Złożono zamówienie" {if $part.order_status == 'Złożono zamówienie'}selected{/if}>Złożono zamówienie</option>
                            <option value="Część w magazynie" {if $part.order_status == 'Część w magazynie'}selected{/if}>Część w magazynie</option>
                        </select>
                    </td>
                    <td>{$part.total_amount|number_format:2} PLN</td>
                    
                    <td>
                        <input type="hidden" name="part_id" value="{$part.id_part}">
                        <button type="submit" name="edit_part" class="pure-button pure-button-primary">Zapisz</button>
                        </form>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        {else}
        <p>Brak danych do wyświetlenia.</p>
        {/if}
        <div class="action-buttons">
            <a href="{$conf->action_root}officePanel" class="pure-button pure-button-secondary">Powrót do panelu biurowego</a>
        </div>
    </div>
</section>
{/block}
