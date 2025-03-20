<?php
/* Smarty version 4.3.4, created on 2024-12-30 17:53:58
  from 'C:\xampp\htdocs\aplikacja1\app\views\ReportsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6772d02660c842_03546766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d1b13c94db2c7f0d97af8d78bbddf5f064690cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\ReportsView.tpl',
      1 => 1735577635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6772d02660c842_03546766 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16509414946772d0265e5742_90007437', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1974980416772d0265f8fc8_44615311', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_16509414946772d0265e5742_90007437 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_16509414946772d0265e5742_90007437',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Zgłoszenie Pojazdu<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1974980416772d0265f8fc8_44615311 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1974980416772d0265f8fc8_44615311',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="report" class="report-section">
    <div class="container2">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
reportsSave" method="post" class="pure-form pure-form-aligned">
            <h4>Zgłoś swój pojazd</h4>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_brand">Marka pojazdu:</label>
                    <input id="id_brand" type="text" name="brand" placeholder="" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->brand, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                <div class="pure-control-group">
                    <label for="id_model">Model pojazdu:</label>
                    <input id="id_model" type="text" name="model" placeholder="" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->model, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                <div class="pure-control-group">
                    <label for="id_production_year">Rok produkcji:</label>
                    <input id="id_production_year" type="number" name="production_year" placeholder="" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->production_year, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                <div class="pure-control-group">
                    <label for="id_vin">Numer VIN:</label>
                    <input id="id_vin" type="text" name="vin" placeholder="" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->vin, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                <div class="pure-controls">
                    <input type="submit" value="Zapisz pojazd" class="pure-button pure-button-primary">
                </div>
            </fieldset>
        </form>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
