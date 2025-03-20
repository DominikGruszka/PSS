{extends file="main.tpl"}

{block name="title"}Rejestracja{/block}

{block name="content"}
    
    <section id="register" class="register-section">
        <div class="container2">
        
        <form action="{$conf->action_root}register" method="post" class="pure-form pure-form-aligned">
            <h4>Rejestracja</h4>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_login">Login: </label>
                    <input id="id_login" type="text" name="login" placeholder="" value="{$form->login|escape}">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_password">Hasło: </label>
                    <input id="id_password" type="password" name="password" placeholder="">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_password_repeat">Powtórz hasło: </label>
                    <input id="id_password_repeat" type="password" name="password_repeat" placeholder="">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_lastname">Nazwisko: </label>
                    <input id="id_lastname" type="text" name="lastname" placeholder="" value="{$form->lastname|escape}">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_email">Email: </label>
                    <input id="id_email" type="email" name="email" placeholder="" value="{$form->email|escape}">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_phone">Numer telefonu: </label>
                    <input id="id_phone" type="tel" name="phone" placeholder="" value="{$form->phone|escape}">
                </div>
                
                <div class="pure-controls">
                    <input type="submit" value="Zarejestruj się" class="pure-button pure-button-primary">
                </div>
            </fieldset>
        </form>
        </div>
    </section>
{/block}




