<?php
/* Smarty version 4.3.4, created on 2025-01-13 10:39:30
  from 'C:\xampp\htdocs\aplikacja1\app\views\RolesView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6784df52d57624_66504038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cea2c84aea6b228484c97ab13c9f1eacb0dd19e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\RolesView.tpl',
      1 => 1736761159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6784df52d57624_66504038 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6694771526784df52cf5ba2_12118293', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16564500966784df52d09426_42227554', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_6694771526784df52cf5ba2_12118293 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_6694771526784df52cf5ba2_12118293',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Zarządzanie Rolami<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_16564500966784df52d09426_42227554 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16564500966784df52d09426_42227554',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<section id="roles-management" class="roles-management-section">
    <div class="container">
        <h1>Zarządzanie Rolami</h1>

        <h2>Dodaj Nową Rolę</h2>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
roles">
            <label for="role_name">Nazwa roli:</label>
            <input type="text" name="role_name" id="role_name" required>
            <button type="submit" name="add_role" class="pure-button pure-button-primary">Dodaj Rolę</button>
        </form>

        <h2>Lista Ról</h2>
        <?php if ((isset($_smarty_tpl->tpl_vars['roles']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['roles']->value) > 0) {?>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa Roli</th>
                    <th>Data Utworzenia</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
$_smarty_tpl->tpl_vars['role']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['role']->value['id_role'];?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['role']->value['role_name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['role']->value['created_at'],"%Y-%m-%d %H:%M:%S");?>
</td>
                    <td>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
roles">
                            <input type="hidden" name="role_id" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['id_role'];?>
">
                            <button type="submit" name="delete_role" class="pure-button pure-button-error">Usuń</button>
                        </form>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <?php } else { ?>
        <p>Brak zdefiniowanych ról w systemie.</p>
        <?php }?>

        <div class="action-buttons">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel" class="pure-button pure-button-secondary">Powrót do panelu administratora</a>
        </div>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
