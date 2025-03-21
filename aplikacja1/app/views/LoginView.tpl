{extends file="main.tpl"}

{block name="title"}Logowanie{/block}

{block name="content"}
<section id="login" class="login-section">
    <div class="container2">
        <form action="{$conf->action_root}login" method="post" class="login-section">
            <h4>Logowanie</h4>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_login">Login: </label>
                    <input id="id_login" type="text" name="login" value="{$form->login}" />
                </div>

                <div class="pure-control-group">
                    <label for="id_pass">Hasło: </label>
                    <input id="id_pass" type="password" name="pass" />
                </div>

                <div class="pure-controls">
                    <input type="submit" value="Zaloguj" class="pure-button pure-button-primary">
                    <a href="{$conf->action_root}register" class="pure-button pure-button-secondary">Załóż konto</a>
                </div>
                <div class="pure-controls">
                    <a href="{$conf->action_root}passwordReset" class="pure-button pure-button-link">Nie pamiętam hasła</a>
                </div>
            </fieldset>
        </form>
    </div>
</section>
{/block}
