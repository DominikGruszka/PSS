<?php
/* Smarty version 4.3.4, created on 2025-03-21 12:13:22
  from 'C:\xampp\htdocs\aplikacja1\app\views\AjaxDemoView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67dd49d25b9db6_66644830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18a672c012d6a10ea662e3a8d79a0953c2865fb0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\AjaxDemoView.tpl',
      1 => 1742555580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67dd49d25b9db6_66644830 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_65114438567dd49d1b7e482_25693122', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_195405598567dd49d1b82304_04445381', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_65114438567dd49d1b7e482_25693122 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_65114438567dd49d1b7e482_25693122',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
AJAX<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_195405598567dd49d1b82304_04445381 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_195405598567dd49d1b82304_04445381',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="ajax-demo" class="ajax-demo-section">
    <div class="container">
        <h1>AJAX</h1>

        <table class="pure-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Nazwisko</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tbody id="user-table">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                <tr id="row-<?php echo $_smarty_tpl->tpl_vars['user']->value['id_users'];?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id_users'];?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['login'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value['lastname'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td>
                        <button class="pure-button pure-button-error delete-user-btn"
                                data-user-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id_users'];?>
">
                            Usuń
                        </button>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

    </div>
</section>

<?php echo '<script'; ?>
>
document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".delete-user-btn");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            let userId = this.getAttribute("data-user-id");  // Pobranie user_id poprawnie
            if (!userId) return;

            if (confirm("Czy na pewno chcesz usunąć tego użytkownika?")) {
                fetch("<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ajaxDeleteUser", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "user_id=" + encodeURIComponent(userId)  // Poprawione przekazywanie danych
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById("row-" + userId).remove(); // Usunięcie wiersza
                        alert("Użytkownik został usunięty!");
                    } else {
                        alert("Błąd: " + data.error);
                    }
                })
                .catch(error => {
                    console.error("Błąd:", error);
                });
            }
        });
    });
});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
