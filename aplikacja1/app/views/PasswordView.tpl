{extends file="main.tpl"}

{block name="title"}Odzyskiwanie Hasła{/block}

{block name="content"}
<section id="password-reset" class="password-reset-section">
    <div class="container2">
        <form action="{$conf->action_root}passwordReset" method="post" class="password-reset-form">
            <h4>Odzyskiwanie Hasła</h4>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_email">E-mail: </label>
                    <input id="id_email" type="email" name="email" required />
                </div>
                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Wyślij link</button>
                </div>
            </fieldset>
        </form>
        <div class="pure-controls">
            <a href="{$conf->action_root}login" class="pure-button pure-button-secondary">Powrót do logowania</a>
        </div>
    </div>
</section>
{/block}
