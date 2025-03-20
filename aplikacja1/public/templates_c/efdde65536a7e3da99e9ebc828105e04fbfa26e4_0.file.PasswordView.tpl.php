<?php
/* Smarty version 4.3.4, created on 2025-01-14 23:22:10
  from 'C:\xampp\htdocs\aplikacja1\app\views\PasswordView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6786e3928aeb59_95848774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efdde65536a7e3da99e9ebc828105e04fbfa26e4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\PasswordView.tpl',
      1 => 1736893323,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6786e3928aeb59_95848774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18458892366786e3926ed7c4_58878093', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2467328056786e392701048_49728086', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_18458892366786e3926ed7c4_58878093 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_18458892366786e3926ed7c4_58878093',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Odzyskiwanie Hasła<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_2467328056786e392701048_49728086 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2467328056786e392701048_49728086',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="password-reset" class="password-reset-section">
    <div class="container2">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
passwordReset" method="post" class="password-reset-form">
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
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" class="pure-button pure-button-secondary">Powrót do logowania</a>
        </div>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
