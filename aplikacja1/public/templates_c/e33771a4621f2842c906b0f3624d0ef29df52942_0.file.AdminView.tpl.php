<?php
/* Smarty version 4.3.4, created on 2025-03-02 20:21:06
  from 'C:\xampp\htdocs\aplikacja1\app\views\AdminView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67c4afa29e8e07_57705351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e33771a4621f2842c906b0f3624d0ef29df52942' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\AdminView.tpl',
      1 => 1740943262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67c4afa29e8e07_57705351 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15447221367c4afa2987387_57264074', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_182698322267c4afa299ac02_12828637', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_15447221367c4afa2987387_57264074 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_15447221367c4afa2987387_57264074',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Panel Administratora<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_182698322267c4afa299ac02_12828637 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_182698322267c4afa299ac02_12828637',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<section id="admin-panel" class="admin-panel-section">
    <div class="container">
        <h1>Panel Administratora</h1>

        <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel">
            <label for="role_filter">Filtruj według roli:</label>
            <select id="role_filter" name="role_filter">
                <option value="" <?php if (empty($_smarty_tpl->tpl_vars['selected_role']->value)) {?>selected<?php }?>>Wszystkie role</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
$_smarty_tpl->tpl_vars['role']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value['role_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['role']->value['role_name'] == $_smarty_tpl->tpl_vars['selected_role']->value) {?>selected<?php }?>>
                    <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['role']->value['role_name'], ENT_QUOTES, 'UTF-8', true);?>

                </option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
        </form>

        <h2>Lista użytkowników</h2>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Nazwisko</th>
                    <th>Rola</th>
                    <th>Data przypisania</th>
                    <th>Akcje</th>
                    <th>Pojazdy</th>
                    <th>Usuń użytkownika</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['login'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['lastname'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['user']->value['role_name'] ?? null)===null||$tmp==='' ? '-' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php if ((isset($_smarty_tpl->tpl_vars['user']->value['created_at']))) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['created_at'],"%Y-%m-%d %H:%M:%S");
} else { ?>-<?php }?></td>
                    <td>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
assignRole">
                            <select name="role_id" required>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
$_smarty_tpl->tpl_vars['role']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value['id_role'];?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['role']->value['role_name'], ENT_QUOTES, 'UTF-8', true);?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id_users'];?>
">
                            <button type="submit" class="pure-button pure-button-primary">Przypisz</button>
                        </form>
                        <?php if ((isset($_smarty_tpl->tpl_vars['user']->value['user_role_id']))) {?>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
removeRole">
                            <input type="hidden" name="user_role_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_role_id'];?>
">
                            <button type="submit" class="pure-button pure-button-secondary">Usuń</button>
                        </form>
                        <?php }?>
                    </td>
                    <td>
                        <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userVehicles">
                            <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id_users'];?>
">
                            <button type="submit" class="pure-button pure-button-primary">Pokaż pojazdy</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
deleteUser">
                            <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id_users'];?>
">
                            <button type="submit" class="pure-button pure-button-error">Usuń użytkownika</button>
                        </form>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

        <!-- Paginacja -->
        <div class="pagination">
            <?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
" class="pure-button">Poprzednia</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
" class="pure-button">Następna</a>
            <?php }?>
        </div>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
