<?php
/* Smarty version 4.3.4, created on 2025-01-07 21:41:55
  from 'C:\xampp\htdocs\aplikacja1\app\views\UserVehiclesView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_677d9193c81f40_42140723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd75e9ac0e2a7b540faf3345ec8beef9bf3ba2947' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\UserVehiclesView.tpl',
      1 => 1736282512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_677d9193c81f40_42140723 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_260467404677d9193c204c1_64440319', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1246961142677d9193c33d49_70376007', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_260467404677d9193c204c1_64440319 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_260467404677d9193c204c1_64440319',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Pojazdy użytkownika<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1246961142677d9193c33d49_70376007 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1246961142677d9193c33d49_70376007',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<section id="user-vehicles" class="user-vehicles-section">
    <div class="container">
        <h1>Pojazdy użytkownika: <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['viewed_user']->value, ENT_QUOTES, 'UTF-8', true);?>
</h1>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userVehicles?user_id=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
">
            <table class="pure-table">
                <thead>
                    <tr>
                        <th>Marka</th>
                        <th>Model</th>
                        <th>Rok produkcji</th>
                        <th>VIN</th>
                        <th>Data rejestracji</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['vehicles']->value) > 0) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vehicles']->value, 'vehicle');
$_smarty_tpl->tpl_vars['vehicle']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vehicle']->value) {
$_smarty_tpl->tpl_vars['vehicle']->do_else = false;
?>
                        <tr>
                            <?php if ((isset($_smarty_tpl->tpl_vars['edit_vehicle']->value)) && $_smarty_tpl->tpl_vars['edit_vehicle']->value['id'] == $_smarty_tpl->tpl_vars['vehicle']->value['id']) {?>
                            <!-- Tryb edycji -->
                            <td><input type="text" name="brand" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['brand'], ENT_QUOTES, 'UTF-8', true);?>
" required></td>
                            <td><input type="text" name="model" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['model'], ENT_QUOTES, 'UTF-8', true);?>
" required></td>
                            <td><input type="number" name="production_year" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['production_year'], ENT_QUOTES, 'UTF-8', true);?>
" required></td>
                            <td><input type="text" name="vin" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['vin'], ENT_QUOTES, 'UTF-8', true);?>
" required></td>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vehicle']->value['created_at'],"%Y-%m-%d %H:%M:%S");?>
</td>
                            <td>
                                <button type="submit" name="save_edit_vehicle_id" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="pure-button pure-button-primary">Zapisz</button>
                            </td>
                            <?php } else { ?>
                            <!-- Tryb odczytu -->
                            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['brand'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['model'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['production_year'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['vin'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vehicle']->value['created_at'],"%Y-%m-%d %H:%M:%S");?>
</td>
                            <td>
                                <button type="submit" name="edit_vehicle_id" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="pure-button pure-button-primary">Edytuj</button>
                                <button type="submit" name="delete_vehicle_id" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="pure-button pure-button-secondary">Usuń</button>
                            </td>
                            <?php }?>
                        </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6">Brak pojazdów do wyświetlenia.</td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </form>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel" class="pure-button pure-button-primary">Powrót do panelu</a>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
