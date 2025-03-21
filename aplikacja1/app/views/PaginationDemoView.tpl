{extends file="main.tpl"}

{block name="title"}Stronicowanie - Demo{/block}

{block name="content"}
<section id="pagination-demo" class="pagination-demo-section">
    <div class="container">
        <h1>Stronicowanie - Demo</h1>

        <!-- Formularz wyszukiwania po nazwisku -->
        <form method="get" action="{$conf->action_root}paginationDemo">
            <label for="search">Szukaj po nazwisku:</label>
            <input type="text" id="search" name="search" value="{$search|default:''}" placeholder="Wpisz nazwisko">
            <button type="submit" class="pure-button pure-button-primary">Szukaj</button>
        </form>

        <!-- Tabela użytkowników -->
        <table class="pure-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Nazwisko</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$users item=user}
                <tr>
                    <td>{$user.id_users}</td>
                    <td>{$user.login|escape}</td>
                    <td>{$user.email|escape}</td>
                    <td>{$user.lastname|escape}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>

        <!-- Nawigacja po stronach -->
        {if isset($total_pages) && $total_pages > 1}
            <div class="pagination">
                {if $current_page > 1}
                    <a href="{$conf->action_root}paginationDemo?page={$current_page-1}&search={$search}" class="pure-button">Poprzednia</a>
                {/if}

                {for $i=1 to $total_pages}
                    <a href="{$conf->action_root}paginationDemo?page={$i}&search={$search}" class="pure-button {if $i == $current_page}pure-button-primary{/if}">
                        {$i}
                    </a>
                {/for}

                {if $current_page < $total_pages}
                    <a href="{$conf->action_root}paginationDemo?page={$current_page+1}&search={$search}" class="pure-button">Następna</a>
                {/if}
            </div>
        {/if}

        <!-- Przycisk przekierowujący do AjaxDemo -->
        <div class="ajax-demo-button">
            <a href="{$conf->action_root}ajaxDemo" class="pure-button pure-button-success">Przejdź do AJAX Demo</a>
        </div>

    </div>
</section>
{/block}
