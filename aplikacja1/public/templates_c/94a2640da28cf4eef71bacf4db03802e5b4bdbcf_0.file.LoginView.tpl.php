<?php
/* Smarty version 4.3.4, created on 2025-01-16 19:10:43
  from 'C:\xampp\htdocs\aplikacja1\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67894ba34140e6_57527516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94a2640da28cf4eef71bacf4db03802e5b4bdbcf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\LoginView.tpl',
      1 => 1737051041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67894ba34140e6_57527516 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_165880320867894ba33ecfe6_26521838', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_70800471767894ba3400869_99752043', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_165880320867894ba33ecfe6_26521838 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_165880320867894ba33ecfe6_26521838',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Logowanie<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_70800471767894ba3400869_99752043 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_70800471767894ba3400869_99752043',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="login" class="login-section">
    <div class="container2">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="login-section">
            <h4>Logowanie</h4>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_login">Login: </label>
                    <input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" />
                </div>

                <div class="pure-control-group">
                    <label for="id_pass">Hasło: </label>
                    <input id="id_pass" type="password" name="pass" />
                </div>

                <div class="pure-controls">
                    <input type="submit" value="Zaloguj" class="pure-button pure-button-primary">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" class="pure-button pure-button-secondary">Załóż konto</a>
                </div>
                <div class="pure-controls">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
passwordReset" class="pure-button pure-button-link">Nie pamiętam hasła</a>
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
