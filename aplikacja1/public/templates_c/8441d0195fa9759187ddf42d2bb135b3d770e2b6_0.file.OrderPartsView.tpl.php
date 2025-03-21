<?php
/* Smarty version 4.3.4, created on 2025-01-10 11:59:43
  from 'C:\xampp\htdocs\aplikacja1\app\views\OrderPartsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6780fd9fb2f4d4_09103416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8441d0195fa9759187ddf42d2bb135b3d770e2b6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\OrderPartsView.tpl',
      1 => 1736506645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6780fd9fb2f4d4_09103416 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18624544426780fd9faf4b58_16741935', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19144649886780fd9fb083d6_93056300', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_18624544426780fd9faf4b58_16741935 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_18624544426780fd9faf4b58_16741935',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Zamówienia części<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_19144649886780fd9fb083d6_93056300 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19144649886780fd9fb083d6_93056300',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\aplikacja1\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section id="order-parts" class="order-parts-section">
    <div class="container">
        <h1>Zamówienia części</h1>

        <h2>Lista zamówionych części</h2>
        <?php if ((isset($_smarty_tpl->tpl_vars['parts']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['parts']->value) > 0) {?>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Nazwa części</th>
                    <th>Numer seryjny</th>
                    <th>Ilość</th>
                    <th>Status zamówienia</th>
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
orderParts?report_id=<?php echo $_smarty_tpl->tpl_vars['report_id']->value;?>
">
            <label for="part_name">Nazwa części:</label>
            <input type="text" name="part_name" id="part_name" required>

            <label for="serial_number">Numer seryjny:</label>
            <input type="text" name="serial_number" id="serial_number" required>

            <label for="quantity">Ilość:</label>
            <input type="number" name="quantity" id="quantity" min="1" required>

            <button type="submit" class="pure-button pure-button-primary">Dodaj część</button>
        </form>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
