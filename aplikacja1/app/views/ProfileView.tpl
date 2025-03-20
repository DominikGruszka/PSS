{extends file="main.tpl"}

{block name="title"}Profil użytkownika{/block}

{block name="content"}
<section id="profile" class="profile-section">
    <div class="container2">
       
        <!-- Formularz profilu -->
        <form action="{$conf->action_root}profileSave" method="post" class="pure-form pure-form-aligned">
            <h4>Twój profil</h4>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_email">Email:</label>
                    <input id="id_email" type="email" name="email" value="{$form->email|escape}" required>
                </div>
                <div class="pure-control-group">
                    <label for="id_lastname">Nazwisko:</label>
                    <input id="id_lastname" type="text" name="lastname" value="{$form->lastname|escape}" required>
                </div>
                <div class="pure-control-group">
                    <label for="id_phone">Numer telefonu:</label>
                    <input id="id_phone" type="tel" name="phone" value="{$form->phone|escape}" placeholder="9 cyfr">
                </div>
                <div class="pure-control-group">
                    <label for="id_new_password">Nowe hasło:</label>
                    <input id="id_new_password" type="password" name="new_password" placeholder="Wpisz nowe hasło">
                </div>
                <div class="pure-control-group">
                    <label for="id_repeat_new_password">Powtórz nowe hasło:</label>
                    <input id="id_repeat_new_password" type="password" name="repeat_new_password" placeholder="Powtórz nowe hasło">
                </div>
                <div class="pure-controls">
                    <input type="submit" value="Zapisz zmiany" class="pure-button pure-button-primary">
                </div>
            </fieldset>
        </form>
    </div>
</section>
{/block}
