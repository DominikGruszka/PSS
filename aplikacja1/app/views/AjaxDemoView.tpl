{extends file="main.tpl"}

{block name="title"} AJAX Usuwanie Rekordów {/block}

{block name="content"}
<section id="ajax-demo" class="ajax-demo-section">
    <div class="container">
        <h1>AJAX - Usuwanie użytkowników</h1>

        <table class="pure-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Nazwisko</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tbody id="users-table">
                {foreach from=$users item=user}
                <tr id="user-{$user.id_users}">
                    <td>{$user.id_users}</td>
                    <td>{$user.login|escape}</td>
                    <td>{$user.email|escape}</td>
                    <td>{$user.lastname|escape}</td>
                    <td>
                        <button class="delete-user-btn pure-button pure-button-error" data-id="{$user.id_users}">
                            Usuń
                        </button>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".delete-user-btn");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            const userId = this.dataset.id;

            fetch("{$conf->action_root}ajaxDeleteUser", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `user_id=${userId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    document.getElementById(`user-${userId}`).remove();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error("Błąd:", error));
        });
    });
});
</script>
{/block}
