<?php
/* Smarty version 4.3.4, created on 2025-01-16 13:06:11
  from 'C:\xampp\htdocs\aplikacja1\app\views\VehiclesListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6788f6338d7972_14377874',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '389fc42eaae0d8021c1f6ad04fc240fcc0a9d404' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\VehiclesListView.tpl',
      1 => 1737029131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6788f6338d7972_14377874 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12731441226788f632f059e5_86002302', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1220651406788f632f19262_12717112', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_12731441226788f632f059e5_86002302 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_12731441226788f632f059e5_86002302',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Lista zarejestrowanych pojazdów<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1220651406788f632f19262_12717112 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1220651406788f632f19262_12717112',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <section id="vehicles-list" class="vehicles-list-section">
        <div class="container2">
            <h4>Lista zarejestrowanych pojazdów</h4>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
vehiclesList">
            <table class="pure-table">
                <thead>
                    <tr>
                        <th>Marka</th>
                        <th>Model</th>
                        <th>Rok produkcji</th>
                        <th>VIN</th>
                        <th>Opis usterki</th>
                        <th>Status</th>
                        <th>Kwota naprawy</th>
                        <th>Akcje</th>
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
                        <?php if ((isset($_smarty_tpl->tpl_vars['edit_vehicle']->value)) && $_smarty_tpl->tpl_vars['edit_vehicle']->value['id'] == $_smarty_tpl->tpl_vars['vehicle']->value['id']) {?>
                        <!-- Tryb edycji -->
                        <td><input type="text" name="brand" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['brand'], ENT_QUOTES, 'UTF-8', true);?>
"></td>
                        <td><input type="text" name="model" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['model'], ENT_QUOTES, 'UTF-8', true);?>
"></td>
                        <td><input type="text" name="production_year" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['production_year'], ENT_QUOTES, 'UTF-8', true);?>
"></td>
                        <td><input type="text" name="vin" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_vehicle']->value['vin'], ENT_QUOTES, 'UTF-8', true);?>
"></td>
                        <td><input type="text" name="description" value="<?php if ((isset($_smarty_tpl->tpl_vars['edit_report']->value['description']))) {
echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_report']->value['description'], ENT_QUOTES, 'UTF-8', true);
} else { ?>Brak opisu<?php }?>"></td>
                        <td><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vehicle']->value['status'] ?? null)===null||$tmp==='' ? "Brak statusu" ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vehicle']->value['repair_amount'] ?? null)===null||$tmp==='' ? "Brak kwoty" ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td>
                            <button type="submit" name="save_edit_vehicle_id" value="<?php echo $_smarty_tpl->tpl_vars['edit_vehicle']->value['id'];?>
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
                        <td><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vehicle']->value['description'] ?? null)===null||$tmp==='' ? "Dodaj opis by rozpatrzono usterkę" ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vehicle']->value['status'] ?? null)===null||$tmp==='' ? "Brak statusu" ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vehicle']->value['repair_amount'] ?? null)===null||$tmp==='' ? "-" ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <td>
                            <button type="submit" name="edit_vehicle_id" value="<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['id'];?>
" class="pure-button pure-button-primary">Edytuj</button>
                            <button type="submit" name="delete_vehicle_id" value="<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['id'];?>
" class="pure-button pure-button-secondary">Usuń</button>
                        </td>
                        <?php }?>
                    </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </form>
        </div>
    </section>
<?php
}
}
/* {/block "content"} */
}
