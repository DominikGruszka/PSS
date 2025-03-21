<?php
/* Smarty version 4.3.4, created on 2025-01-05 16:22:55
  from 'C:\xampp\htdocs\aplikacja1\app\views\RegisterView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_677aa3cf0b3f51_23866250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eeabf2762b8265dc780b4b2cd7b2c199858e9baf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\RegisterView.tpl',
      1 => 1736089012,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_677aa3cf0b3f51_23866250 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1735846757677aa3cf08ce59_07729387', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_522703957677aa3cf0a06d5_23580827', "content");
?>





<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_1735846757677aa3cf08ce59_07729387 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1735846757677aa3cf08ce59_07729387',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Rejestracja<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_522703957677aa3cf0a06d5_23580827 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_522703957677aa3cf0a06d5_23580827',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <section id="register" class="register-section">
        <div class="container2">
        
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" method="post" class="pure-form pure-form-aligned">
            <h4>Rejestracja</h4>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_login">Login: </label>
                    <input id="id_login" type="text" name="login" placeholder="" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->login, ENT_QUOTES, 'UTF-8', true);?>
">
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
                    <input id="id_lastname" type="text" name="lastname" placeholder="" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->lastname, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_email">Email: </label>
                    <input id="id_email" type="email" name="email" placeholder="" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->email, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_phone">Numer telefonu: </label>
                    <input id="id_phone" type="tel" name="phone" placeholder="" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->phone, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                
                <div class="pure-controls">
                    <input type="submit" value="Zarejestruj się" class="pure-button pure-button-primary">
                </div>
            </fieldset>
        </form>
        </div>
    </section>
<?php
}
}
/* {/block "content"} */
}
