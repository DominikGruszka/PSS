{extends file="main.tpl"}

{block name="title"}Panel Administratora{/block}

{block name="content"}
<section id="admin-panel" class="admin-panel-section">
    <div class="container">
        <h1>Panel Administratora</h1>

        <form method="get" action="{$conf->action_root}adminPanel">
            <label for="role_filter">Filtruj według roli:</label>
            <select id="role_filter" name="role_filter">
                <option value="" {if empty($selected_role)}selected{/if}>Wszystkie role</option>
                {foreach from=$roles item=role}
                <option value="{$role.role_name}" {if $role.role_name == $selected_role}selected{/if}>
                    {$role.role_name|escape}
                </option>
                {/foreach}
            </select>
            <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
        </form>

        <h2>Lista użytkowników</h2>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Nazwisko</th>
                    <th>Rola</th>
                    <th>Data przypisania</th>
                    <th>Akcje</th>
                    <th>Pojazdy</th>
                    <th>Usuń użytkownika</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$users item=user}
                <tr>
                    <td>{$user.login|escape}</td>
                    <td>{$user.email|escape}</td>
                    <td>{$user.lastname|escape}</td>
                    <td>{$user.role_name|default:'-'|escape}</td>
                    <td>{if isset($user.created_at)}{$user.created_at|date_format:"%Y-%m-%d %H:%M:%S"}{else}-{/if}</td>
                    <td>
                        <form method="post" action="{$conf->action_root}assignRole">
                            <select name="role_id" required>
                                {foreach from=$roles item=role}
                                <option value="{$role.id_role}">{$role.role_name|escape}</option>
                                {/foreach}
                            </select>
                            <input type="hidden" name="user_id" value="{$user.id_users}">
                            <button type="submit" class="pure-button pure-button-primary">Przypisz</button>
                        </form>
                        {if isset($user.user_role_id)}
                        <form method="post" action="{$conf->action_root}removeRole">
                            <input type="hidden" name="user_role_id" value="{$user.user_role_id}">
                            <button type="submit" class="pure-button pure-button-secondary">Usuń</button>
                        </form>
                        {/if}
                    </td>
                    <td>
                        <form method="get" action="{$conf->action_root}userVehicles">
                            <input type="hidden" name="user_id" value="{$user.id_users}">
                            <button type="submit" class="pure-button pure-button-primary">Pokaż pojazdy</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{$conf->action_root}deleteUser">
                            <input type="hidden" name="user_id" value="{$user.id_users}">
                            <button type="submit" class="pure-button pure-button-error">Usuń użytkownika</button>
                        </form>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>

        <!-- Paginacja -->
        <div class="pagination">
            {if $current_page > 1}
            <a href="{$conf->action_root}adminPanel?page={$current_page-1}" class="pure-button">Poprzednia</a>
            {/if}
            {if $current_page < $total_pages}
            <a href="{$conf->action_root}adminPanel?page={$current_page+1}" class="pure-button">Następna</a>
            {/if}
        </div>
    </div>
</section>
{/block}
