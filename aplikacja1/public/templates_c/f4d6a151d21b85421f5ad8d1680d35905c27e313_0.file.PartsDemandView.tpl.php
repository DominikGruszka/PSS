<?php
/* Smarty version 4.3.4, created on 2025-01-16 20:24:49
  from 'C:\xampp\htdocs\aplikacja1\app\views\PartsDemandView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67895d0165b0b8_89515695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4d6a151d21b85421f5ad8d1680d35905c27e313' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\PartsDemandView.tpl',
      1 => 1737051471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67895d0165b0b8_89515695 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_83832682167895d01620730_63228792', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_121565363667895d01633fb7_54955447', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_83832682167895d01620730_63228792 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_83832682167895d01620730_63228792',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Zamówienia części<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_121565363667895d01633fb7_54955447 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_121565363667895d01633fb7_54955447',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<section id="order-parts" class="order-parts-section">
    <div class="container">
        <h1>Części</h1>

        <h2>Lista zamówionych części</h2>
        <?php if ((isset($_smarty_tpl->tpl_vars['parts']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['parts']->value) > 0) {?>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Nazwa części</th>
                    <th>Numer seryjny</th>
                    <th>Ilość</th>
                    <th>Status zamówienia</th>
                    <th>Notatka</th>
                    <th>Data dodania</th>
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
        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['part_name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['serial_number'], ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['part']->value['quantity'];?>
</td>
        <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['order_status'], ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td><?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['part']->value['notatka'], ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? "Brak notatki" ?? null : $tmp);?>
</td>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['part']->value['created_at'],"%Y-%m-%d %H:%M:%S");?>
</td>
        <td>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
deletePart">
                <input type="hidden" name="part_id" value="<?php echo $_smarty_tpl->tpl_vars['part']->value['id_part'];?>
">
                <button type="submit" class="pure-button pure-button-secondary">Usuń</button>
            </form>
        </td>
    </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>

        </table>
        <?php } else { ?>
        <p>Brak zamówionych części.</p>
        <?php }?>

        <h2>Zamów nową część</h2>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
partsDemand?vehicle_id=<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['id'];?>
">
                <input type="hidden" name="add_part" value="1">
                <label for="part_name">Nazwa części:</label>
                <input type="text" name="part_name" id="part_name" required>

                <label for="serial_number">Numer seryjny:</label>
                <input type="text" name="serial_number" id="serial_number" required>

                <label for="quantity">Ilość:</label>
                <input type="number" name="quantity" id="quantity" min="1" required>

                <label for="note">Notatka (opcjonalnie):</label>
                <textarea name="note" id="note"></textarea>

                <button type="submit" class="pure-button pure-button-primary">Dodaj część</button>
            </form>

        <div class="action-buttons">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
workshopPanel" class="pure-button pure-button-secondary">Powrót do poprzedniej strony</a>
        </div>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
