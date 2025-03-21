<?php
/* Smarty version 4.3.4, created on 2025-01-16 13:56:57
  from 'C:\xampp\htdocs\aplikacja1\app\views\OrderPartsOverviewView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6789021990e689_10118104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4d73a538d834244e4b68f327fa62916c3727ea3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\OrderPartsOverviewView.tpl',
      1 => 1737032215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6789021990e689_10118104 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1772970137678902198c0481_33334778', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1130020981678902198d3d04_96526934', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_1772970137678902198c0481_33334778 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1772970137678902198c0481_33334778',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Przegląd Części<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1130020981678902198d3d04_96526934 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1130020981678902198d3d04_96526934',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

<section id="order-parts-overview" class="order-parts-section">
    <div class="container">
        <h1>Przegląd Części</h1>
        <?php if ((isset($_smarty_tpl->tpl_vars['parts']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['parts']->value) > 0) {?>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Marka pojazdu</th>
                    <th>Model pojazdu</th>
                    <th>Nazwa części</th>
                    <th>Numer seryjny</th>
                    <th>Ilość</th>
                    <th>Notatka</th>
                    <th>Cena za sztukę</th>
                    <th>Status zamówienia</th>
                    <th>Kwota całkowita</th>
                    <th>Akcja</th>
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
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['brand'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['model'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['part_name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['serial_number'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['part']->value['quantity'];?>
</td>
                    <td><?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['notatka'], ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? "Brak notatki" ?? null : $tmp);?>
</td>
                    <td>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orderPartsOverview">
                            <input type="text" name="part_price_<?php echo $_smarty_tpl->tpl_vars['part']->value['id_part'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['part']->value['part_price'];?>
" required>
                    </td>
                    <td>
                        <select name="order_status_<?php echo $_smarty_tpl->tpl_vars['part']->value['id_part'];?>
">
                            <option value="Złożono zapotrzebowanie" <?php if ($_smarty_tpl->tpl_vars['part']->value['order_status'] == 'Złożono zapotrzebowanie') {?>selected<?php }?>>Złożono zapotrzebowanie</option>
                            <option value="Złożono zamówienie" <?php if ($_smarty_tpl->tpl_vars['part']->value['order_status'] == 'Złożono zamówienie') {?>selected<?php }?>>Złożono zamówienie</option>
                            <option value="Część w magazynie" <?php if ($_smarty_tpl->tpl_vars['part']->value['order_status'] == 'Część w magazynie') {?>selected<?php }?>>Część w magazynie</option>
                        </select>
                    </td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['part']->value['total_amount'],2);?>
 PLN</td>
                    
                    <td>
                        <input type="hidden" name="part_id" value="<?php echo $_smarty_tpl->tpl_vars['part']->value['id_part'];?>
">
                        <button type="submit" name="edit_part" class="pure-button pure-button-primary">Zapisz</button>
                        </form>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <?php } else { ?>
        <p>Brak danych do wyświetlenia.</p>
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
