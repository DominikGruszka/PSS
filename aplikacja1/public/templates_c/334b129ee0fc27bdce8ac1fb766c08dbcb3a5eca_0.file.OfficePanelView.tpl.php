<?php
/* Smarty version 4.3.4, created on 2025-01-12 17:43:28
  from 'C:\xampp\htdocs\aplikacja1\app\views\OfficePanelView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6783f130d36d16_03505745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '334b129ee0fc27bdce8ac1fb766c08dbcb3a5eca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\OfficePanelView.tpl',
      1 => 1736700205,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6783f130d36d16_03505745 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1093059606783f130d2b196_52620668', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8290655086783f130d2f013_22100562', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_1093059606783f130d2b196_52620668 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1093059606783f130d2b196_52620668',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Panel Biurowy<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_8290655086783f130d2f013_22100562 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8290655086783f130d2f013_22100562',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="office-panel" class="office-panel-section">
    <div class="container">
        <h1>Panel Pracownika Biurowego</h1>
        
        <div class="options">
            <!-- Opcja: Zamów części -->
            <div class="option-card">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orderPartsOverview">
                    <div class="card-content">
                        <h2>Zamów części</h2>
                        <p>Przejdź do zamawiania części dla pojazdów.</p>
                    </div>
                </a>
            </div>

            <!-- Opcja: Rozlicz pojazd -->
            <div class="option-card">
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
settleVehicles">
                    <div class="card-content">
                        <h2>Rozlicz pojazd</h2>
                        <p>Rozlicz pojazdy zgłoszone do naprawy.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
