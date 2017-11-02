<?php
/* Smarty version 3.1.30, created on 2017-11-02 18:51:52
  from "C:\xampp\htdocs\PHP\Homework_PHP\PHP\cookies_sessions\greeting_page\template\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59fb5b38bd83c2_09408928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aca91b91d75aa7604d7d39dfd09fe983d4fd6f56' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\Homework_PHP\\PHP\\cookies_sessions\\greeting_page\\template\\index.tpl',
      1 => 1509644694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_59fb5b38bd83c2_09408928 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1630859fb5b38bd6027_98532015', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} */
class Block_1630859fb5b38bd6027_98532015 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <form action="hello.php" method="post">
    <input type="text" name="username">
    <input type="submit" value="send">
  </form>

<?php
}
}
/* {/block 'body'} */
}
