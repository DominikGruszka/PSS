{extends file="main.tpl"}

{block name="title"}Zarządzanie Rolami{/block}

{block name="content"}
<section id="roles-management" class="roles-management-section">
    <div class="container">
        <h1>Zarządzanie Rolami</h1>

        <h2>Dodaj Nową Rolę</h2>
        <form method="post" action="{$conf->action_root}roles">
            <label for="role_name">Nazwa roli:</label>
            <input type="text" name="role_name" id="role_name" required>
            <button type="submit" name="add_role" class="pure-button pure-button-primary">Dodaj Rolę</button>
        </form>

        <h2>Lista Ról</h2>
        {if isset($roles) && $roles|@count > 0}
        <table class="pure-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa Roli</th>
                    <th>Data Utworzenia</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$roles item=role}
                <tr>
                    <td>{$role.id_role}</td>
                    <td>{$role.role_name|escape}</td>
                    <td>{$role.created_at|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                    <td>
                        <form method="post" action="{$conf->action_root}roles">
                            <input type="hidden" name="role_id" value="{$role.id_role}">
                            <button type="submit" name="delete_role" class="pure-button pure-button-error">Usuń</button>
                        </form>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        {else}
        <p>Brak zdefiniowanych ról w systemie.</p>
        {/if}

        <div class="action-buttons">
            <a href="{$conf->action_root}adminPanel" class="pure-button pure-button-secondary">Powrót do panelu administratora</a>
        </div>
    </div>
</section>
{/block}
