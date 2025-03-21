{extends file="main.tpl"}

{block name="title"}AJAX{/block}

{block name="content"}
<section id="ajax-demo" class="ajax-demo-section">
    <div class="container">
        <h1>AJAX</h1>

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
            <tbody id="user-table">
                {foreach from=$users item=user}
                <tr id="row-{$user.id_users}">
                    <td>{$user.id_users}</td>
                    <td>{$user.login|escape}</td>
                    <td>{$user.email|escape}</td>
                    <td>{$user.lastname|escape}</td>
                    <td>
                        <button class="pure-button pure-button-error delete-user-btn"
                                data-user-id="{$user.id_users}">
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
    const deleteButtons = document.querySelectorAll(".delete-user-btn");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            let userId = this.getAttribute("data-user-id");  // Pobranie user_id poprawnie
            if (!userId) return;

            if (confirm("Czy na pewno chcesz usunąć tego użytkownika?")) {
                fetch("{$conf->action_root}ajaxDeleteUser", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "user_id=" + encodeURIComponent(userId)  // Poprawione przekazywanie danych
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById("row-" + userId).remove(); // Usunięcie wiersza
                        alert("Użytkownik został usunięty!");
                    } else {
                        alert("Błąd: " + data.error);
                    }
                })
                .catch(error => {
                    console.error("Błąd:", error);
                });
            }
        });
    });
});
</script>
{/block}
