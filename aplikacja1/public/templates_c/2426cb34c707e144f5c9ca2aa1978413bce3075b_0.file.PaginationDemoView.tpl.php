<?php
/* Smarty version 4.3.4, created on 2025-03-20 14:42:16
  from 'C:\xampp\htdocs\aplikacja1\app\views\PaginationDemoView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67dc1b3807dc01_89490386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2426cb34c707e144f5c9ca2aa1978413bce3075b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\PaginationDemoView.tpl',
      1 => 1742478056,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67dc1b3807dc01_89490386 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_167316469167dc1b37636976_44506565', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_54670937567dc1b3764a1f7_86377750', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_167316469167dc1b37636976_44506565 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_167316469167dc1b37636976_44506565',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Stronicowanie - Demo<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_54670937567dc1b3764a1f7_86377750 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_54670937567dc1b3764a1f7_86377750',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="pagination-demo" class="pagination-demo-section">
    <div class="container">
        <h1>Stronicowanie - Demo</h1>

        <table class="pure-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Nazwisko</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id_users'];?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['login'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['lastname'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

        <!-- Nawigacja po stronach -->
        <div class="pagination">
            <?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
paginationDemo?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
" class="pure-button">Poprzednia</a>
            <?php }?>

            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['total_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['total_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
paginationDemo?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="pure-button <?php if ($_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['current_page']->value) {?>pure-button-primary<?php }?>">
                    <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                </a>
            <?php }
}
?>

            <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
paginationDemo?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
" class="pure-button">Następna</a>
            <?php }?>
        </div>
    </div>
</section>
<?php
}
}
/* {/block "content"} */
}
