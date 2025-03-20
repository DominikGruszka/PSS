<?php
/* Smarty version 4.3.4, created on 2025-01-16 20:27:40
  from 'C:\xampp\htdocs\aplikacja1\app\views\FinalizeSettlementView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67895dac2421a8_20777668',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e095cb04dcf22f6714740e54c1f47a6bbf38782' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\FinalizeSettlementView.tpl',
      1 => 1737050957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67895dac2421a8_20777668 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_41056611367895dac1e0729_24261382', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_28295134167895dac1f3fa0_95994466', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_41056611367895dac1e0729_24261382 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_41056611367895dac1e0729_24261382',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Rozliczenie Pojazdu<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_28295134167895dac1f3fa0_95994466 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_28295134167895dac1f3fa0_95994466',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

<section id="finalize-settlement" class="finalize-settlement-section">
    <div class="container">
        
        <h1>Rozliczenie Pojazdu</h1>
        <h2>Dane Pojazdu</h2>
        
        <p><strong>Marka:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['brand'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        <p><strong>Model:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['model'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        <p><strong>Właściciel:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['lastname'], ENT_QUOTES, 'UTF-8', true);?>
</p>

        <h2>Części Zamówione</h2>
        <?php if ((isset($_smarty_tpl->tpl_vars['parts']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['parts']->value) > 0) {?>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Nazwa Części</th>
                    <th>Cena Części</th>
                    <th>Ilość</th>
                    <th>Kwota Łączna</th>
                    <th>Koszt Robocizny</th>
                    <th>Suma</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['parts']->value, 'part');
$_smarty_tpl->tpl_vars['part']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['part']->value) {
$_smarty_tpl->tpl_vars['part']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['part_name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['part']->value['part_price'],2,".");?>
 zł</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['part']->value['quantity'];?>
</td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['part']->value['total_amount'],2,".");?>
 zł</td>
                    <td>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
finalizeSettlement?vehicle_id=<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['id'];?>
">
                            <input type="number" step="0.01" name="labor_<?php echo $_smarty_tpl->tpl_vars['part']->value['id_part'];?>
" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['part']->value['labor'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
                            <input type="hidden" name="part_id" value="<?php echo $_smarty_tpl->tpl_vars['part']->value['id_part'];?>
">
                            <button type="submit" name="update_labor" class="pure-button pure-button-primary">Zapisz</button>
                        </form>
                    </td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['part']->value['sum'],2,".");?>
 zł</td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <h3>Całkowita suma: <span><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['total_sum']->value,2,".");?>
 zł</span></h3>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
finalizeSettlement?vehicle_id=<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['id'];?>
">
            <input type="hidden" name="total_sum" value="<?php echo $_smarty_tpl->tpl_vars['total_sum']->value;?>
">
            <button type="submit" name="save_total" class="pure-button pure-button-primary">Zapisz Całkowitą Kwotę</button>
        </form>
        <?php } else { ?>
        <p>Brak części zamówionych dla tego pojazdu.</p>
        <?php }?>

        <div class="action-buttons">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
settleVehicles" class="pure-button pure-button-secondary">Powrót</a>
        </div>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
