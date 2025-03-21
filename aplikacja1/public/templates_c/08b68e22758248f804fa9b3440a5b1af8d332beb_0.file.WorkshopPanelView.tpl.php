<?php
/* Smarty version 4.3.4, created on 2025-01-16 20:24:13
  from 'C:\xampp\htdocs\aplikacja1\app\views\WorkshopPanelView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67895cdd568a44_36645405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08b68e22758248f804fa9b3440a5b1af8d332beb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\WorkshopPanelView.tpl',
      1 => 1737051674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67895cdd568a44_36645405 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_201734427167895cdd4dfec8_10964705', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12806871067895cdd4f3740_52432208', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_201734427167895cdd4dfec8_10964705 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_201734427167895cdd4dfec8_10964705',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Panel Warsztatowy<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_12806871067895cdd4f3740_52432208 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12806871067895cdd4f3740_52432208',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section id="workshop-panel" class="workshop-panel-section">
    <div class="container">
        <h1>Zgłoszone pojazdy do naprawy</h1>

        <?php if ((isset($_smarty_tpl->tpl_vars['vehicles_with_reports']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['vehicles_with_reports']->value) > 0) {?>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Rok Produkcji</th>
                    <th>VIN</th>
                    <th>Opis Usterki</th>
                    <th>Status Zgłoszenia</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vehicles_with_reports']->value, 'vehicle');
$_smarty_tpl->tpl_vars['vehicle']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vehicle']->value) {
$_smarty_tpl->tpl_vars['vehicle']->do_else = false;
?>
                <tr>
                    <?php if ((isset($_smarty_tpl->tpl_vars['edit_vehicle']->value)) && $_smarty_tpl->tpl_vars['edit_vehicle']->value['id'] == $_smarty_tpl->tpl_vars['vehicle']->value['vehicle_id']) {?>
                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
workshopPanel">
                        <td><input type="text" name="brand" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['brand'], ENT_QUOTES, 'UTF-8', true);?>
" required></td>
                        <td><input type="text" name="model" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['model'], ENT_QUOTES, 'UTF-8', true);?>
" required></td>
                        <td><input type="text" name="production_year" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['production_year'], ENT_QUOTES, 'UTF-8', true);?>
" required></td>
                        <td><input type="text" name="vin" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['vin'], ENT_QUOTES, 'UTF-8', true);?>
" required></td>
                        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td>
                            <select name="status[<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['report_id'];?>
]">
                                <option value="Analizowanie zgłoszenia" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['report_status'] == 'Analizowanie zgłoszenia') {?>selected<?php }?>>Analizowanie zgłoszenia</option>
                                <option value="W trakcie weryfikacji część" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['report_status'] == 'W trakcie weryfikacji część') {?>selected<?php }?>>W trakcie weryfikacji części</option>
                                <option value="Proces wymiany części" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['report_status'] == 'Proces wymiany części') {?>selected<?php }?>>Proces wymiany części</option>
                                <option value="Naprawa zakończona" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['report_status'] == 'Naprawa zakończona') {?>selected<?php }?>>Naprawa zakończona</option>
                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="save_vehicle_id" value="<?php echo $_smarty_tpl->tpl_vars['edit_vehicle']->value['id'];?>
">
                            <button type="submit" class="pure-button pure-button-primary">Zapisz</button>
                        </td>
                    </form>
                    <?php } else { ?>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['brand'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['model'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['production_year'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['vin'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vehicle']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
workshopPanel">
                            <select name="status[<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['report_id'];?>
]">
                                <option value="Analizowanie zgłoszenia" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['report_status'] == 'Analizowanie zgłoszenia') {?>selected<?php }?>>Analizowanie zgłoszenia</option>
                                <option value="W trakcie weryfikacji część" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['report_status'] == 'W trakcie weryfikacji część') {?>selected<?php }?>>W trakcie weryfikacji części</option>
                                <option value="Proces wymiany części" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['report_status'] == 'Proces wymiany części') {?>selected<?php }?>>Proces wymiany części</option>
                                <option value="Naprawa zakończona" <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['report_status'] == 'Naprawa zakończona') {?>selected<?php }?>>Naprawa zakończona</option>
                            </select>
                            <input type="hidden" name="report_id" value="<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['report_id'];?>
">
                            <button type="submit" name="update_status" class="pure-button pure-button-primary">Zmień Status</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
workshopPanel">
                            <input type="hidden" name="edit_vehicle_id" value="<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['vehicle_id'];?>
">
                            <button type="submit" class="pure-button pure-button-primary">Edytuj</button>
                        </form>
                        <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
partsDemand">
                            <input type="hidden" name="vehicle_id" value="<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['vehicle_id'];?>
">
                            <button type="submit" class="pure-button pure-button-secondary">Zamów Części</button>
                        </form>
                    </td>
                    <?php }?>
                    
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <?php } else { ?>
        <p>Brak zgłoszeń do wyświetlenia.</p>
        <?php }?>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
