<?php
/* Smarty version 4.3.4, created on 2025-01-16 20:27:36
  from 'C:\xampp\htdocs\aplikacja1\app\views\SettleVehiclesView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67895da84c1243_50743273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4320b656ec75962eafd488c825b02e0e91454ffe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\SettleVehiclesView.tpl',
      1 => 1737051621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67895da84c1243_50743273 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5055171967895da84868c1_77411729', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_31426561167895da849a144_51505686', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_5055171967895da84868c1_77411729 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_5055171967895da84868c1_77411729',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Rozlicz Pojazdy<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_31426561167895da849a144_51505686 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_31426561167895da849a144_51505686',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section id="settle-vehicles" class="settle-vehicles-section">
    <div class="container">
        <h1>Usługi</h1>
        <?php if ((isset($_smarty_tpl->tpl_vars['vehicles']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['vehicles']->value) > 0) {?>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Nazwisko</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Pojazd wydany</th>
                    <th>Rozlicz pojazd</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vehicles']->value, 'vehicle');
$_smarty_tpl->tpl_vars['vehicle']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vehicle']->value) {
$_smarty_tpl->tpl_vars['vehicle']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['lastname'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['brand'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['model'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    
                    <td>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
settleVehicles">
                            <select name="settled_status_<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['id'];?>
">
                                <option value="TAK" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['settled'] == 'TAK') {?>selected<?php }?>>TAK</option>
                                <option value="NIE" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['settled'] == 'NIE') {?>selected<?php }?>>NIE</option>
                            </select>
                            <input type="hidden" name="vehicle_id" value="<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['id'];?>
">
                            <button type="submit" class="pure-button pure-button-primary">Zapisz</button>
                        </form>
                    </td>

                    <td>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
finalizeSettlement?vehicle_id=<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['id'];?>
" class="pure-button pure-button-primary">Rozlicz pojazd</a>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <?php } else { ?>
        <p>Brak pojazdów do wyświetlenia.</p>
        <?php }?>
        <div class="action-buttons">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
officePanel" class="pure-button pure-button-secondary">Powrót do panelu biurowego</a>
        </div>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
